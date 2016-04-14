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
        return $this->render('AppBundle:Navigation:left.html.twig', array(
            'currentDiscipline' => $discipline,
            'currentState' => $state
        ));
    }

    /**
     * @param Request $request
     * @param $discipline
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function mainNavigationAction(Request $request, $discipline)
    {
        $navigationService = $this->get('app.service.navigation');
        $navigation = $navigationService->getMainNavigation();
        $subNavigation = null;
        if($discipline) {
            $disciplineService = $this->get('app.service.discipline');
            $discipline = $disciplineService->getDisciplineByUrl($discipline);
            $subNavigation = $navigationService->getSubNavigation($discipline->getId());
        }

        return $this->render('AppBundle:Navigation:menu.html.twig', array(
            'subNavigation' => $subNavigation,
            'navigation' => $navigation
        ));
    }

}
