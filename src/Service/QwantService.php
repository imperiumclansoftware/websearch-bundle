<?php
namespace ICS\WebsearchBundle\Service;

use ICS\WebsearchBundle\Entity\Qwant\Api\QwantResponse;
use ICS\WebsearchBundle\Entity\Qwant\QwantImageSearchResult;
use ICS\WebsearchBundle\Entity\Qwant\QwantNewsSearchResult;
use ICS\WebsearchBundle\Entity\Qwant\QwantVideoSearchResult;
use ICS\WebsearchBundle\Entity\Qwant\QwantWebSearchResult;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class QwantService extends WebSearchService
{
    public function __construct(HttpClientInterface $client)
    {
        parent::__construct($client);
        $this->apiUrl = "https://api.qwant.com/egp/search";

    }

    public function search($search,int $nbresult=10)
    {
        $results=[];

        $results = array_merge($results,$this->searchWeb($search,$nbresult));
        $results = array_merge($results,$this->searchImages($search,$nbresult));
        $results = array_merge($results,$this->searchVideos($search,$nbresult));
        $results = array_merge($results,$this->searchMusics($search,$nbresult));
        $results = array_merge($results,$this->searchNews($search,$nbresult));

        return $results;
    }

    public function searchNews($search,int $nbresult=10)
    {
        $results=[];

        $response = $this->getClient()->request('GET',$this->apiUrl.'/news?q='.\urlencode(trim($search)).'&count='.$nbresult);
        dump(json_decode($response->getContent()));
        $QwantResponse = new QwantResponse($response->getContent());
        dump($QwantResponse);
        foreach($QwantResponse->getData()->getResult()->getItems() as $item)
        {
            $results[] = new QwantNewsSearchResult($item);
        }

        return $results;
    }

    public function searchImages($search,int $nbresult=10)
    {
        $results=[];

        $response = $this->getClient()->request('GET',$this->apiUrl.'/images?q='.\urlencode(trim($search)).'&count='.$nbresult);

        $QwantResponse = new QwantResponse($response->getContent());

        foreach($QwantResponse->getData()->getResult()->getItems() as $item)
        {
            $results[] = new QwantImageSearchResult($item);
        }

        return $results;
    }

    public function searchVideos($search,int $nbresult=10)
    {
        $results=[];

        $response = $this->getClient()->request('GET',$this->apiUrl.'/videos?q='.\urlencode(trim($search)).'&count='.$nbresult);

        $QwantResponse = new QwantResponse($response->getContent());

        foreach($QwantResponse->getData()->getResult()->getItems() as $item)
        {
            $results[] = new QwantVideoSearchResult($item);
        }

        return $results;
    }

    public function searchMusics($search,int $nbresult=10)
    {
        $results=[];

        return $results;
    }

    public function searchWeb($search,int $nbresult=10)
    {
        $results=[];
        $lastPage = false;
        $page=0;
        while(count($results) < $nbresult && !$lastPage)
        {
            $response = $this->getClient()->request('GET',$this->apiUrl.'/web?q='.\urlencode(trim($search)).'&page='.$page);

            $QwantResponse = new QwantResponse($response->getContent());
            $lastPage = $QwantResponse->getData()->getResult()->isLastPage();
            foreach($QwantResponse->getData()->getResult()->getItems() as $item)
            {
                $results[] = new QwantWebSearchResult($item);
            }

            $page++;
        }

        return $results;
    }
}