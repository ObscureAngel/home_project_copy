<?php
require_once "Mediapedia/V2/models/Book.class.php";
require_once "BddController.class.php";

class BookController {

    private $bddController;
    
    public function __construct() {
        BddController::fct_initialiserBddController();
    }

    public function fct_enregistreEnBase($po_book) {
        BddController::$cso_addRequest->fct_addBook(null);
        return true;
    }
}
