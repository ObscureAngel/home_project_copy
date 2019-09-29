<?php
/**
 * @author Maxime
 *
 */
class Resource {

	/**
	 * @
	 * @var integer
	 */
	private $res_id;

	/**
	 * @var string
	 */
	private $title;

	/**
	 * @var boolean
	 */
	private $disabled;

	/**
	 * @var DateTime
	 */
	private $adding_date;

	/**
	 * @var GetRequest
	 */
	private static $getBDD;

	/**
	 * @param integer $id_res
	 * @param string $title
	 * @param string $mode
	 * @param boolean $disabled
	 */
	function __construct($id_res, $title, $mode, $disabled = FALSE) {
		$this->id_res = $id_res;
		$this->title = $title;
		$this->disabled = $disabled;

		if ($mode === "get") {
			$this->setAddingDate();
		} else {
			$this->setAddingDate(date("Y-m-d"));
		}
	}

	function getIdRes() {
		return $this->id_res;
	}

	function setIdRes($id_res) {
		$this->id_res = $id_res;
	}

	function getTitle() {
		return $this->title;
	}

	function setTitle($title) {
		$this->title = $title;
	}

	function getAddingDate() {
		return $this->adding_date;
	}

	function setAddingDate($adding_date = NULL) {
		if ($adding_date != NULL) {
			$this->adding_date = $adding_date;
		} else {
			$this->adding_date = date("Y-m-d");
		}
	}

	function getDisabled($mode) {
		if ($mode == "bool") {
			return $this->disabled;
		} else {
			if ($this->disabled) {
				return "TRUE";
			} else {
				return "FALSE";
			}
		}
	}

	function getObject() {
		return $this;
	}

	function toString() {
		return "yolo";
	}
}
