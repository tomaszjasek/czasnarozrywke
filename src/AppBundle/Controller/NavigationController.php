<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class NavigationController extends Controller
{
    /**
     * @param Request $request
     * @param $discipline
     * @param $state
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function leftNavigationAction(Request $request, $discipline, $state)
    {
        $disciplineService = $this->get('app.service.discipline');
        $disciplines = $disciplineService->getDisciplines();

        $stateService = $this->get('app.service.state');
        $states = $stateService->getStates();

        return $this->render('AppBundle:Navigation:left.html.twig', array(
            'disciplines' => $disciplines,
            'states' => $states,
            'currentDiscipline' => $discipline,
            'currentState' => $state
        ));
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function mainNavigationAction(Request $request)
    {
        $navigationService = $this->get('app.service.navigation');

        $navigation = $navigationService->getMainNavigation();

        return $this->render('AppBundle:Navigation:menu.html.twig', array(
            'navigation' => $navigation
        ));
    }

}
