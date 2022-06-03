import bme280
import smbus2
import time
import serial
import pynmea2
import math
import io
import digitalio
import board
from time import sleep
import pymysql
import json, requests
import datetime

key = '37d5482bf2d36047a822b19964843ac3'

#Set Solid State Relay Output Pins
relay1 = digitalio.DigitalInOut(board.D6)
relay1.direction = digitalio.Direction.OUTPUT

relay2 = digitalio.DigitalInOut(board.D5)
relay2.direction = digitalio.Direction.OUTPUT


#Set Soil Sensor Input Pins
sensordigital1 = digitalio.DigitalInOut(board.D12)
sensordigital1.direction = digitalio.Direction.INPUT
#sensordigital1.pull = digitalio.Pull.DOWN

sensordigital2 = digitalio.DigitalInOut(board.D26)
sensordigital2.direction = digitalio.Direction.INPUT

#Debugging Print Values
#print(sensordigital1.value)
#print(sensordigital2.value)

#Connect to Database for Environmental Information Upload
try:
    mydb = pymysql.connect(
        host = "bv2rebwf6zzsv341.cbetxkdyhwsb.us-east-1.rds.amazonaws.com",
        user = "e0ugzn4gbm5rk7vn",
        password = "iil0c5udr9vv6qbk",
        database = "g4asynvtu9x2oh4e"
        )
    print(mydb)
except AttributeError as e:
    print(e)
    strg = sio.readline()       
    parseGPS(strg)
    
mycursor = mydb.cursor()

sql = "INSERT INTO Sensors (DTStamp, Temperature, Humidity, Pressure, Altitude, GPSTimeStamp, GPSLat, GPSLong, GPSAltitude, GPSNumSat) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s)"

#GPS Serial Data Connection
ser = serial.Serial(
    port='/dev/ttyS0',
    baudrate = 9600,
    bytesize = serial.EIGHTBITS,
    timeout=6,
    write_timeout=0
)
#Read/Write to File
sio = io.TextIOWrapper(io.BufferedRWPair(ser,ser))

#Local Environment Sensor Data Connection
port = 1
address = 0x77 #Adafruit BME280 address. Other BME280s may be different
bus = smbus2.SMBus(port)

#TimeStamp
times = time.localtime(time.time())
print (times)

#$GNVTG VTG-Vector Track and Speed over Ground
#$GNGGA GGA-essential fix data which provides 3D location and accuracy data
#$GNGLL GLL-Geographic Lat and Long
#$GNGSA GSA-detial on "Fix" includes number of Satellites
#$GNRMC RMC-The recommended Minimum

bme280.load_calibration_params(bus,address)
bme280_data = bme280.sample(bus,address)

GPS_hit = False

file = open("output.txt", "a")

def parseGPS(strg):
    if 'GNGGA' in strg:
        msg = pynmea2.parse(strg)
        gpsTime = msg.timestamp
        #print(msg.lat,msg.lon)
        cvrtLatD = math.floor(int(float(msg.lat))/100)
        cvrtLonD = math.floor(int(float(msg.lon))/100)
        cvrtLatM = math.floor(float(msg.lat))-(cvrtLatD*100)
        cvrtLonM = math.floor(float(msg.lon))-(cvrtLonD*100)
        cvrtLatS = (float(msg.lat)-((cvrtLatD*100)+cvrtLatM))*10
        cvrtLonS = (float(msg.lon)-((cvrtLonD*100)+cvrtLonM))*10
        #print(cvrtLatD, cvrtLonD, cvrtLatM, cvrtLonM, cvrtLatS, cvrtLonS)
        cvrtLatDD = cvrtLatD + (cvrtLatM/60) + (cvrtLatS/3600)
        cvrtLonDD = (cvrtLonD + (cvrtLonM/60) + (cvrtLonS/3600))*-1
        #print(cvrtLatDD, cvrtLonDD)
        gpsLat = str(cvrtLatDD)
        gpsLon = str(cvrtLonDD)
        gpsAlt = msg.altitude
        gpsSat = msg.num_sats
        print ("GPS Timestamp: %s -- Lat: %s -- Lon: %s -- Altitude: %s %s --Satellites: %s" %(gpsTime, gpsLat,  gpsLon, gpsAlt, msg.altitude_units, gpsSat))      
        
        bme280_data = bme280.sample(bus,address)
        times = bme280_data.timestamp
        hum = bme280_data.humidity
        press = bme280_data.pressure
        temp = bme280_data.temperature
        alt = convertPressAlt(press)
        file = open("output.txt", "a")
        print("DME Timestamp: %s -- Humidity: %s -- Pressure: %s -- Temperature: %s -- Altitude: %f"%(times, hum, press, temp, alt))
        val1 = (times, temp, hum, press, alt, str(msg.timestamp), str(msg.lat), str(msg.lon), str(msg.altitude), str(msg.num_sats))
        mycursor.execute(sql, val1)
        mydb.commit()
        setRelayOutWeather(gpsLat,gpsLon)
        sleep(1800)

def convertPressAlt(press):
    # PA = 145366.45 (feet) or 44331(meters) x [1 - (Pa / 1013.25 (for millibar or 29.92 in/Hg) ^ 0.190284] where PA = Pressure Altitude in feet and Pa = Field Pressure, 1013.25 = millibar pressure at STA
    x = press / 1013.25
    y = math.pow(x, 0.190284)
    z = 1 - y
    PA = 44331 * z
#    print (PA)
    return PA

def setRelayOutputs():  
    if(sensordigital1.value == True):
        relay1.value = True
        print("Relay 1 Value set to:" + relay1.value)
    else:
        relay1.value = False
        print("Relay 1 Value set to:" + relay1.value)
    
    if(sensordigital2.value == True):
        relay2.value = True
        print("Relay 1 Value set to:" + relay2.value)
        
    else:
        relay2.value = False
        print("Relay 1 Value set to:" + relay2.value)
        
def setRelayOutWeather(gpsLat, gpsLon):
    units = 'imperial'
    count = str(3);
    url = requests.get('http://api.openweathermap.org/data/2.5/forecast?lat='+ gpsLat +'&lon='+ gpsLon +'&appid='+ key +'&cnt='+ count +'&units=imperial')
    weather = json.loads(url.text)
    #if(weather['list'][7] == "\'rain\'"):
    #    rain=int(weather['list']['rain']['1h'])
    #    print(str(rain))
    #print(weather['city'])
    inOfRain = []
    timeRain = []
    totalRain = 0
    for i in weather['list']:
        if 'rain' in i:
            totalRain = totalRain + i['rain']['3h']
            timeRain.append(i['dt'])
            inOfRain.append(i['rain']['3h'])
            #print(i['dt'], i['rain']['3h'], totalRain)
    print(timeRain, inOfRain, totalRain)
    if(sensordigital1.value == True and totalRain == 0):
        relay1.value = True
        print("Relay 1 Value set to: " + str(relay1.value))
    else:
        relay1.value = False
        print("Relay 1 Value set to: " + str(relay1.value))
    
    if(sensordigital2.value == True and totalRain == 0):
        relay2.value = True
        print("Relay 2 Value set to: " + str(relay2.value))
    else:
        relay2.value = False
        print("Relay 2 Value set to: " + str(relay2.value))
    

while 1:
    try:
        #setRelayOutputs()
        strg = sio.readline()       
        parseGPS(strg)  
        raise AttributeError("Fault in Receieved GPS")
    except AttributeError as e:
        strg = sio.readline()
        parseGPS(strg)
        #setRelayOutputs()
    else:
        strg = sio.readline()
        parseGPS(strg)
        #setRelayOutputs()
        ser.close()

