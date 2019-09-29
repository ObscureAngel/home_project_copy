<?php
class EditRequest {
	
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
			$this->bdd = new PDOMysql();
			file_put_contents("PDOMysql.txt", serialize($this->bdd));
		} else if (file_exists("PDOMysql.txt")) {
			$this->bdd = unserialize(file_get_contents("PDOMysql.txt"));
		}
	}
}