<?php
class PDOBdd  extends PDO {
	
	/**
	 * @var string
	 */
	private $dbhost;
	
	/**
	 * @var string
	 */
	private $dbname = "home";
	
	/**
	 * @var string
	 */
	private $dbuser;
	
	/**
	 * @var string
	 */
	private $dbpswd;
	
	/**
	 * @var PDO
	 */
	private $db;
	
	/**
	 * @param string $user
	 * @param string $pwd
	 * @param string $host
	 */
	public function __construct($user, $pwd = "", $host = "localhost") {
		$this->dbhost = $host;
		$this->dbuser = $user;
		$this->dbpswd = $pwd;
		
		try {
			
			$db = new PDO ( "mysql:host=" . $this->dbhost . ";dbname=" . $this->dbname, $this->dbuser, $this->dbpswd );
			$db->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
			$db->setAttribute ( PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ );
			$db->setAttribute ( PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8' );
			$db->exec("SET CHARACTER SET utf8");
		} catch ( PDOException $e ) {
			new PDOException ( "Error  : " . $e->getMessage () );
		}
	}
}
?>