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
}
