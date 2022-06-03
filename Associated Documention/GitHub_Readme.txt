GitHub Repository - https://github.com/smoncavage/CST451_Capstone

# Automated Garden Watering

Utilizing a Raspberry Pi 4 this project takes in local environment sensory  data for temperature, barometric pressure, humidity, has soil sensory inputs as well as both GPS and GLONASS positioning data in order to pull locally forecast weather conditions.

## Description

* The Raspberry Pi runs a Python script which take in the forecast weather information in JSON formatting and extracts out the rain forecast. 

* This information is used to determine whether or not outputs for different zones should be activated via solid state relays for opening piped solenoids allowing water to flow to the areas where it is needed. 

* There is an output by the Python script to a locally hosted website where JSON data can be pulled from (output API calls).

## Getting Started

### Hardware

* Raspberry Pi 4
* BN-880 GPS Module w/Flash HMC5883 Compass
* BME280 Environmental Sensor
* Soil Hygrometer Moisture Detection Water Sensor Module YL-69 Sensor and HC-38 Module
* SSR-40 DA 40A DC 3-32V to AC 24-380V SSR Single Phase Solid State Relay
* GPIO Status LED & Terminal Block Breakout Board HAT for Raspberry Pi
* 12V 5A DC Universal Switching Power Supply Brass core Material Transformer 60W
* Thermal Overload Protector AC 125/250V 3A
* Waterproof 12V/24V to 5V Converter DC-DC Step Down Module Power Adapter Compatible with Raspberry Pi
* Circuit Breaker Low Voltage AC 6A 230/400V 1 Pole - DIN Mount
* PS613163 3-Wire Appliance and Power Tool Cord, 6 ft, 16 AWG, 13A/125V AC, 1625w
* Proper Solenoids to match your home's piping and project wiring design configuration
* Schematics are in the "Associated Documentation" Folder in the repository.

### Dependencies

* PHP 
* Composer
* python3
* apache2
* No-IP
* Bootstrap
* mysql/mariadb

### Installing

* From the main repository download the python script and set it to load on Raspberry Pi startup. 
* The jsonGPIO.php file will also need to be copied to the Raspberry Pi as well into the /var/www/html folder after setting up your Raspberry Pi as a web-server and changing your Pi's IP address to a hosted website name through a DNS service. (I used No-IP for this project).
* Directions to set the script to start with the Raspberry Pi can be found [here](https://raspberrypi-guide.github.io/programming/run-script-on-boot)
* Setup Raspberry Pi as a web-server. Instructions can be found [here](https://pimylifeup.com/raspberry-pi-web-server/)
* Setup No-IP for Dyanamic Name Services [here](https://raspberrytips.com/install-no-ip-raspberry-pi/) 
* The other PHP files can be ran from the same website directly from the Raspberry Pi if wanted with minimal code changes, or even ran as a localhost if you do not need external access to your weather station/watering program.

### Executing program

* Setup mysql/mariadb utilizing the DDL Script file within this repository within the "Associated Documentation" folder.
* On Raspberry Pi run python3 combined_sensors.py after changing the database configuration 
* Copy the PHP code and composer.json files to a Hosting server and publish the website.

## Authors

### To become a contributor please contact Stephan on GitHub utilizing the link below.

Contributors names and contact info

Stephan Moncavage  
[@smoncavage](https://github.com/smoncavage)

## Version History

* 0.1
    * Initial Release

## License

* This project is licensed under the [GPLv3](https://www.gnu.org/licenses/gpl-3.0.txt) License - see the LICENSE.md file for details