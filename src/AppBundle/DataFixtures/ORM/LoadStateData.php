<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\State;

class LoadStateData implements FixtureInterface, OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $state = new State();
        $state->setName('dolnośląskie');
        $manager->persist($state);

        $state = new State();
        $state->setName('kujawsko-pomorskie');
        $manager->persist($state);

        $state = new State();
        $state->setName('lubelskie');
        $manager->persist($state);

        $state = new State();
        $state->setName('lubuskie');
        $manager->persist($state);

        $state = new State();
        $state->setName('łódzkie');
        $manager->persist($state);

        $state = new State();
        $state->setName('małopolskie');
        $manager->persist($state);

        $state = new State();
        $state->setName('mazowieckie');
        $manager->persist($state);

        $state = new State();
        $state->setName('opolskie');
        $manager->persist($state);

        $state = new State();
        $state->setName('podkarpackie');
        $manager->persist($state);

        $state = new State();
        $state->setName('podlaskie');
        $manager->persist($state);

        $state = new State();
        $state->setName('pomorskie');
        $manager->persist($state);

        $state = new State();
        $state->setName('śląskie');
        $manager->persist($state);

        $state = new State();
        $state->setName('świętokrzyskie');
        $manager->persist($state);

        $state = new State();
        $state->setName('warmińsko-mazurskie');
        $manager->persist($state);

        $state = new State();
        $state->setName('wielkopolskie');
        $manager->persist($state);

        $state = new State();
        $state->setName('zachodniopomorskie');
        $manager->persist($state);

        $manager->flush();
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 1;
    }
}
