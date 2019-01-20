<?php

abstract class MVC {

    protected $template;
    protected $view;

    public static function get(){
        $class = get_called_class();
        return new $class;
    }

    public function render(){
        if(!empty($this->template)){
            $file = "mvc/views/".$this->template;
            if(file_exists($file))
                include $file;
        }
    }

}