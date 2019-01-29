<?php

class Router{

    protected $request;

    protected $_module;
    protected $_namespace;
    protected $_controller;
    protected $_action;
    protected $_params;

    public function __construct(){
        $this->request = new Request;
        $this->dispatch();
    }

    protected function dispatch(){
        $pathInfos = explode("/", $this->request->getUrl());
        $this->_module = $pathInfos[1] ?? false;
        $this->_namespace = $pathInfos[2] ?? false;
        $this->_controller = $pathInfos[3] ?? false;
        $this->_action = $pathInfos[4] ?? false;
        $this->_params = $pathInfos[5] ?? false;
    }

    public function route(){
        $file = ROOT."/mvc/controllers/$this->_namespace/$this->_controller"."Controller".".php";
        if(file_exists($file)){
            require_once $file;
            $controller = ($this->_controller."Controller")::getController();
            if(method_exists($controller, $this->_action."Action")){
                $controller->{$this->_action."Action"}();
                $controller->render();
            }
        }
    }

}

class Request{

    protected $url;
    protected $method;

    public function __construct(){
        $this->url = $_SERVER["REQUEST_URI"];
        $this->method = $_SERVER["REQUEST_METHOD"];
    }

    public function getUrl(){
        return $this->url;
    }

}