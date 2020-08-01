<?php


class Address {
    private $street;
    private $number;
    private $city;
    private $country;
    private $eircode;
    
    function __construct($street, $number, $city, $country, $eircode) {
        $this->street = $street;
        $this->number = $number;
        $this->city = $city;
        $this->country = $country;
        $this->eircode = $eircode;
    }
    
    
    function getStreet() {
        return $this->street;
    }

    function getNumber() {
        return $this->number;
    }

    function getCity() {
        return $this->city;
    }

    function getCountry() {
        return $this->country;
    }

    function getEircode() {
        return $this->eircode;
    }

    function setStreet($street) {
        $this->street = $street;
    }

    function setNumber($number) {
        $this->number = $number;
    }

    function setCity($city) {
        $this->city = $city;
    }

    function setCountry($country) {
        $this->country = $country;
    }

    function setEircode($eircode) {
        $this->eircode = $eircode;
    }


    
    
}
