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
        $disciplineService = $this->container->get('app.service.discipline');
        $stateService = $this->container->get('app.service.state');

        /** @var User $user */
        $user = $manipulator->create('tomaszjasek@gmail.com', '123456', 'tomaszjasek@gmail.com', true, false);
        $userInterests = [];

        $userInterestsData = array(
            array('discipline' => 'piłka nożna', 'state' => 'lubuskie', 'city' => '' ),
            array('discipline' => 'kolarstwo', 'state' => 'małopolskie', 'city' => 'Warszawa' ),
            array('discipline' => 'dart', 'state' => '', 'city' => '' )
        );

        foreach($userInterestsData as $userInterestData) {
            $discipline = null;
            $state = null;
            $city = null;
            if($userInterestData['discipline']) {
                $discipline = $disciplineService->getDisciplineByName($userInterestData['discipline']);
            }
            if($userInterestData['state']) {
                $state = $stateService->getStateByName($userInterestData['state']);
            }
            if($userInterestData['city']) {
                $city = $userInterestData['city'];
            }
            $userInterests[] = array(
                'discipline' => $discipline,
                'state' => $state,
                'city' => $city,
            );
        }

        $user->setInterests($userInterests);
        $manager->persist($user);

        $manipulator->create('admin@gmail.com', '123456', 'admin@gmail.com', true, true);

        $manager->flush();
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 2;
    }
}
