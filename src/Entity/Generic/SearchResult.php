<?php
namespace ICS\WebsearchBundle\Entity\Generic;

class SearchResult
{
    private $title;
    private $url;
    private $description;

    /**
     * Get the value of title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */
    protected function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of url
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set the value of url
     *
     * @return  self
     */
    protected function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get the value of description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */
    protected function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }
}