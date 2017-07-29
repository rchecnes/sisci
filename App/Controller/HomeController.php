<?php
require_once('Core/Controller.php');

class HomeController extends Controller{
     
    public function __construct() {
        parent::__construct();
    }

    public function index(){
        
        $this->render('Home/index.twig.html',array());
    }
}
?>