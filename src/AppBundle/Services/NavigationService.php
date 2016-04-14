<?php
/**
 * Created by PhpStorm.
 * User: Tomasz
 * Date: 05.04.16
 * Time: 20:17
 */

namespace AppBundle\Services;


use Doctrine\Common\Persistence\ManagerRegistry;

class NavigationService {

    protected $doctrine;

    /**
     * @var \Doctrine\Common\Persistence\ObjectRepository
     */
    protected $repository;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
        $this->repository = $this->doctrine->getRepository('AppBundle:Navigation');
    }

    public function getMainNavigation()
    {
        return $this->repository->findBy(['discipline' => null, 'active' => 1], ['order' => 'ASC']);
    }
} 