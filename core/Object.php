<?php

abstract class _Object_ {

    protected static function getTable(){
        return "test";
    }

    protected static function getPrimary_key(){
        return "id";
    }

    public static function getInstance($id = null){
        $class = self::class;
        $object = new $class;

        if(!empty($id)){
            $bdd = self::_getBdd();
            $datas = $bdd->query("SELECT * FROM ".self::getTable()." WHERE ".self::getPrimary_key()." = ".$bdd->quote($id))->fetch(PDO::FETCH_ASSOC);
            if(!empty($datas)){
                $object->fillWithDatas($datas);
            }
        }

        return $object;
    }

    protected function fillWithDatas(array $datas){
        foreach($datas as $property => $data){
            if(property_exists(self::class, $property)){
                $this->{$property} = $data;
            }
        }
    }

    protected function save(){
        $id = $this->{self::getPrimary_key()};
    }

    protected function _afterLoad(){}
    protected function _afterSave(){}

    private static function _getBdd(){
        return BDD::get();
    }

}