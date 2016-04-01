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
        $repository = $this->getDoctrine()
            ->getRepository('AppBundle:Discipline');

        $disciplines = $repository->findBy([], ['order' => 'ASC']);

        return $this->render('AppBundle:Navigation:disciplines.html.twig', array(
            'disciplines' => $disciplines
        ));
    }
}
