<?php
namespace ICS\WebsearchBundle\Entity\Qwant\Api;

class QwantWebItem extends QwantItem
{

    private $favicon;
    private $source;
    private $score;
    private $position;

    public function __construct($qwantResponseItem)
    {
        parent::__construct($qwantResponseItem);
        $this->favicon = $qwantResponseItem->favicon;
        $this->source = $qwantResponseItem->source;
        $this->score = $qwantResponseItem->score;
        $this->position = $qwantResponseItem->position;
        $this->type = "web";
    }

    /**
     * Get the value of favicon
     */
    public function getFavicon()
    {
        return $this->favicon;
    }

    /**
     * Get the value of source
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * Get the value of score
     */
    public function getScore()
    {
        return $this->score;
    }

     /**
     * Get the value of position
     */
    public function getPosition()
    {
        return $this->position;
    }
}