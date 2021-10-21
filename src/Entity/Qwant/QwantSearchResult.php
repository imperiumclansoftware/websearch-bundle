<?php
namespace ICS\WebsearchBundle\Entity\Qwant;

use ICS\WebsearchBundle\Entity\Generic\SearchResult;
use ICS\WebsearchBundle\Entity\Qwant\Api\QwantImageItem;
use ICS\WebsearchBundle\Entity\Qwant\Api\QwantItem;
use ICS\WebsearchBundle\Entity\Qwant\Api\QwantWebItem;

abstract class QwantSearchResult extends SearchResult
{
    private $item;

    private $type;

    public function __construct(QwantItem $item)
    {
        $this->setTitle($item->getTitle());
        $this->setUrl($item->getUrl());
        $this->setDescription($item->getDescription());
        $this->type = $item->getType();
        $this->item = $item;
    }

    public static function createFromQwantItem(QwantItem $item)
    {
        if(is_a($item,QwantWebItem::class))
        {
            return new QwantWebSearchResult($item);
        }
        elseif(is_a($item,QwantImageItem::class))
        {
            return new QwantImageSearchResult($item);
        }


    }

    /**
     * Get the value of item
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     * Set the value of item
     *
     * @return  self
     */
    public function setItem($item)
    {
        $this->item = $item;

        return $this;
    }

    /**
     * Get the value of type
     */
    public function getType()
    {
        return $this->type;
    }
}