<?php

class MaintenanceController extends AbstractController {

    public function testAction(){
        $this->setTemplate("Maintenance/Test/test.phtml");
        $this->id = 1;
    }

    public function jsonAction(){
        $this->setTemplate("JSON");
        $this->id = 3;
    }

}