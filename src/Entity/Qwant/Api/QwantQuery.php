<?php
namespace ICS\WebsearchBundle\Entity\Qwant\Api;


class QwantQuery
{
    private $locale;
    private $query;
    private $offset;

    public function __construct($qwantResponseQuery)
    {
        $this->locale = $qwantResponseQuery->locale;
        $this->query = $qwantResponseQuery->query;
        $this->offset = $qwantResponseQuery->offset;
    }


    /**
     * Get the value of locale
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * Get the value of query
     */
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * Get the value of offset
     */
    public function getOffset()
    {
        return $this->offset;
    }
}
