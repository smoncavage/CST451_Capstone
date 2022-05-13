/*
Stephan Moncavage
CST-451
Capstone Project
09 May 2022
*/
<?php

class Sensor
{
    private $sensor_id;
    private $sensor_dtStamp;
    private $sensor_temp;
    private $sensor_humidity;
    private $sensor_press;
    private $sensor_alt;
    private $sensor_gpstime;
    private $sensor_gpslat;
    private $sensor_gpslong;
    private $sensor_gpsalt;
    private $sensor_gpsSat;

    /**
     * @param $sensor_id
     * @param $sensor_dtStamp
     * @param $sensor_temp
     * @param $sensor_humidity
     * @param $sensor_press
     * @param $sensor_alt
     * @param $sensor_gpstime
     * @param $sensor_gpslat
     * @param $sensor_gpslong
     * @param $sensor_gpsalt
     * @param $sensor_gpsSat
     */
    public function __construct($sensor_id, $sensor_dtStamp, $sensor_temp, $sensor_humidity, $sensor_press, $sensor_alt, $sensor_gpstime, $sensor_gpslat, $sensor_gpslong, $sensor_gpsalt, $sensor_gpsSat)
    {
        $this->sensor_id = $sensor_id;
        $this->sensor_dtStamp = $sensor_dtStamp;
        $this->sensor_temp = $sensor_temp;
        $this->sensor_humidity = $sensor_humidity;
        $this->sensor_press = $sensor_press;
        $this->sensor_alt = $sensor_alt;
        $this->sensor_gpstime = $sensor_gpstime;
        $this->sensor_gpslat = $sensor_gpslat;
        $this->sensor_gpslong = $sensor_gpslong;
        $this->sensor_gpsalt = $sensor_gpsalt;
        $this->sensor_gpsSat = $sensor_gpsSat;
    }

    public function Sensor(){

    }

    /**
     * @return mixed
     */
    public function getSensorId()
    {
        return $this->sensor_id;
    }

    /**
     * @return mixed
     */
    public function getSensorDtStamp()
    {
        return $this->sensor_dtStamp;
    }

    /**
     * @return mixed
     */
    public function getSensorTemp()
    {
        return $this->sensor_temp;
    }

    /**
     * @return mixed
     */
    public function getSensorHumidity()
    {
        return $this->sensor_humidity;
    }

    /**
     * @return mixed
     */
    public function getSensorPress()
    {
        return $this->sensor_press;
    }

    /**
     * @return mixed
     */
    public function getSensorAlt()
    {
        return $this->sensor_alt;
    }

    /**
     * @return mixed
     */
    public function getSensorGpstime()
    {
        return $this->sensor_gpstime;
    }

    /**
     * @return mixed
     */
    public function getSensorGpslat()
    {
        return $this->sensor_gpslat;
    }

    /**
     * @return mixed
     */
    public function getSensorGpslong()
    {
        return $this->sensor_gpslong;
    }

    /**
     * @return mixed
     */
    public function getSensorGpsalt()
    {
        return $this->sensor_gpsalt;
    }

    /**
     * @return mixed
     */
    public function getSensorGpsSat()
    {
        return $this->sensor_gpsSat;
    }


}