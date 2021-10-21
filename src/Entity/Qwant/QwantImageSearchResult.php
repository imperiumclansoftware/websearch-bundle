<?php
namespace ICS\WebsearchBundle\Entity\Qwant;

use ICS\WebsearchBundle\Entity\Qwant\Api\QwantImageItem;
use ICS\WebsearchBundle\Entity\Qwant\Api\QwantWebItem;

class QwantImageSearchResult extends QwantSearchResult
{
    private $media;
    private $thumbnail;
    private $thumbWidth;
    private $thumbHeight;
    private $width;
    private $height;
    private $size;
    private $mediaFullsize;
    private $mediaPreview;

    public function __construct(QwantImageItem $item)
    {
        parent::__construct($item);

        $this->media = $item->getMedia();
        $this->thumbnail = $item->getThumbnail();
        $this->thumbWidth = $item->getThumbWidth();
        $this->thumbHeight = $item->getThumbHeight();
        $this->width = $item->getWidth();
        $this->height = $item->getHeight();
        $this->size = $item->getSize();
        $this->mediaFullsize = $item->getMediaFullsize();
        $this->mediaPreview = $item->getMediaPreview();
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
     * Get the value of size
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Get the value of mediaFullsize
     */
    public function getMediaFullsize()
    {
        return $this->mediaFullsize;
    }

    /**
     * Get the value of mediaPreview
     */
    public function getMediaPreview()
    {
        return $this->mediaPreview;
    }
}