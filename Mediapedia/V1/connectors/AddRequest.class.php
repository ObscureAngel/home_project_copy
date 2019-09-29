<?php
require_once 'BddChoice.class.php';
require_once 'connect_pdo.php';
require_once 'config.inc.php';
require_once 'GetRequest.class.php';

class AddRequest {
	
	/**
	 * @var PDO
	 */
	private $bdd;
	
	/**
	 * @param string $bddConnector
	 */
	public function __construct($bddConnector) {
		$this->bdd = new PDO ( "mysql:host=localhost;dbname=home", "root", "");
		$this->bdd->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
		$this->bdd->setAttribute ( PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ );
		$this->bdd->setAttribute ( PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8' );
 		$this->bdd->exec("SET CHARACTER SET utf8");
 		//$this->bdd = BddChoice::getBdd($bddConnector);
	}
	
	private function getMaxFilmType($type) {
		$query = "SELECT max(".COL_FILM_REF.")+1 as nbMax FROM ".TBL_FILMS. " WHERE ".COL_TYPE_REF." = '".$type."'";
		$result = $this->bdd->query($query);
		$data = $result->fetchObject();
		
		return $data->nbMax;
	}
	
	/**
	 * @param array $categoryContent
	 * @throws Exception
	 * @return boolean
	 */
	public function addCategory($categoryContent) {
		if (!isset($categoryContent['categoryCode']) || empty($categoryContent['categoryCode'])) {
			throw new Exception(MSG_EMPTY_FIELD, CODE_EMPTY_FIELD);
		}
		
		if (!isset($categoryContent['categoryLabel']) || empty($categoryContent['categoryLabel'])) {
			throw new Exception(MSG_EMPTY_FIELD, CODE_EMPTY_FIELD);
		}
		
		$insertion = "INSERT INTO ".TBL_CATEGORY."(".COL_CATEGORY_CODE.", ".COL_CATEGORY_LABEL.") VALUES (".$categoryContent['categoryCode'].", ".$categoryContent['categoryLabel'].")";
		
		if ($this->bdd->exec($insertion) === 0) {
			throw new Exception(MSG_NOT_INSERTED, CODE_NOT_INSERTED);
		}
		
		return true;
	}
	
	/**
	 * @param array $filmContent
	 * @param string $filmContent['type']
	 * @param string $filmContent['title']
	 * @param int $filmContent['category']
	 * @param int $filmContent['subtitle']
	 * @param int $filmContent['audio']
	 * @param int $filmContent['quality']
	 * @param int $filmContent['duration']
	 * @param date $filmContent['entry']
	 * @throws Exception
	 * @return boolean
	 */
	public function addFilm($filmContent) {
		$insertion = "INSERT INTO ".TBL_FILMS."(".COL_TYPE_REF.", ".COL_FILM_REF.", ".COL_FILM_TITLE.", ".COL_CATEGORY_CODE.", ".COL_SUBTITLE_CODE.", ".COL_AUDIO_CODE.", ".COL_QUALITY_CODE.", ".COL_FILM_DURATION.", ".COL_FILM_ENTRY.") 
					VALUES (
					'".$filmContent['type']."', 
					".$this->getMaxFilmType($filmContent['type']).", 
					'".$filmContent['title']."', 
					".$filmContent['category'].", 
					".$filmContent['subtitle'].", 
					".$filmContent['audio'].", 
					".$filmContent['quality'].", 
					".$filmContent['duration'].",
					".$filmContent['entry'].")";
		
		
		if ($this->bdd->exec($insertion) === 0) {
			throw new Exception(MSG_NOT_INSERTED, CODE_NOT_INSERTED);
		}
		
		return true;
	}
}