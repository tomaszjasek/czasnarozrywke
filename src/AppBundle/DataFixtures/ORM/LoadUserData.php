<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Discipline;
use AppBundle\Entity\User;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadUserData implements FixtureInterface, ContainerAwareInterface, OrderedFixtureInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        $manipulator = $this->container->get('fos_user.util.user_manipulator');

        //php bin/console fos:user:create test test@example.com 123456
        /** @var User $user */
        $user = $manipulator->create('test', '123456', 'test@example.com', true, false);
        $userDisciplines = [];
        $disciplinesNames = array('piłka nożna', 'kolarstwo', 'dart');
        $disciplineService = $this->container->get('app.service.discipline');
        $disciplines = $disciplineService->getDisciplines();
        foreach($disciplines as $discipline) {
            /** @var Discipline $discipline */
            if(in_array($discipline->getName(), $disciplinesNames, false)) {
                $userDisciplines[] = $discipline;
            }
        }
        $user->setDisciplines($userDisciplines);
        $manager->persist($user);

        //php bin/console fos:user:create admin admin@example.com 123456
        $manipulator->create('admin', '123456', 'admin@example.com', true, true);

        $manager->flush();
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 2;
    }
}
