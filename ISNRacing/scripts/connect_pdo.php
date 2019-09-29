<?php
$dbhost = "localhost";
$dbname = "isn_racing_V1";
$dbuser = "root";
$dbpswd = "";

try {
	
	$db = new PDO ( "mysql:host=" . $dbhost . ";dbname=" . $dbname, $dbuser, $dbpswd );
	$db->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
	$db->setAttribute ( PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ );
	$db->setAttribute ( PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES UTF8' );
} catch ( PDOException $e ) {
	new PDOException ( "Error  : " . $e->getMessage () );
	print ("Error : " . $e->getMessage ()) ;
}
?>