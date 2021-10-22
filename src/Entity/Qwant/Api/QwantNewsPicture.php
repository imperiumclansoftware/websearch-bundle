<?php

namespace ICS\WebsearchBundle\Entity\Qwant\Api;

class QwantNewsPicture
{
    private $url;
    private $width;
    private $height;
    private $type;

    public function __construct($qwantNewsPicture)
    {
        $this->url = $qwantNewsPicture->url;
        $this->width = $qwantNewsPicture->width;
        $this->height = $qwantNewsPicture->height;
        $this->type = $qwantNewsPicture->type;
    }

    /**
     * Get the value of url
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Get the value of width
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Get the value of height
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Get the value of type
     */
    public function getType()
    {
        return $this->type;
    }
}