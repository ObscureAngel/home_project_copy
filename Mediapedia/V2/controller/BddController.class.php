<?php 

require_once "Mediapedia/V2/connectors/AddRequest.class.php";
require_once "Mediapedia/V2/connectors/GetRequest.class.php";
require_once "Mediapedia/V2/connectors/EditRequest.class.php";
require_once "Mediapedia/V2/connectors/DeleteRequest.class.php";

class BddController {
    
    static public $cso_addRequest;
    static public $cso_getRequest;
    static public $cso_editRequest;
    static public $cso_deleteRequest;
    
    public static function fct_initialiserBddController() {
        if (!isset(self::$cso_addRequest)) {
            self::$cso_addRequest = new AddRequest();
        }
        
        if (!isset(self::$cso_getRequest)) {
            self::$cso_getRequest = new GetRequest();
        }
        
        if (!isset(self::$cso_editRequest)) {
            self::$cso_editRequest = new EditRequest();
        }
        
        if (!isset(self::$cso_deleteRequest)) {
            self::$cso_deleteRequest = new DeleteRequest();
        }
    }
}

?>