<?php
require_once "../models/Movie.class.php";
require_once "BddController.class.php";

class MovieController {

    private $bddController = BddController::getBddController();
    
    public function __construct() {

    }
    
}
