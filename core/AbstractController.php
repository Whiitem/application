<?php

abstract class AbstractController{

    protected $_view;

    public static function getController(){
        $class = get_called_class();
        return new $class;
    }

    public function __construct(){
        $this->_view = new View;
    }

    public function render(){
        $this->_view->render();
    }

    public function setTemplate($tpl){
        $this->_view->setTemplate($tpl);
    }

    public function __set($name, $value){
        $this->_view->$name = $value;
    }

    public function __get($name){
        return $this->_view->$name ?? false;
    }

}

class View {

    protected $vars = [];
    protected $template = "";

    public function setTemplate($tpl){
        $this->template = $tpl;
    }

    public function render(){
        if(substr($this->template, -6) == ".phtml"){
            include(ROOT."main.phtml");
        }else if($this->template == "JSON"){

        }else{

        }
    }

    public function __set($name, $value){
        $this->vars[$name] = $value;
    }

    public function __get($name){
        return $this->vars[$name] ?? false;
    }

}