<?php
namespace ICS\WebsearchBundle\Entity\Qwant;

use ICS\WebsearchBundle\Entity\Qwant\Api\QwantNewsItem;

class QwantNewsSearchResult extends QwantSearchResult
{

    private $date;
    private $domain;
    private $category;
    private $medias;
    private $shortDescription;

    public function __construct(QwantNewsItem $item)
    {
        parent::__construct($item);

        $this->date = $item->getDate();
        $this->domain = $item->getDomain();
        $this->category = $item->getCategory();
        $this->medias = $item->getMedias();
        $this->shortDescription = $item->getShortDescription();
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
     * Get the value of category
     */
    public function getCategory()
    {
        return $this->category;
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
}