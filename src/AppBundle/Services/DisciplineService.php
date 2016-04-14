<?php
/**
 * Created by PhpStorm.
 * User: Tomasz
 * Date: 05.04.16
 * Time: 20:17
 */

namespace AppBundle\Services;


use Doctrine\Common\Persistence\ManagerRegistry;

class DisciplineService {

    protected $doctrine;

    /**
     * @var \Doctrine\Common\Persistence\ObjectRepository
     */
    protected $repository;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
        $this->repository = $this->doctrine->getRepository('AppBundle:Discipline');
    }

    public function getDisciplines()
    {
        return $this->repository->findBy([], ['order' => 'ASC']);
    }

    public function getDiscipline($id)
    {
        return $this->repository->find($id);
    }

    public function getDisciplineByName($name)
    {
        return $this->repository->findOneBy(['name' => $name]);
    }

    public function getDisciplineByUrl($url)
    {
        return $this->repository->findOneBy(['url' => $url]);
    }
} 