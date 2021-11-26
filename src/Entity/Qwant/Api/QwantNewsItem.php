<?php

namespace ICS\WebsearchBundle\Entity\Qwant\Api;

use DateTime;

class QwantNewsItem extends QwantItem
{

    private $date;
    private $domain;
    private $pressName;
    private $medias;
    private $shortDescription;


    public function __construct($qwantResponseItem)
    {
        parent::__construct($qwantResponseItem);

        $this->date = new DateTime();
        $this->date->setTimestamp($qwantResponseItem->date);
        $this->domain = $qwantResponseItem->domain;
        $this->pressName = $qwantResponseItem->press_name;
        foreach ($qwantResponseItem->media as $media) {
            $this->medias[] = new QwantNewsMedia($media);
        }

        if (isset($qwantResponseItem->desc_short)) {
            $this->shortDescription = $qwantResponseItem->desc_short;
        }


        $this->type = QwantItem::TYPE_NEWS;
    }



    /**
     * Get the value of date
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Get the value of domain
     */
    public function getDomain()
    {
        return $this->domain;
    }



    /**
     * Get the value of media
     */
    public function getMedias()
    {
        return $this->medias;
    }

    /**
     * Get the value of shortDescription
     */
    public function getShortDescription()
    {
        return $this->shortDescription;
    }

    public function getPressName()
    {
        return $this->pressName;
    }
}
