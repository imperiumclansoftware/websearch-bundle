<?php

namespace ICS\WebsearchBundle\Service;

use ICS\WebsearchBundle\Entity\Qwant\Api\QwantResponse;
use ICS\WebsearchBundle\Entity\Qwant\QwantImageSearchResult;
use ICS\WebsearchBundle\Entity\Qwant\QwantNewsSearchResult;
use ICS\WebsearchBundle\Entity\Qwant\QwantVideoSearchResult;
use ICS\WebsearchBundle\Entity\Qwant\QwantWebSearchResult;
use Symfony\Component\DependencyInjection\ParameterBag\ContainerBagInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class QwantService extends WebSearchService
{
    private $globalOptions = [];
    private $config;

    private $defaultSaveSearch;

    public function __construct(HttpClientInterface $client, ContainerBagInterface $params)
    {

        $this->config = $params->get('websearch');

        parent::__construct($client);
        $this->apiUrl = "https://api.qwant.com/v3/search";

        $this->defaultSaveSearch = $this->config['safesearch'];
        $this->globalOptions['safesearch'] = $this->config['safesearch'];
        $this->globalOptions['device'] = 'desktop';
        $this->globalOptions['locale'] = 'fr_FR';
    }

    public function search($search, int $nbresult = 10)
    {
        $results = [];

        $results = array_merge($results, $this->searchWeb($search, $nbresult));
        $results = array_merge($results, $this->searchImages($search, $nbresult));
        $results = array_merge($results, $this->searchVideos($search, $nbresult));
        $results = array_merge($results, $this->searchNews($search, $nbresult));

        return $results;
    }

    public function searchNews($search, int $nbresult = 10)
    {
        $results = [];

        $this->globalOptions['t'] = 'news';
        $this->globalOptions['q'] = trim($search);
        $this->globalOptions['count'] = $nbresult;
        $response = $this->getClient()->request('GET', $this->computeUrl());
        $QwantResponse = new QwantResponse($response->getContent());
        foreach ($QwantResponse->getData()->getResult()->getItems() as $item) {
            $results[] = new QwantNewsSearchResult($item);
        }

        return $results;
    }

    public function searchImages($search, int $nbresult = 10)
    {

        $results = [];

        $this->globalOptions['t'] = 'images';
        $this->globalOptions['q'] = trim($search);
        $this->globalOptions['count'] = $nbresult;

        $response = $this->getClient()->request('GET', $this->computeUrl());

        $QwantResponse = new QwantResponse($response->getContent());

        foreach ($QwantResponse->getData()->getResult()->getItems() as $item) {
            $results[] = new QwantImageSearchResult($item);
        }

        return $results;
    }

    public function searchVideos($search, int $nbresult = 10)
    {

        $results = [];

        $this->globalOptions['t'] = 'videos';
        $this->globalOptions['q'] = trim($search);
        $this->globalOptions['count'] = $nbresult;

        $response = $this->getClient()->request('GET', $this->computeUrl());

        $QwantResponse = new QwantResponse($response->getContent());

        foreach ($QwantResponse->getData()->getResult()->getItems() as $item) {
            $results[] = new QwantVideoSearchResult($item);
        }

        return $results;
    }

    public function searchWeb($search, int $nbresult = 10)
    {

        $results = [];
        $lastPage = false;
        $page = 0;
        while (count($results) < $nbresult && !$lastPage) {
            $this->globalOptions['t'] = 'web';
            $this->globalOptions['q'] = trim($search);
            //$this->globalOptions['count'] = $nbresult;
            $this->globalOptions['page'] = $page;

            $response = $this->getClient()->request('GET', $this->computeUrl());

            $QwantResponse = new QwantResponse($response->getContent());
            $lastPage = $QwantResponse->getData()->getResult()->isLastPage();
            foreach ($QwantResponse->getData()->getResult()->getItems() as $item) {
                $results[] = new QwantWebSearchResult($item);
            }

            $page++;
        }

        return $results;
    }

    public function computeUrl()
    {
        $finalUrl = $this->apiUrl . '/' . $this->globalOptions['t'];

        if (count($this->globalOptions) > 0) {
            $finalUrl = $finalUrl . '?';
            $i = count($this->globalOptions);
            foreach ($this->globalOptions as $key => $value) {
                $i--;
                $finalUrl .= $key . "=" . $value;
                if ($i != 0) {
                    $finalUrl .= "&";
                }
            }
        }

        return $finalUrl;
    }

    public function getSafesearch(): bool
    {
        return $this->globalOptions['safesearch'] == 1;
    }

    public function setSafesearch(bool $active)
    {
        $this->globalOptions['safesearch'] = (int)$active;
    }
}
