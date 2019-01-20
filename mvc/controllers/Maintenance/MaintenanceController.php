<?php

class MaintenanceController extends MVC {

    public function testAction(){
        $this->template = "Maintenance/Test/test.phtml";
        $this->id = 1;
    }

}