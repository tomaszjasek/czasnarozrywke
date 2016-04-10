<?php

namespace AppBundle\Twig;

use Symfony\Component\DependencyInjection\Container;

class AppExtension extends \Twig_Extension
{
    protected $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('get_disciplines', array($this, 'getDisciplines')),
            new \Twig_SimpleFunction('get_states', array($this, 'getStates')),
        );
    }

    public function getDisciplines()
    {
        $disciplineService = $this->container->get('app.service.discipline');
        return $disciplineService->getDisciplines();
    }

    public function getStates()
    {
        $stateService = $this->container->get('app.service.state');
        return $stateService->getStates();
    }

    public function getName()
    {
        return 'app_extension';
    }
}