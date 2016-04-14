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
        $state->setUrl('dolnoslaskie');
        $manager->persist($state);

        $state = new State();
        $state->setName('kujawsko-pomorskie');
        $state->setUrl('kujawsko_pomorskie');
        $manager->persist($state);

        $state = new State();
        $state->setName('lubelskie');
        $state->setUrl('lubelskie');
        $manager->persist($state);

        $state = new State();
        $state->setName('lubuskie');
        $state->setUrl('lubuskie');
        $manager->persist($state);

        $state = new State();
        $state->setName('łódzkie');
        $state->setUrl('kujawsko_pomorskie');
        $manager->persist($state);

        $state = new State();
        $state->setName('małopolskie');
        $state->setUrl('malopolskie');
        $manager->persist($state);

        $state = new State();
        $state->setName('mazowieckie');
        $state->setUrl('mazowieckie');
        $manager->persist($state);

        $state = new State();
        $state->setName('opolskie');
        $state->setUrl('opolskie');
        $manager->persist($state);

        $state = new State();
        $state->setName('podkarpackie');
        $state->setUrl('podkarpackie');
        $manager->persist($state);

        $state = new State();
        $state->setName('podlaskie');
        $state->setUrl('podlaskie');
        $manager->persist($state);

        $state = new State();
        $state->setName('pomorskie');
        $state->setUrl('pomorskie');
        $manager->persist($state);

        $state = new State();
        $state->setName('śląskie');
        $state->setUrl('slaskie');
        $manager->persist($state);

        $state = new State();
        $state->setName('świętokrzyskie');
        $state->setUrl('swietokrzyskie');
        $manager->persist($state);

        $state = new State();
        $state->setName('warmińsko-mazurskie');
        $state->setUrl('warminsko_mazurskie');
        $manager->persist($state);

        $state = new State();
        $state->setName('wielkopolskie');
        $state->setUrl('wielkopolskie');
        $manager->persist($state);

        $state = new State();
        $state->setName('zachodniopomorskie');
        $state->setUrl('zachodniopomorskie');
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
