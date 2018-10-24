<?php

class View {
    protected $view_file;
    protected $view_model;


    public function __construct($view_file, $view_model){
        $this->view_file = $view_file;
        $this->view_model = $view_model;
    }

    public function Render(){
        if(file_exists(VIEW.$this->view_file.".php")){
            extract($this->view_model);
            ob_start();
            ob_get_clean();
            include_once (VIEW.$this->view_file.".php");
        }
    }
}

?>