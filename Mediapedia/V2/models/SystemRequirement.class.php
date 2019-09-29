<?php
/**
 * @author Maxime
 */
class SystemRequirement {

    /**
     * @var string
     */
    private $guid;

    /**
     * @var string
     */
    private $os;

    /**
     * @var string
     */
    private $cpu;

    /**
     * @var int
     */
    private $ram;

    /**
     * @var string
     */
    private $graphicCard;

    /**
     * @var int
     * @desc Amount of GB required for the configuration
     */
    private $hddCapacity;

    /**
     * @var string
     */
    private $soundCard;

    /**
     * @param string $os
     * @param string $cpu
     * @param int $ram
     * @param string $graphicCard
     * @param int $hddCapacity
     * @param string $soundCard
     */
    function __construct($os, $cpu, $ram, $graphicCard, $hddCapacity, $soundCard = "", $guid = "") {
        $this->os = $os;
        $this->cpu = $cpu;
        $this->ram = $cpu;
        $this->graphicCard = $graphicCard;
        $this->hddCapacity = $hddCapacity;
        $this->soundCard = $soundCard;
        if (empty($guid)) {
            $this->guid = com_create_guid();
        } else {
            $this->guid = $guid;
        }
    }
}

?>
