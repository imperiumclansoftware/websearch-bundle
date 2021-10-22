<?php
namespace ICS\WebsearchBundle\Entity\Qwant\Api;

class QwantItem
{
    protected $type;
    private $title;
    private $url;

    private $description;
    private $id;



    public function __construct($qwantResponseItem)
    {
        $this->title = $qwantResponseItem->title;
        $this->url = $qwantResponseItem->url;

        $this->description = $qwantResponseItem->desc;
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
        if(property_exists($qwantResponseItem,'favicon'))
        {
            return new QwantWebItem($qwantResponseItem);
        }

        if(property_exists($qwantResponseItem,'type'))
        {
            switch($qwantResponseItem->type)
            {
                case 'image' : return new QwantImageItem($qwantResponseItem);
                case 'video' : return new QwantVideoItem($qwantResponseItem);
            }
        }

        return new QwantNewsItem($qwantResponseItem);
    }

    /**
     * Get the value of type
     */
    public function getType()
    {
        return $this->type;
    }
}