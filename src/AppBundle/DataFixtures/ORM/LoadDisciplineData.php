<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Discipline;

class LoadDisciplineData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $discipline = new Discipline();
        $discipline->setName('piłka nożna');
        $discipline->setActive(1);
        $discipline->setOrder(1);
        $manager->persist($discipline);

        $discipline = new Discipline();
        $discipline->setName('koszykówka');
        $discipline->setActive(1);
        $discipline->setOrder(2);
        $manager->persist($discipline);

        $discipline = new Discipline();
        $discipline->setName('siatkówka');
        $discipline->setActive(1);
        $discipline->setOrder(3);
        $manager->persist($discipline);

        $discipline = new Discipline();
        $discipline->setName('tenis ziemny');
        $discipline->setActive(1);
        $discipline->setOrder(4);
        $manager->persist($discipline);

        $discipline = new Discipline();
        $discipline->setName('tenis stołowy');
        $discipline->setActive(1);
        $discipline->setOrder(5);
        $manager->persist($discipline);

        $discipline = new Discipline();
        $discipline->setName('bilard');
        $discipline->setActive(1);
        $discipline->setOrder(6);
        $manager->persist($discipline);

        $discipline = new Discipline();
        $discipline->setName('gokarty');
        $discipline->setActive(1);
        $discipline->setOrder(7);
        $manager->persist($discipline);

        $discipline = new Discipline();
        $discipline->setName('paintball');
        $discipline->setActive(1);
        $discipline->setOrder(8);
        $manager->persist($discipline);

        $discipline = new Discipline();
        $discipline->setName('piłka ręczna');
        $discipline->setActive(1);
        $discipline->setOrder(9);
        $manager->persist($discipline);

        $discipline = new Discipline();
        $discipline->setName('pływanie');
        $discipline->setActive(1);
        $discipline->setOrder(10);
        $manager->persist($discipline);

        $discipline = new Discipline();
        $discipline->setName('kolarstwo');
        $discipline->setActive(1);
        $discipline->setOrder(11);
        $manager->persist($discipline);

        $discipline = new Discipline();
        $discipline->setName('e-gaming');
        $discipline->setActive(1);
        $discipline->setOrder(12);
        $manager->persist($discipline);

        $discipline = new Discipline();
        $discipline->setName('bumber ball');
        $discipline->setActive(1);
        $discipline->setOrder(13);
        $manager->persist($discipline);

        $discipline = new Discipline();
        $discipline->setName('ultimate frisbee');
        $discipline->setActive(1);
        $discipline->setOrder(14);
        $manager->persist($discipline);

        $discipline = new Discipline();
        $discipline->setName('squash');
        $discipline->setActive(1);
        $discipline->setOrder(15);
        $manager->persist($discipline);

        $discipline = new Discipline();
        $discipline->setName('badminton');
        $discipline->setActive(1);
        $discipline->setOrder(16);
        $manager->persist($discipline);

        $discipline = new Discipline();
        $discipline->setName('bieganie');
        $discipline->setActive(1);
        $discipline->setOrder(17);
        $manager->persist($discipline);

        $discipline = new Discipline();
        $discipline->setName('fitnes');
        $discipline->setActive(1);
        $discipline->setOrder(18);
        $manager->persist($discipline);

        $discipline = new Discipline();
        $discipline->setName('dart');
        $discipline->setActive(1);
        $discipline->setOrder(19);
        $manager->persist($discipline);

        $discipline = new Discipline();
        $discipline->setName('szachy, warcaby');
        $discipline->setActive(1);
        $discipline->setOrder(20);
        $manager->persist($discipline);

        $discipline = new Discipline();
        $discipline->setName('gry karciane');
        $discipline->setActive(1);
        $discipline->setOrder(21);
        $manager->persist($discipline);

        $discipline = new Discipline();
        $discipline->setName('narciarstwo');
        $discipline->setActive(1);
        $discipline->setOrder(22);
        $manager->persist($discipline);

        $discipline = new Discipline();
        $discipline->setName('sporty walki');
        $discipline->setActive(1);
        $discipline->setOrder(23);
        $manager->persist($discipline);

        $discipline = new Discipline();
        $discipline->setName('łyżwiarstwo');
        $discipline->setActive(1);
        $discipline->setOrder(24);
        $manager->persist($discipline);

        $discipline = new Discipline();
        $discipline->setName('strzelectwo');
        $discipline->setActive(1);
        $discipline->setOrder(25);
        $manager->persist($discipline);

        $discipline = new Discipline();
        $discipline->setName('wspinaczka');
        $discipline->setActive(1);
        $discipline->setOrder(26);
        $manager->persist($discipline);

        $manager->flush();
    }
}
