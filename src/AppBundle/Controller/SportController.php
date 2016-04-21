<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SportController extends Controller
{
    /**
     * @param Request $request
     * @param $discipline
     * @param $state
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request, $discipline, $state)
    {
        return $this->render('AppBundle::sport.html.twig', array());
    }

    /**
     * @param Request $request
     * @param $discipline
     * @param $page
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function pageAction(Request $request, $discipline, $page)
    {
        $navigationService = $this->get('app.service.navigation');
        $navigationNode = $navigationService->getNavigationByRoute($page);

        return $this->render('AppBundle::startPage.html.twig', array(
            'content' => $navigationNode->getContent()
        ));
    }

}
