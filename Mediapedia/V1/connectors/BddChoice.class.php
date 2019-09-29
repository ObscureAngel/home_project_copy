<?php
require_once 'connect_pdo.php';
class BddChoice {
	
	
	
	/**
	 * @param string $choice
	 */
	public static function getBdd($choice) {
		switch ($choice) {
			case 'PDO':
				return new PDOBdd("root", ""); 
				break;
			
			default:
				return new PDOBdd("root", "");
				break;
		}
	}
}