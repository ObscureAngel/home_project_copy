<?php
require_once 'config.inc.php';

class AddRequest {

	/**
	 * @var PDOMysql
	 */
	private $bdd;

	function __construct($dbuser = NULL, $dbpswd = NULL) {
		if ($dbuser != NULL) {
			if ($dbuser != $this->bdd->getUser()) {
				unlink("PDOMysql.txt");
			}
		}

		if (!file_exists("PDOMysql.txt") OR !isset($this->bdd)) {
			$this->bdd = new PDOMysql($dbuser, $dbpswd);
			file_put_contents("PDOMysql.txt", serialize($this->bdd));
		} else if (file_exists("PDOMysql.txt")) {
			$this->bdd = unserialize(file_get_contents("PDOMysql.txt"));
		}
	}

	function addResource($resource) {

		return true;
	}

	function addBook($book) {

		return true;
	}

	function addGame($game) {

		return true;
	}

	function addMovie($movie) {

		return true;
	}

	function addMusic($music) {

		return true;
	}

	function addSystemRequirement($systemRequirement) {

		return true;
	}
}
