<?php
require_once 'config.inc.php';

class GetRequest {

	/**
	 * @var PDOMysql
	 */
	private $bdd;

	/**
	 * @param string $dbuser
	 * @param string $dbpswd
	 */
	function __construct($dbuser = "home_client", $dbpswd = "homeV2bdd") {
		new PDOMysql($dbuser, $dbpswd);
	}

	/* RESOURCE */

	function getIdResource() {
		$sel = COL_RES_REF;
		$from = TBL_RESOURCE;
		$query ="SELECT ".$sel." FROM ".$from;

	}

	function getResourceTitle($idRes) {
		$sel = COL_RES_TITLE;
		$from = TBL_RESOURCE;
		$where = "";
		$query = "";
	}
}
