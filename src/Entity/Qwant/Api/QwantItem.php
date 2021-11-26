<?php

namespace ICS\WebsearchBundle\Entity\Qwant\Api;

class QwantItem
{
    const TYPE_IMAGE = 'image';
    const TYPE_WEB = 'web';
    const TYPE_NEWS = 'news';
    const TYPE_VIDEO = 'video';


    protected $type;
    private $title;
    private $url;

    private $description;
    private $id;



    public function __construct($qwantResponseItem)
    {
        $this->title = $qwantResponseItem->title;
        $this->url = $qwantResponseItem->url;
        if (isset($qwantResponseItem->desc)) {
            $this->description = $qwantResponseItem->desc;
        }
        $this->id = $qwantResponseItem->_id;
    }

    /**
     * Get the value of title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Get the value of url
     */
    public function getUrl()
    {
        return $this->url;
    }



    /**
     * Get the value of desc
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }



    public static function createItemFromResponse($qwantResponseItem)
    {
        if (property_exists($qwantResponseItem, 'press_name')) {
            return new QwantNewsItem($qwantResponseItem);
        }

        if (property_exists($qwantResponseItem, 'thumb_type')) {
            return new QwantImageItem($qwantResponseItem);
        }

        if (property_exists($qwantResponseItem, 'type')) {
            return new QwantVideoItem($qwantResponseItem);
        }

        return new QwantWebItem($qwantResponseItem);
    }

    /**
     * Get the value of type
     */
    public function getType()
    {
        return $this->type;
    }
}
