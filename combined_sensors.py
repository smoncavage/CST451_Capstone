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
        print ("GPS Timestamp: %s -- Lat: %s %s -- Lon: %s %s -- Altitude: %s %s --Satellites: %s" %(msg.timestamp, msg.lat, msg.lat_dir, msg.lon, msg.lon_dir, msg.altitude, msg.altitude_units, msg.num_sats))

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
        print("Relay 1 Value set to:")
        print(relay1.value)
    else:
        relay1.value = False
        print("Relay 1 Value set to:")
        print(relay1.value)
    
    if(sensordigital2.value == True):
        relay2.value = True
        print("Relay 1 Value set to:")
        print(relay2.value)
    else:
        relay2.value = False
        print("Relay 1 Value set to:")
        print(relay2.value)

while 1:
    try:
        setRelayOutputs()
        strg = sio.readline()       
        parseGPS(strg)  
        raise AttributeError("Fault in Receieved GPS")
    except AttributeError as e:
        strg = sio.readline()
        parseGPS(strg)
        setRelayOutputs()
    else:
        strg = sio.readline()
        parseGPS(strg)
        setRelayOutputs()
        ser.close()

