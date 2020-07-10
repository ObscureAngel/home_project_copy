<?php
class DeleteRequest {
	
	/**
	 * @var PDOMysql
	 */
	private $bdd;
	
	function __construct($dbuser = NULL, $dbpswd = NULL) {
		new PDOMysql($dbuser, $dbpswd);
	}
}