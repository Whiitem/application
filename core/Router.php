<?php

class Router {

    protected $request_uri;

    public static function get(string $request){
        $router = new Router;
        $router->request_uri = $request;
        return $router;
    }

    public function route(){

        $path = explode('/', $this->request_uri);
        if(empty($path[2]) || empty($path[3]) || empty($path[4])){
            return;
        }

        $namespace = $path[2];
        $controller = $path[3]."Controller";
        $action = $path[4]."Action";

        $file = "mvc/controllers/$namespace/$controller.php";
        if(file_exists($file)){
            include $file;

            $mvcClass = $controller::get();
            if(method_exists($mvcClass, $action))
                $mvcClass->{$action}();

            $mvcClass->render();
        }

    }

}