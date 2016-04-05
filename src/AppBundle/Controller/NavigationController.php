<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class NavigationController extends Controller
{
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function disciplinesNavigationAction(Request $request)
    {
        $disciplineService = $this->get('app.service.discipline');

        $disciplines = $disciplineService->getDisciplines();

        return $this->render('AppBundle:Navigation:disciplines.html.twig', array(
            'disciplines' => $disciplines
        ));
    }
}
