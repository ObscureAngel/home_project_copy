<?php
class Category {

    /**
     * @var Guid
     */
    private $guid;

    /**
     * @var string
     */
    private $label;
    
    function __construct() {
        $this->guid = com_create_guid();
    }
}
