<?php

spl_autoload_register(function($class_name){

    if(file_exists('core\\'.$class_name.'.php'))
        include 'core\\'.$class_name.'.php';
    if(file_exists('mvc\classes\\'.$class_name.'.php'))
        include '..\mvc\classes\\'.$class_name.'.php';

});