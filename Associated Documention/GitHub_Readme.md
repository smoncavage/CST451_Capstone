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

### Dependencies

* PHP 
* Composer
* npm.js
* guzzlehttp
* monolog
* curl 


### Installing

* From the main repository download the python script and set it to load on Raspberry Pi startup. 
* Directions to set the script to start with the Raspberry Pi can be found [here](https://raspberrypi-guide.github.io/programming/run-script-on-boot)
* 

### Executing program

* How to run the program
* Step-by-step bullets
```
code blocks for commands
```

## Help

Any advise for common problems or issues.
```
command to run if program contains helper info
```

## Authors

Contributors names and contact info

ex. Dominique Pizzie  
ex. [@DomPizzie](https://twitter.com/dompizzie)

## Version History

* 0.2
    * Various bug fixes and optimizations
    * See [commit change]() or See [release history]()
* 0.1
    * Initial Release

## License

This project is licensed under the [GPLv3](https://www.gnu.org/licenses/gpl-3.0.txt) License - see the LICENSE.md file for details

## Acknowledgments

Inspiration, code snippets, etc.
* [awesome-readme](https://github.com/matiassingers/awesome-readme)
* [PurpleBooth](https://gist.github.com/PurpleBooth/109311bb0361f32d87a2)
* [dbader](https://github.com/dbader/readme-template)
* [zenorocha](https://gist.github.com/zenorocha/4526327)
* [fvcproductions](https://gist.github.com/fvcproductions/1bfc2d4aecb01a834b46)