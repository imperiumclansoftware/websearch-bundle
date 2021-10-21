<?php
namespace ICS\WebsearchBundle\Entity\Qwant\Api;

use DateInterval;
use DateTime;
use Symfony\Component\Config\Builder\Property;

class QwantCache
{
    private $key;
    private $created;
    private $expiration;
    private $status;
    private $age;
    private $version;
    private $system;
    private $mode;

    public function __construct($qwantResponseCache)
    {
        $this->key = $qwantResponseCache->key;
        if(property_exists($qwantResponseCache,'created'))
        {
            $created = new DateTime();
            $created->setTimestamp($qwantResponseCache->created);
            $this->created = $created;
        }
        if(property_exists($qwantResponseCache,'expiration'))
        {
            $this->expiration = new DateInterval('PT'.$qwantResponseCache->expiration.'S');
        }
        if(property_exists($qwantResponseCache,'status'))
        {
            $this->status = $qwantResponseCache->status;
        }
        if(property_exists($qwantResponseCache,'age'))
        {
            $this->age = new DateInterval('PT'.$qwantResponseCache->age.'S');
        }
        if(property_exists($qwantResponseCache,'version'))
        {
            $this->version = $qwantResponseCache->version;
        }
        if(property_exists($qwantResponseCache,'system'))
        {
            $this->system = $qwantResponseCache->system;
        }
        if(property_exists($qwantResponseCache,'mode'))
        {
            $this->mode = $qwantResponseCache->mode;
        }
    }

    /**
     * Get the value of key
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Get the value of mode
     */
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * Get the value of created
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Get the value of expiration
     */
    public function getExpiration()
    {
        return $this->expiration;
    }

    /**
     * Get the value of status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Get the value of age
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Get the value of version
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Get the value of system
     */
    public function getSystem()
    {
        return $this->system;
    }
}