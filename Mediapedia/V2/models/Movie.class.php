<?php
require_once 'Resource.class.php';

class Movie extends Resource{

	/**
	 * @var string
	 */
	private $ref_type;

	/**
	 * @var integer
	 */
	private $duration;

	/**
	 * @var integer
	 */
	private $tot_season;

	/**
	 * @param integer $id_fs
	 * @param string $title
	 * @param string $ref_type
	 * @param boolean $disabled
	 */
	function __construct($id_res, $title, $ref_type, $disabled = FALSE) {
		parent::__construct($id_res, $title, "add", $disabled);
		$this->ref_type = $ref_type;
	}

	function getParent() {
		return get_class($this->parent);
	}

	function getIdFs() {
		return parent::getIdRes();
	}

	function getRefType() {
		return $this->ref_type;
	}

	function setRefType($ref_type = NULL) {
		if ($ref_type != NULL) {
			$this->ref_type = $ref_type;
		} else {

		}
	}

	function getDuration() {
		return $this->duration;
	}

	/**
	 * @var int $duration The duration of a movie
	 */
	function setDuration($duration) {
		if (!is_numeric($duration)) throw new Exception("The duration must be a numeric");
		if ($duration < 0) throw new Exception("The duration must be positive or zero");

		$this->duration = $duration;
	}

	function getTotalSeason() {
		return $this->tot_season;
	}

	/**
	 * @var int $tot_season The amount of seasons for a serie
	 */
	function setTotalSeason($tot_season) {
		if (!is_numeric($tot_season)) throw new Exception("The number of total season must be a numeric");
		if ($tot_season < 0) throw new Exception("The number of total season must be positive or zero");

		$this->tot_season = $tot_season;
	}

	/**
	 * @return string
	 */
	function toString() {
		return "Class Movie {id_res: ".$this->getIdRes().", ref_type: ".$this->getRefType().", title: ".$this->getTitle().", duration: ".$this->getDuration().", tot_season: ".$this->getTotalSeason().", adding_date: ".$this->getAddingDate().", disabled: ".$this->getDisabled("str")."}";
	}
}
