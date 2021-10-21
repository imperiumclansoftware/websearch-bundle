<?php
namespace ICS\WebsearchBundle\Entity\Qwant;

use ICS\WebsearchBundle\Entity\Qwant\Api\QwantVideoItem;

class QwantVideoSearchResult extends QwantSearchResult
{
    private $media;
    private $thumbnail;
    private $thumbWidth;
    private $thumbHeight;
    private $width;
    private $height;
    private $channel;
    private $source;

    public function __construct(QwantVideoItem $item)
    {
        parent::__construct($item);

        $this->media = $item->getMedia();
        $this->thumbnail = $item->getThumbnail();
        $this->thumbWidth = $item->getThumbWidth();
        $this->thumbHeight = $item->getThumbHeight();
        $this->width = $item->getWidth();
        $this->height = $item->getHeight();
        $this->channel = $item->getChannel();
        $this->source = $item->getSource();
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
     * Get the value of channel
     */
    public function getChannel()
    {
        return $this->channel;
    }

    /**
     * Get the value of source
     */
    public function getSource()
    {
        return $this->source;
    }
}