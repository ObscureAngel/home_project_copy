<?php
$name = "home";
$host = "localhost";
$user = "root";
$pwd = "";

try {
	
	$db = new PDO ( "mysql:host=" . $host . ";dbname=" . $name, $user, $pwd );
	$db->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
	$db->setAttribute ( PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ );
	$db->setAttribute ( PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8' );
	$db->exec("SET CHARACTER SET utf8");
} catch ( PDOException $e ) {
	new PDOException ( "Error  : " . $e->getMessage () );
}
?>