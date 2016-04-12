<?php

namespace AppBundle\Twig;

use AppBundle\Entity\Navigation;
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
            new \Twig_SimpleFunction('get_url', array($this, 'getUrl')),
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

    public function getUrl(Navigation $navigation)
    {
        if(strpos($navigation->getUrl(), '/') === 0 || strpos($navigation->getUrl(), 'http') === 0) {
            return $navigation->getUrl();
        } else {
            $uri = $this->container->get('router')->generate($navigation->getUrl());
            return $uri;
        }
    }

    public function getName()
    {
        return 'app_extension';
    }
}