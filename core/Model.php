<?php

abstract class Model {

    abstract static function getTable();

    abstract static function getPrimary_key();

    public static function getInstance($id = null){
        $class = self::class;
        $object = new $class;

        if(!empty($id)){
            $bdd = self::_getBdd();
            $datas = $bdd->query("SELECT * FROM ".self::getTable()." WHERE ".self::getPrimary_key()." = ".$bdd->quote($id))->fetch(PDO::FETCH_ASSOC);
            if(!empty($datas)){
                foreach($datas as $property => $data){
                    if(property_exists(self::class, $property)){
                        $object->{$property} = $data;
                    }
                }
            }
        }

        return $object;
    }

    protected function save(){
        return $this->{self::getPrimary_key()};
    }

    protected function _afterLoad(){}
    protected function _afterSave(){}

    private static function _getBdd(){
        return BDD::get();
    }

}