<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Navigation;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadNavigationData implements FixtureInterface, ContainerAwareInterface, OrderedFixtureInterface
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
        $disciplineService = $this->container->get('app.service.discipline');

        $navigation = new Navigation();
        $navigation->setName('STRONA GŁÓWNA');
        $navigation->setUrl('startPage');
        $navigation->setDiscipline(NULL);
        $navigation->setContent('<h1><b>www.tenis-amatorski.pl</b></h1>

<p>Witajcie !<br>
<br>
Portal www.tenis-amatorski.pl podjął się misji stworzenia społeczności tenisowej. Zarejestrowani użytkownicy będą otrzymywać informacje o turniejach tenisowych, ligach oraz innych rozgrywkach w regionie. Będą mogli także zaczerpnąć informacje o kortach tenisowych w mieście oraz wyszukać kontakt do trenerów. Na stronie znajdą się także informacje o sklepach tenisowych i punktach serwisów rakiet<br>
<br>
Oficjalny początek profesjonalnie zaprojektowanego portalu zaplanowany jest na styczeń 2016 roku. Jednak od chwili obecnej na stronie można już się zarejestrować i już dziś otrzymywać informację o tenisowych amatorskich wydarzeniach w Polsce. <br>
<br>
Aby otrzymywać informacje ze świata polskiego tenisa amatorskiego wypełnij poniższy formularz. <br>
<br>
<form method="post" action="register.php">
<input type="text" name="email"> - <b>E-mail</b><br><br>
<input type="text" name="miasto"> - <b>Miasto</b><br><br>
<input type="text" name="wojewodztwo"> - <b>Województwo</b><br><br>

<input type="submit" value="ZAREJESTRUJ"><br><br>
</form>

Na podany e-mail w ciągu 24 godzin wysłany zostanie e-mail z potwierdzeniem rejestracji. Jeśli mail dotrze do spamu, prosimy odznaczyć wiadomość jako „to nie jest spam”, aby w przyszłości e-maile trafiały do głównej skrzynki odbiorczej.<br>
<br>
<b>Funkcje strony:<br></b>
- informowanie użytkownika o amatorskich turniejach tenisowych,<br>
- informowanie użytkownika o amatorskich ligach tenisowych,<br>
- informowanie użytkownika o kortach tenisowych w regionie,<br>
- informowanie użytkownika o sklepach tenisowych w Polsce,<br>
- informowanie użytkownika o trenerach w Polsce,<br>
- <b>dobór partnerów do gry - </b> każda osoba nie mająca partnera będzie mogła zgłosić chęś wspólnej gry i otrzymać propozycję sparingu od innego gracza zarejestrowanego na portalu.<br>
</p>
<br><br><br><br><br><br><br>');
        $navigation->setActive(1);
        $navigation->setOrder(1);
        $manager->persist($navigation);

        $navigation = new Navigation();
        $navigation->setName('STWÓRZ WYDARZENIE');
        $navigation->setUrl('/event_add');
        $navigation->setDiscipline(NULL);
        $navigation->setActive(1);
        $navigation->setOrder(2);
        $manager->persist($navigation);

        $navigation = new Navigation();
        $navigation->setName('SZUKAJ WYDARZENIA');
        $navigation->setUrl('/search');
        $navigation->setDiscipline(NULL);
        $navigation->setActive(1);
        $navigation->setOrder(3);
        $manager->persist($navigation);

        $navigation = new Navigation();
        $navigation->setName('REJESTRACJA');
        $navigation->setUrl('fos_user_registration_register');
        $navigation->setDiscipline(NULL);
        $navigation->setActive(1);
        $navigation->setOrder(4);
        $manager->persist($navigation);

        $navigation = new Navigation();
        $navigation->setName('KONTAKT');
        $navigation->setUrl('contact');
        $navigation->setDiscipline(NULL);
        $navigation->setActive(1);
        $navigation->setOrder(5);
        $manager->persist($navigation);

        $navigation = new Navigation();
        $navigation->setName('SPORTOWA TELEWIZJA INTERNETOWA');
        $navigation->setUrl('http://www.sportstream.pl/');
        $navigation->setDiscipline(NULL);
        $navigation->setActive(1);
        $navigation->setOrder(6);
        $manager->persist($navigation);

        $discipline = $disciplineService->getDisciplineByName('piłka nożna');
        $navigation = new Navigation();
        $navigation->setName('Trenerzy');
        $navigation->setUrl('trenerzy');
        $navigation->setDiscipline($discipline);
        $navigation->setActive(1);
        $navigation->setOrder(1);
        $manager->persist($navigation);

        $navigation = new Navigation();
        $navigation->setName('Boiska');
        $navigation->setUrl('boiska');
        $navigation->setDiscipline($discipline);
        $navigation->setActive(1);
        $navigation->setOrder(3);
        $manager->persist($navigation);

        $navigation = new Navigation();
        $navigation->setName('Stadiony');
        $navigation->setUrl('stadiony');
        $navigation->setDiscipline($discipline);
        $navigation->setActive(1);
        $navigation->setOrder(2);
        $manager->persist($navigation);

        $discipline = $disciplineService->getDisciplineByName('koszykówka');
        $navigation = new Navigation();
        $navigation->setName('Trenerzy');
        $navigation->setUrl('trenerzy');
        $navigation->setDiscipline($discipline);
        $navigation->setActive(1);
        $navigation->setOrder(1);
        $manager->persist($navigation);

        $manager->flush();
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 2;
    }
}
