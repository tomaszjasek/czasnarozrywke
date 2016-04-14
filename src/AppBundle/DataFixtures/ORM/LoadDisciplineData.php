<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Discipline;

class LoadDisciplineData implements FixtureInterface, OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $discipline = new Discipline();
        $discipline->setName('piłka nożna');
        $discipline->setUrl('pilka_nozna');
        $discipline->setActive(1);
        $discipline->setOrder(1);
        $manager->persist($discipline);

        $discipline = new Discipline();
        $discipline->setName('koszykówka');
        $discipline->setUrl('koszykowka');
        $discipline->setActive(1);
        $discipline->setOrder(2);
        $manager->persist($discipline);

        $discipline = new Discipline();
        $discipline->setName('siatkówka');
        $discipline->setUrl('siatkowka');
        $discipline->setActive(1);
        $discipline->setOrder(3);
        $manager->persist($discipline);

        $discipline = new Discipline();
        $discipline->setName('tenis ziemny');
        $discipline->setUrl('tenis_ziemny');
        $discipline->setActive(1);
        $discipline->setOrder(4);
        $manager->persist($discipline);

        $discipline = new Discipline();
        $discipline->setName('tenis stołowy');
        $discipline->setUrl('tenis_stolowy');
        $discipline->setActive(1);
        $discipline->setOrder(5);
        $manager->persist($discipline);

        $discipline = new Discipline();
        $discipline->setName('bilard');
        $discipline->setUrl('bilard');
        $discipline->setActive(1);
        $discipline->setOrder(6);
        $manager->persist($discipline);

        $discipline = new Discipline();
        $discipline->setName('gokarty');
        $discipline->setUrl('gokarty');
        $discipline->setActive(1);
        $discipline->setOrder(7);
        $manager->persist($discipline);

        $discipline = new Discipline();
        $discipline->setName('paintball');
        $discipline->setUrl('paintball');
        $discipline->setActive(1);
        $discipline->setOrder(8);
        $manager->persist($discipline);

        $discipline = new Discipline();
        $discipline->setName('piłka ręczna');
        $discipline->setUrl('pilka_reczna');
        $discipline->setActive(1);
        $discipline->setOrder(9);
        $manager->persist($discipline);

        $discipline = new Discipline();
        $discipline->setName('pływanie');
        $discipline->setUrl('plywanie');
        $discipline->setActive(1);
        $discipline->setOrder(10);
        $manager->persist($discipline);

        $discipline = new Discipline();
        $discipline->setName('kolarstwo');
        $discipline->setUrl('kolarstwo');
        $discipline->setActive(1);
        $discipline->setOrder(11);
        $manager->persist($discipline);

        $discipline = new Discipline();
        $discipline->setName('e-gaming');
        $discipline->setUrl('e_gaming');
        $discipline->setActive(1);
        $discipline->setOrder(12);
        $manager->persist($discipline);

        $discipline = new Discipline();
        $discipline->setName('bumber ball');
        $discipline->setUrl('bumber_ball');
        $discipline->setActive(1);
        $discipline->setOrder(13);
        $manager->persist($discipline);

        $discipline = new Discipline();
        $discipline->setName('ultimate frisbee');
        $discipline->setUrl('ultimate_frisbee');
        $discipline->setActive(1);
        $discipline->setOrder(14);
        $manager->persist($discipline);

        $discipline = new Discipline();
        $discipline->setName('squash');
        $discipline->setUrl('squash');
        $discipline->setActive(1);
        $discipline->setOrder(15);
        $manager->persist($discipline);

        $discipline = new Discipline();
        $discipline->setName('badminton');
        $discipline->setUrl('badminton');
        $discipline->setActive(1);
        $discipline->setOrder(16);
        $manager->persist($discipline);

        $discipline = new Discipline();
        $discipline->setName('bieganie');
        $discipline->setUrl('bieganie');
        $discipline->setActive(1);
        $discipline->setOrder(17);
        $manager->persist($discipline);

        $discipline = new Discipline();
        $discipline->setName('fitnes');
        $discipline->setUrl('fitnes');
        $discipline->setActive(1);
        $discipline->setOrder(18);
        $manager->persist($discipline);

        $discipline = new Discipline();
        $discipline->setName('dart');
        $discipline->setUrl('dart');
        $discipline->setActive(1);
        $discipline->setOrder(19);
        $manager->persist($discipline);

        $discipline = new Discipline();
        $discipline->setName('szachy, warcaby');
        $discipline->setUrl('szachy_warcaby');
        $discipline->setActive(1);
        $discipline->setOrder(20);
        $manager->persist($discipline);

        $discipline = new Discipline();
        $discipline->setName('gry karciane');
        $discipline->setUrl('gry_karciane');
        $discipline->setActive(1);
        $discipline->setOrder(21);
        $manager->persist($discipline);

        $discipline = new Discipline();
        $discipline->setName('narciarstwo');
        $discipline->setUrl('siatkowka');
        $discipline->setActive(1);
        $discipline->setOrder(22);
        $manager->persist($discipline);

        $discipline = new Discipline();
        $discipline->setName('sporty walki');
        $discipline->setUrl('sporty_walki');
        $discipline->setActive(1);
        $discipline->setOrder(23);
        $manager->persist($discipline);

        $discipline = new Discipline();
        $discipline->setName('łyżwiarstwo');
        $discipline->setUrl('lyzwiarstwo');
        $discipline->setActive(1);
        $discipline->setOrder(24);
        $manager->persist($discipline);

        $discipline = new Discipline();
        $discipline->setName('strzelectwo');
        $discipline->setUrl('strzelectwo');
        $discipline->setActive(1);
        $discipline->setOrder(25);
        $manager->persist($discipline);

        $discipline = new Discipline();
        $discipline->setName('wspinaczka');
        $discipline->setUrl('wspinaczka');
        $discipline->setActive(1);
        $discipline->setOrder(26);
        $manager->persist($discipline);

        $manager->flush();
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 1;
    }
}
