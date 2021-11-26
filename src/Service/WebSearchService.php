<?php

namespace ICS\WebsearchBundle\Service;

use ICS\WebsearchBundle\Service\Interfaces\WebSearchServiceInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

abstract class WebSearchService implements WebSearchServiceInterface
{
    private $client;

    protected $apiUrl;

    protected function __construct(HttpClientInterface $client)
    {
        $this->client = $client->withOptions([
            'headers' => [
                'User-agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:93.0) Gecko/20100101 Firefox/93.0'
            ]
        ]);
    }

    public abstract function search($search, int $nbresult = 10);

    public abstract function searchNews($search, int $nbresult = 10);

    public abstract function searchImages($search, int $nbresult = 10);

    public abstract function searchVideos($search, int $nbresult = 10);

    public abstract function searchWeb($search, int $nbresult = 10);

    public function getClient()
    {
        return $this->client;
    }
}
