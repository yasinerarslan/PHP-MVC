<?php

class Application {

    protected $controller = "HomeController";
    protected $action = "IndexAction";
    protected $parameters = array();

    public function __construct(){
        $this->ParseURL();
        if(file_exists(CONTROLLER.$this->controller.".php")){
            require_once (CONTROLLER.$this->controller.".php");
            $this->controller = new $this->controller;
            if(method_exists($this->controller, $this->action)){
                call_user_func_array([$this->controller, $this->action], $this->parameters);
            } else {
                echo "Böyle Bir Action Yok.";
            }
        } else {
            echo "Böyle Bir Controller Yok.";
        }
    }

    protected function ParseURL(){
        $request = trim($_SERVER["REQUEST_URI"], "/");
        if (!empty($request)){
            $url = explode("/", $request);
            $this->controller = isset($url[0]) ? $url[0]."Controller" : "HomeController";
            $this->action = isset($url[1]) ? $url[1]."Action" : "IndexAction";
            unset($url[0], $url[1]);
            $this->parameters = !empty($url) ? array_values($url) : array();
        } else {
            $this->controller = "HomeController";
            $this->action = "IndexAction";
            $this->parameters = array();
        }
    }
}

?>