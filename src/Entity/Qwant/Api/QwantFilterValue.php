<?php
namespace ICS\WebsearchBundle\Entity\Qwant\Api;

class QwantFilterValue
{
    private $value;
    private $label;
    private $translate;

    public function __construct($qwantResponseFilterValue)
    {
        $this->value = $qwantResponseFilterValue->value;
        $this->label = $qwantResponseFilterValue->label;
        $this->translate = $qwantResponseFilterValue->translate;
    }

    /**
     * Get the value of value
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Get the value of label
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Get the value of translate
     */
    public function getTranslate()
    {
        return $this->translate;
    }
}