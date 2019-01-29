<?php

spl_autoload_register(function($class_name){

    if(file_exists('core\\'.$class_name.'.php'))
        include 'core\\'.$class_name.'.php';
    if(file_exists('mvc\classes\\'.$class_name.'.php'))
        include '..\mvc\classes\\'.$class_name.'.php';

});

class JSLoader {

    public static function initJS(){
        $include = "";
        $dir = "javascript/core";
        if ($handle = opendir($dir)) {

            while (false !== ($entry = readdir($handle))) {
                $path = explode(".", $entry);
                $extension = end($path);
                if($extension == "js"){
                    $include.= "<script type='text/javascript' src='".relativeRoot()."/$dir/$entry'></script>\n";
                }
            }

            closedir($handle);
        }

        return $include;
    }

    public static function loadDir(string $dir){

        $include = "";
        $dir = "/mvc/views/$dir";
        if ($handle = opendir($dir)) {

            while (false !== ($entry = readdir($handle))) {
                $path = explode(".", $entry);
                $extension = end($path);
                if($extension == "js"){
                    $include.= "<script type='text/javascript' src='$dir/$entry'></script>\n";
                }
            }

            closedir($handle);
        }

        return $include;

    }

}

class CSSLoader {

    public static function initCSS(){
        $include = "";
        $dir = "css";
        if ($handle = opendir($dir)) {

            while (false !== ($entry = readdir($handle))) {
                $path = explode(".", $entry);
                $extension = end($path);
                if($extension == "css"){
                    $include.= "<link href='".relativeRoot()."/$dir/$entry' rel='stylesheet' type='text/css'/>\n";
                }
            }

            closedir($handle);
        }

        return $include;
    }

    public static function loadDir(string $dir){

        $include = "";
        $dir = "/mvc/views/$dir";
        if ($handle = opendir($dir)) {

            while (false !== ($entry = readdir($handle))) {
                $path = explode(".", $entry);
                $extension = end($path);
                if($extension == "css"){
                    $include.= "<script type='text/javascript' src='".$dir."/$entry'></script>\n";
                }
            }

            closedir($handle);
        }

        return $include;

    }

}

function root(){
    return $_SERVER['DOCUMENT_ROOT'];
}

function relativeRoot(){
    return "/".explode("/", $_SERVER["SCRIPT_NAME"])[1] ?? "";
}