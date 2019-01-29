<?php

class Config{

    protected static $instance = false;
    protected $datas = array();

    public static function getInstance(){
        if (!static::$instance)
            static::$instance = new Config();

        return static::$instance;
    }

    public function get($name){
        if (!isset($this->datas[$name]))
            return null;

        return $this->datas[$name];
    }

    public function set($name, $value){
        $this->datas[$name] = $value;
    }

    public function isset($name){
        return isset($this->datas[$name]);
    }

}