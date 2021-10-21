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
    public function index(Request $request,QwantService $service)
    {
        $search = $request->get('search');
        $searchResults=[];

        if($search!=null)
        {
            $searchResults = $service->search($search,10);
        }

        return $this->render('@Websearch\index.html.twig',[
            'results' => $searchResults,
            'search' => $search
        ]);
    }

}