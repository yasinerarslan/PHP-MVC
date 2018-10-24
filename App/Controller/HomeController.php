<?php
require_once(CORE . "Controller.php");
class HomeController extends Controller {
    public function IndexAction(){
        $this->View("/Home/Index");
    }
}
?>