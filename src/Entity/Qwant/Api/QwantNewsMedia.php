<?php

namespace ICS\WebsearchBundle\Entity\Qwant\Api;

class QwantNewsMedia
{
    private $picture;
    private $pictureBig;

    public function __construct($qwantNewsMedia)
    {
        $this->picture = new QwantNewsPicture($qwantNewsMedia->pict);
        $this->pictureBig = new QwantNewsPicture($qwantNewsMedia->pict_big);
    }

    /**
     * Get the value of picture
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Get the value of pictureBig
     */
    public function getPictureBig()
    {
        return $this->pictureBig;
    }
}