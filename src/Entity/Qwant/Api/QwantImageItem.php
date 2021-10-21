<?php
namespace ICS\WebsearchBundle\Entity\Qwant\Api;

class QwantImageItem extends QwantItem
{
    private $media;
    private $thumbnail;
    private $thumbWidth;
    private $thumbHeight;
    private $width;
    private $height;
    private $size;
    private $b_id;
    private $mediaFullsize;
    private $thumbType;
    private $count;
    private $mediaPreview;

    public function __construct($qwantResponseItem)
    {
        parent::__construct($qwantResponseItem);

        $this->type = $qwantResponseItem->type;
        $this->media = $qwantResponseItem->media;
        $this->thumbnail = $qwantResponseItem->thumbnail;
        $this->thumbWidth = (int)$qwantResponseItem->thumb_width;
        $this->thumbHeight = (int)$qwantResponseItem->thumb_height;
        $this->width = (int)$qwantResponseItem->width;
        $this->height = (int)$qwantResponseItem->height;
        $this->size = (int)$qwantResponseItem->size;
        $this->b_id = $qwantResponseItem->b_id;
        $this->mediaFullsize = $qwantResponseItem->media_fullsize;
        $this->thumbType = $qwantResponseItem->thumb_type;
        $this->count = $qwantResponseItem->count;
        $this->mediaPreview = $qwantResponseItem->media_preview;
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
     * Get the value of b_id
     */
    public function getB_id()
    {
        return $this->b_id;
    }

    /**
     * Get the value of mediaFullsize
     */
    public function getMediaFullsize()
    {
        return $this->mediaFullsize;
    }

    /**
     * Get the value of thumbType
     */
    public function getThumbType()
    {
        return $this->thumbType;
    }

    /**
     * Get the value of count
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * Get the value of mediaPreview
     */
    public function getMediaPreview()
    {
        return $this->mediaPreview;
    }
}