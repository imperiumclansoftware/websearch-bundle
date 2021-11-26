<?php

namespace ICS\WebsearchBundle\Entity\Qwant\Api;


class QwantResult
{
    private $total;
    private $blacklisted;
    private $items = [];
    private $filters = [];
    private $lastPage = false;

    public function __construct($qwantResponseResult)
    {
        if (property_exists($qwantResponseResult, 'total')) {
            if (isset($qwantResponseResult->items->mainline)) {
                $items = $qwantResponseResult->items->mainline[0]->items;
            } else {
                $items = $qwantResponseResult->items;
            }

            foreach ($items as $item) {
                $this->items[] = QwantItem::createItemFromResponse($item);
            }

            foreach ($qwantResponseResult->filters as $key => $filter) {
                $this->filters[$key] = new QwantFilter($filter);
            }

            $this->lastPage = $qwantResponseResult->lastPage == "true";
        }

        if (property_exists($qwantResponseResult, 'blacklisted')) {
            $this->blacklisted = $qwantResponseResult->blacklisted;
        }
    }

    /**
     * Get the value of total
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Get the value of blacklisted
     */
    public function getBlacklisted()
    {
        return $this->blacklisted;
    }

    /**
     * Get the value of items
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Get the value of filters
     */
    public function getFilters()
    {
        return $this->filters;
    }

    /**
     * Get the value of lastPage
     */
    public function isLastPage()
    {
        return $this->lastPage;
    }
}
