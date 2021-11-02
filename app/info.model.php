<?php

class Info{
    private $cod_info;
    private $ip;
    private $browser;
    private $browser_version;
    private $plataform;
    private $mobile;
    private $robot;
    private $tablet;
    private $facebook;
    private $base_url;
    private $site_prev;
    private $site_name;


    public function __get($attribute){
        return $this->$attribute;
    }

    public function __set($attribute, $value){
        return $this->$attribute = $value;
    }
}
