<?php
require_once "../models/Music.class.php";
require_once "BddController.class.php";

class MusicController {

    private $bddController = BddController::getBddController();
    
    public function __construct() {

    }
    
}
