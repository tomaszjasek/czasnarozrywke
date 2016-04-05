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

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function getDisciplines()
    {
        $repository = $this->doctrine->getRepository('AppBundle:Discipline');

        return $repository->findBy([], ['order' => 'ASC']);
    }
} 