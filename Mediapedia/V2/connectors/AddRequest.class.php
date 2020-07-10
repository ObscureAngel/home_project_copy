<?php
require_once 'config.inc.php';
require_once 'PDOMysql.class.php';

class AddRequest {

	/**
	 * @var PDOMysql
	 */
	public $co_bdd;

	public function __construct($ps_dbuser = NULL, $ps_dbpswd = NULL) {
		$this->co_bdd = new PDOMysql($ps_dbuser, $ps_dbpswd);
	}

	public function fct_addResource($resource) {

		return true;
	}

	public function fct_addBook($book) {

		return true;
	}

	public function fct_addGame($game) {

		return true;
	}

	public function fct_addMovie($movie) {

		return true;
	}

	public function fct_addMusic($music) {

		return true;
	}

	public function fct_addSystemRequirement($systemRequirement) {

		return true;
	}
}
