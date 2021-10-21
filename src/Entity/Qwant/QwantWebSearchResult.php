<?php
namespace ICS\WebsearchBundle\Entity\Qwant;

use ICS\WebsearchBundle\Entity\Qwant\Api\QwantWebItem;

class QwantWebSearchResult extends QwantSearchResult
{

    private $iconUrl;
    private $sourceUrl;

    public function __construct(QwantWebItem $item)
    {
        parent::__construct($item);

        $this->setIconUrl($item->getFavicon());
        $this->setSourceUrl($item->getSource());
    }

    /**
     * Get the value of iconUrl
     */
    public function getIconUrl()
    {
        return $this->iconUrl;
    }

    /**
     * Set the value of iconUrl
     *
     * @return  self
     */
    public function setIconUrl($iconUrl)
    {
        $this->iconUrl = $iconUrl;

        return $this;
    }

    /**
     * Get the value of sourceUrl
     */
    public function getSourceUrl()
    {
        return $this->sourceUrl;
    }

    /**
     * Set the value of sourceUrl
     *
     * @return  self
     */
    public function setSourceUrl($sourceUrl)
    {
        $this->sourceUrl = $sourceUrl;

        return $this;
    }
}