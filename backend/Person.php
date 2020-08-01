<?php



abstract class Person {
    protected $id;
    protected $name;
    protected $surname;
    protected $email;
    protected $birthday;
    protected $phone_number;
    protected $mobile;
    protected $street;
    protected $city;
    protected $zip_cod;
    protected $country;
    protected $sex;
            

    function __construct($id, $name, $surname, $email, $birthday, $phone_number, $moblile, $street, $city, $zip_cod, $country,$sex) {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->birthday = $birthday;
        $this->phone_number = $phone_number;
        $this->moblile = $moblile;
        $this->street = $street;
        $this->city = $city;
        $this->zip_cod = $zip_cod;
        $this->country = $country;
        $this->country = $sex;
    }

   
    
    
    
    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getSurname() {
        return $this->surname;
    }

    function getEmail() {
        return $this->email;
    }

    function getBirthday() {
        return $this->birthday;
    }

    function getPhone_number() {
        return $this->phone_number;
    }

    function getMoblile() {
        return $this->moblile;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setSurname($surname) {
        $this->surname = $surname;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setBirthday($birthday) {
        $this->birthday = $birthday;
    }

    function setPhone_number($phone_number) {
        $this->phone_number = $phone_number;
    }

    function setMoblile($moblile) {
        $this->moblileNumber = $moblileNumber;
    }

    function getStreet() {
        return $this->street;
    }

    function getCity() {
        return $this->city;
    }

    function getZip_cod() {
        return $this->zip_cod;
    }

    function getCountry() {
        return $this->country;
    }

    function setStreet($street) {
        $this->street = $street;
    }

    function setCity($city) {
        $this->city = $city;
    }

    function setZip_cod($zip_cod) {
        $this->zip_cod = $zip_cod;
    }

    function setCountry($country) {
        $this->country = $country;
    }

    function getMobile() {
        return $this->mobile;
    }

    function getSex() {
        return $this->sex;
    }

    function setMobile($mobile) {
        $this->mobile = $mobile;
    }

    function setSex($sex) {
        $this->sex = $sex;
    }


            

}