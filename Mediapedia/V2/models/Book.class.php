<?php
require_once 'Resource.class.php';
require_once 'Person.class.php';
require_once 'Category.class.php';

class Book extends Resource {
	
	/**
	 * @var Person
	 */
	private $author;

	/**
	 * @var integer
	 */
	private $nb_pages;

	/**
	 * @var Person
	 */
	private $editor;

	/**
	 * @var Category
	 */
	private $category;
	
	function __construct() {
		;
	}
}