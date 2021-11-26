<?php

namespace ICS\WebsearchBundle\Entity\Qwant\Api;

use DateTime;

class QwantVideoItem extends QwantItem
{
    private $duration;
    private $thumbWidth;
    private $thumbHeight;
    private $width;
    private $height;
    private $mediaId;
    private $media;
    private $thumbnail;
    private $date;
    private $channel;
    private $isVevo = false;
    private $source;
    private $count;

    public function __construct($qwantResponseItem)
    {
        parent::__construct($qwantResponseItem);

        $this->type = QwantItem::TYPE_VIDEO;
        $this->duration = $qwantResponseItem->duration;
        $this->thumbWidth = $qwantResponseItem->thumb_width;
        $this->thumbHeight = $qwantResponseItem->thumb_height;
        $this->width = $qwantResponseItem->width;
        $this->height = $qwantResponseItem->height;
        $this->mediaId = $qwantResponseItem->media_id;
        $this->media = $qwantResponseItem->media;
        $this->thumbnail = $qwantResponseItem->thumbnail;
        $date = new DateTime();
        $date->setTimestamp($qwantResponseItem->date);
        $this->date = $date;
        $this->channel = $qwantResponseItem->channel;
        if (property_exists($qwantResponseItem, 'is_vevo')) {
            $this->isVevo = $qwantResponseItem->is_vevo == 0;
        }
        $this->source = $qwantResponseItem->source;
        $this->count = $qwantResponseItem->count;
    }


    /**
     * Get the value of duration
     */
    public function getDuration()
    {
        return $this->duration;
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
     * Get the value of media
     */
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * Get the value of thumbnail
     */
    public function getThumbnail()
    {
        return $this->thumbnail;
    }

    /**
     * Get the value of date
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Get the value of channel
     */
    public function getChannel()
    {
        return $this->channel;
    }

    /**
     * Get the value of is_vevo
     */
    public function isVevo()
    {
        return $this->isVevo;
    }

    /**
     * Get the value of source
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * Get the value of count
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * Get the value of thumbWidth
     */
    public function getThumbWidth()
    {
        return $this->thumbWidth;
    }

    /**
     * Get the value of thumbHeight
     */
    public function getThumbHeight()
    {
        return $this->thumbHeight;
    }

    /**
     * Get the value of mediaId
     */
    public function getMediaId()
    {
        return $this->mediaId;
    }
}
