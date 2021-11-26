<?php

namespace ICS\WebsearchBundle\Service\Interfaces;

interface WebSearchServiceInterface
{

    public function search($search, int $nbresult = 10);

    public function searchNews($search, int $nbresult = 10);

    public function searchImages($search, int $nbresult = 10);

    public function searchVideos($search, int $nbresult = 10);

    public function searchWeb($search, int $nbresult = 10);
}
