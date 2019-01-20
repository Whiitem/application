<?php

class BDD extends PDO {

    static private $_instance = null;

    public static function get(){
        if(empty(self::$_instance)){
            self::$_instance = new BDD('mysql:host=localhost;dbname=database_0.0', 'root', '');
        }
        return self::$_instance;
    }

    public function quoteList(array $to_quote){
        $res = "";
        foreach($to_quote as $to_q){
            $res.= $this->quote($to_q).",";
        }
        return substr($res, 0, -1);
    }

}