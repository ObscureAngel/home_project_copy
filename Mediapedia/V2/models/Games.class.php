<?php
require_once 'Resource.class.php';
/**
 *
 */
class Games extends Resource {

    /**
     * @var int
     */
    private $pegi;

    /**
     * @var SystemRequirement
     */
    private $minimumRequirement;

    /**
     * @var SystemRequirement
     */
    private $optimalRequirement;

    function __construct($minimumRequirement, $pegi = 3, $optimalRequirement = NULL) {
        $this->minimumRequirement = $minimumRequirement;
        $this->pegi = $pegi;
        $this->optimalRequirement = $optimalRequirement;
    }
}

?>
