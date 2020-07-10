<?php
require_once "../models/Game.class.php";
require_once "BddController.class.php";

class GameController {

    private $bddController = BddController::getBddController();
    
    public function __construct() {

    }
    
}
