<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
Class Currentweather {
    private $jsonfile;
    private $jsondata;
    private $temp;
    private $humidity;
    private $pressure;
    private $visibility;
    private $description;
    private $windspeed;
    private $winddir;
    private $iconcode;
    private $coordlon;
    private $coordlat;
    private $cityname;
    private $countrycode;
    private $sunrise;
    private $sunset;
    private $cloudsall;
    protected $weatherKey;

    private function jsondata($url) {
        $this->jsonfile = file_get_contents($url);
        $this->jsondata = json_decode($this->jsonfile);
        return $this->jsondata;
    }


    //location for current weather
    public function locationbycity($city, $country) {
        $file = fopen("ak.env", "r", 1);
        $index = 0;
        $lines = [];
        //Output lines until EOF is reached
        while (!feof($file)) {
            $lines[$index++] = fgets($file);
        }
        $this->weatherKey = $lines[1];
        fclose($file);

        return "https://api.openweathermap.org/data/2.5/weather?q=" . str_replace(' ', '%20', $city) .",". str_replace(' ', '%20', $country) ."&units=metric&appid=". $this->weatherKey ."";
    }

    // Get current temperature
    public function temperature($url) {
        $this->temp = $this->jsondata($url)->main->temp;
        return $this->temp;
    }
    // Get current humidity
    public function humidity($url) {
        $this->humidity = $this->jsondata($url)->main->humidity;
        return $this->humidity;
    }
    // Get current pressure
    public function pressure($url) {
        $this->pressure = $this->jsondata($url)->main->pressure;
        return $this->pressure;
    }
    // Get current visibility
    public function visibility($url) {
        $this->visibility = $this->jsondata($url)->visibility;
        return $this->visibility;
    }
    //Get current weather description
    public function description($url) {
        $this->description = $this->jsondata($url)->weather[0]->description;
        return $this->description;
    }
    // Get wind speed
    public function windspeed($url) {
        $this->windspeed = $this->jsondata($url)->wind->speed;
        return $this->windspeed;
    }
    //Get wind direction
    public function winddir($url) {
        $this->winddir = $this->jsondata($url)->wind->deg;
        return $this->winddir;
    }
    //Get icon code
    public function iconcode($url) {
        $this->iconcode = $this->jsondata($url)->weather[0]->icon;
        return $this->iconcode;
    }
    // Get country name
    public function cityname($url) {
        $this->cityname = $this->jsondata($url)->name;
        return $this->cityname;
    }
    //Get city name
    public function countrycode($url) {
        $this->countrycode = $this->jsondata($url)->sys->country;
        return $this->countrycode;
    }
    //Get sunrise time
    public function sunrise($url) {
        $this->sunrise = $this->jsondata($url)->sys->sunrise;
        return $this->sunrise;
    }
    //Get sunset
    public function sunset($url) {
        $this->sunset = $this->jsondata($url)->sys->sunset;
        return $this->sunset;
    }
    //Get cloudsall
    public function cloudsall($url) {
        $this->cloudsall = $this->jsondata($url)->clouds->all;
        return $this->cloudsall;
    }
}
?>