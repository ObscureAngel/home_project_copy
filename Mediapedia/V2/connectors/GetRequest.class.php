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
		if ($dbuser != NULL) {
			if ($dbuser != $this->bdd->getUser()) {
				unlink("PDOMysql.txt");
			}
		}

		if (!file_exists("PDOMysql.txt") OR !isset($this->bdd)) {
			$this->bdd = new PDOMysql();
			file_put_contents("PDOMysql.txt", serialize($this->bdd));
		} else if (file_exists("PDOMysql.txt")) {
			$this->bdd = unserialize(file_get_contents("PDOMysql.txt"));
		}
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
