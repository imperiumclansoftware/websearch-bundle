<?php

namespace ICS\WebsearchBundle\Controller;

use ICS\WebsearchBundle\Service\QwantService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class WebsearchController extends AbstractController
{

    /**
     * @Route("/",name="ics-websearch-homepage")
     */
    public function index(Request $request, QwantService $service)
    {
        $search = $request->get('search');
        $nbResult = (int)$request->get('nbresult', 10);
        $safesearch = (bool)$request->get('safesearch', false);

        $service->setSafesearch($safesearch);

        $webResults = [];
        $newsResults = [];
        $imageResults = [];
        $videoResults = [];

        if ($search != null) {
            $webResults = $service->searchWeb($search, $nbResult);
            $newsResults = $service->searchNews($search, $nbResult);
            $imageResults = $service->searchImages($search, $nbResult);
            $videoResults = $service->searchVideos($search, $nbResult);
        }

        return $this->render('@Websearch\index.html.twig', [
            'webResults' => $webResults,
            'newsResults' => $newsResults,
            'imageResults' => $imageResults,
            'videoResults' => $videoResults,
            'search' => $search,
            'nbResult' => $nbResult,
            'nbResults' => [10, 20, 50, 100],
            'safesearch' => $safesearch
        ]);
    }
}
