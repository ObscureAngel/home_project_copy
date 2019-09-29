<?php
require_once 'BddChoice.class.php';
require_once 'connect_pdo.php';
require_once 'config.inc.php';
class GetRequest {
	
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
	
	public function getVideoType() {
		$response = array();
		
		$query = "SELECT * FROM ".TBL_VID_TYPE." ORDER BY ".COL_TYPE_LABEL;
		$result = $this->bdd->query($query);
		while ($data = $result->fetchObject()) {
			$response[$data->{COL_TYPE_LABEL}] = array(
					"typeCode" => $data->{COL_TYPE_REF},
					"typeLabel" => $data->{COL_TYPE_LABEL},
			);
		}
		
		return $response;
	}
	
	/**
	 * @return array
	 */
	public function getCategory() {
		$response = array();
		
		$query = "SELECT * FROM ".TBL_CATEGORY." ORDER BY ".COL_CATEGORY_LABEL;
		$result = $this->bdd->query($query);
		while ($data = $result->fetchObject()) {
			$response[$data->{COL_CATEGORY_LABEL}] = array(
					"categoryCode" => $data->{COL_CATEGORY_CODE},
					"categoryLabel" => $data->{COL_CATEGORY_LABEL},
			);
		}
		
		return $response;
	}
	
	/**
	 * @return array
	 */
	public function getAudio() {
		$response = array();
		
		$query = "SELECT * FROM ".TBL_AUDIO." ORDER BY ".COL_AUDIO_LABEL;
		$result = $this->bdd->query($query);
		while ($data = $result->fetchObject()) {
			$response[$data->{COL_AUDIO_LABEL}] = array(
					"audioCode" => $data->{COL_AUDIO_CODE},
					"audioLabel" => $data->{COL_AUDIO_LABEL},
			);
		}
		
		return $response;
	}
	
	/**
	 * @return array
	 */
	public function getSubtitle() {
		$response = array();
		
		$query = "SELECT * FROM ".TBL_SUBTITLE." ORDER BY ".COL_SUBTITLE_LABEL;
		$result = $this->bdd->query($query);
		while ($data = $result->fetchObject()) {
			$response[$data->{COL_SUBTITLE_LABEL}] = array(
					"subtitleCode" => $data->{COL_SUBTITLE_CODE},
					"subtitleLabel" => $data->{COL_SUBTITLE_LABEL},
			);
		}
		
		return $response;
	}
	
	/**
	 * @return array
	 */
	public function getQuality() {
		$response = array();
		
		$query = "SELECT * FROM ".TBL_QUALITY." ORDER BY ".COL_QUALITY_LABEL;
		$result = $this->bdd->query($query);
		while ($data = $result->fetchObject()) {
			$response[$data->{COL_QUALITY_LABEL}] = array(
					"qualityCode" => $data->{COL_QUALITY_CODE},
					"qualityLabel" => $data->{COL_QUALITY_LABEL},
			);
		}
		
		return $response;
	}
	
	/**
	 * @param array $search
	 * @return array
	 */
	public function getListFromSearch($search) {
		$response = array();
				
		$query = "SELECT * FROM ".TBL_FILMS."
		JOIN ".TBL_VID_TYPE." USING (".COL_TYPE_REF.")
		LEFT JOIN ".TBL_AUDIO." USING (".COL_AUDIO_CODE.")
		LEFT JOIN ".TBL_SUBTITLE." USING (".COL_SUBTITLE_CODE.")
		LEFT JOIN ".TBL_CATEGORY." USING (".COL_CATEGORY_CODE.")
		LEFT JOIN ".TBL_QUALITY." USING (".COL_QUALITY_CODE.")
		";
		
		switch ($search['filter']) {
			case 'genre':
				$query .= "WHERE ".COL_CATEGORY_CODE." =".$search['value'];
				break;
			
			case 'audio':
				$query .= "WHERE ".COL_AUDIO_CODE." =".$search['value'];
				break;
				
			case 'subtitle':
				$query .= "WHERE ".COL_SUBTITLE_CODE." =".$search['value'];
				break;
				
			case 'quality':
				$query .= "WHERE ".COL_QUALITY_CODE." =".$search['value'];
				break;
				
			default:
				$query .= "";
				break;
		}
		
		$result = $this->bdd->query($query);
		while ($data = $result->fetchObject()) {
			if (empty($data->{COL_SUBTITLE_LABEL})) {
				$data->{COL_SUBTITLE_LABEL} = "Aucun";
			}
			if (empty($data->{COL_QUALITY_LABEL})) {
				$data->{COL_QUALITY_LABEL} = "Inconnue";
			}
			if (empty($data->{COL_CATEGORY_LABEL})) {
				$data->{COL_CATEGORY_LABEL} = "Non d&eacute;finie";
			}
			
			$response[$data->{COL_FILM_TITLE}] = array(
					"movie" => $data->{COL_FILM_REF},
					"type_ref" => $data->{COL_TYPE_REF},
					"type" => $data->{COL_TYPE_LABEL},
					"title" => $data->{COL_FILM_TITLE},
					"category" => $data->{COL_CATEGORY_LABEL},
					"audio" => $data->{COL_AUDIO_LABEL},
					"subtitle" => $data->{COL_SUBTITLE_LABEL},
					"quality" => $data->{COL_QUALITY_LABEL},
					"duration" => $data->{COL_FILM_DURATION},
			);
		}
		
		return $response;
	}
}