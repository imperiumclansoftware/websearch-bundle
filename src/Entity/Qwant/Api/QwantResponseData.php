<?php
namespace ICS\WebsearchBundle\Entity\Qwant\Api;

class QwantResponseData
{
    private $query;
    private $cache;
    private $result;

    public function __construct($qwantResponseData)
    {
        if(\property_exists($qwantResponseData,'query'))
        {
            $this->query = new QwantQuery($qwantResponseData->query);
        }
        if(\property_exists($qwantResponseData,'cache'))
        {
            $this->cache = new QwantCache($qwantResponseData->cache);
        }
        if(\property_exists($qwantResponseData,'result'))
        {
            $this->result = new QwantResult($qwantResponseData->result);
        }
    }

    /**
     * Get the value of query
     */
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * Get the value of cache
     */
    public function getCache()
    {
        return $this->cache;
    }

    /**
     * Get the value of result
     */
    public function getResult()
    {
        return $this->result;
    }
}