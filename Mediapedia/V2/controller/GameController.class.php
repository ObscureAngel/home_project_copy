<?php
require_once "../models/Game.class.php";
require_once "../connectors/AddRequest.class.php";
require_once "../connectors/GetRequest.class.php";
require_once "../connectors/EditRequest.class.php";
require_once "../connectors/DeleteRequest.class.php";

class GameController {

    private static AddRequest addBdd = new AddRequest();
    private static GetRequest getBdd = new GetRequest();
    private static EditRequest editBdd = new EditRequest();
    private static DeleteRequest deleteBdd = new DeleteRequest();
    
}
