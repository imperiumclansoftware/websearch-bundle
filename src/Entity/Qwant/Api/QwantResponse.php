<?php

namespace ICS\WebsearchBundle\Entity\Qwant\Api;

class QwantResponse
{
    private $status;
    private $data;

    public function __construct($webResult)
    {
        $objectResult = json_decode($webResult);
        $this->status = $objectResult->status;
        if ($this->status == 'success') {
            $this->data = new QwantResponseData($objectResult->data);
        }
    }

    /**
     * Get the value of status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Get the value of data
     */
    public function getData()
    {
        return $this->data;
    }
}
