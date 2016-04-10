<?php
/**
 * Created by PhpStorm.
 * User: Tomasz
 * Date: 05.04.16
 * Time: 20:17
 */

namespace AppBundle\Services;


use Doctrine\Common\Persistence\ManagerRegistry;

class StateService {

    protected $doctrine;

    /**
     * @var \Doctrine\Common\Persistence\ObjectRepository
     */
    protected $repository;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
        $this->repository = $this->doctrine->getRepository('AppBundle:State');
    }

    public function getStates()
    {
        return $this->repository->findAll();
    }

    public function getState($id)
    {
        return $this->repository->find($id);
    }

    public function getStateByName($name)
    {
        return $this->repository->findOneBy(['name' => $name]);
    }
} 