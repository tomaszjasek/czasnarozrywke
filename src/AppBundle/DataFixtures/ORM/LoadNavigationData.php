<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Navigation;

class LoadNavigationData implements FixtureInterface, OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $navigation = new Navigation();
        $navigation->setName('STRONA GŁÓWNA');
        $navigation->setUrl('startPage');
        $navigation->setDisciplineId(NULL);
        $navigation->setActive(1);
        $navigation->setOrder(1);
        $manager->persist($navigation);

        $navigation = new Navigation();
        $navigation->setName('STWÓRZ WYDARZENIE');
        $navigation->setUrl('/event_add');
        $navigation->setDisciplineId(NULL);
        $navigation->setActive(1);
        $navigation->setOrder(2);
        $manager->persist($navigation);

        $navigation = new Navigation();
        $navigation->setName('SZUKAJ WYDARZENIA');
        $navigation->setUrl('/search');
        $navigation->setDisciplineId(NULL);
        $navigation->setActive(1);
        $navigation->setOrder(3);
        $manager->persist($navigation);

        $navigation = new Navigation();
        $navigation->setName('REJESTRACJA');
        $navigation->setUrl('fos_user_registration_register');
        $navigation->setDisciplineId(NULL);
        $navigation->setActive(1);
        $navigation->setOrder(4);
        $manager->persist($navigation);

        $navigation = new Navigation();
        $navigation->setName('KONTAKT');
        $navigation->setUrl('contact');
        $navigation->setDisciplineId(NULL);
        $navigation->setActive(1);
        $navigation->setOrder(5);
        $manager->persist($navigation);

        $navigation = new Navigation();
        $navigation->setName('SPORTOWA TELEWIZJA INTERNETOWA');
        $navigation->setUrl('http://www.sportstream.pl/');
        $navigation->setDisciplineId(NULL);
        $navigation->setActive(1);
        $navigation->setOrder(6);
        $manager->persist($navigation);

        $manager->flush();
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 1;
    }
}
