<?php
$dbhost = "127.0.0.1:3307";
$dbname = "home";
$dbuser = "root";
$dbpswd = "toor";

try {
	
	$db = new PDO ( "mysql:host=" . $dbhost . ";dbname=" . $dbname, $dbuser, $dbpswd );
	$db->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
	$db->setAttribute ( PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ );
	$db->setAttribute ( PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES UTF8' );
} catch ( PDOException $e ) {
	new PDOException ( "Error  : " . $e->getMessage () );
	print ("Error : " . $e->getMessage ()) ;
	
	if ($e->getCode() == 1049) {
		header('Location: install.php');
	}
}
?>