<?php
namespace ICS\WebsearchBundle\Entity\Qwant\Api;

class QwantFilter
{
    private $label;
    private $name;
    private $type;
    private $selected;
    private $values = [];

    public function __construct($qwantResponseFilters)
    {
        $this->label = $qwantResponseFilters->label;
        $this->name = $qwantResponseFilters->name;
        $this->type = $qwantResponseFilters->type;
        $this->selected = $qwantResponseFilters->selected;
        foreach($qwantResponseFilters->values as $value)
        {
            $this->values[] = new QwantFilterValue($value);
        }
    }

    /**
     * Get the value of values
     */
    public function getValues()
    {
        return $this->values;
    }

    /**
     * Get the value of selected
     */
    public function getSelected()
    {
        return $this->selected;
    }

    /**
     * Get the value of type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the value of label
     */
    public function getLabel()
    {
        return $this->label;
    }
}