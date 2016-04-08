<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\NullOutput;
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
        $kernel = $this->container->get('kernel');
        $application = new Application($kernel);
        $application->setAutoExit(false);
        $output = new NullOutput();

        //php bin/console fos:user:create testuser test@example.com 123456
        $input = new ArrayInput(array(
            'command'   => 'fos:user:create',
            'username'  => 'test',
            'email'     => 'test@example.com',
            'password'  => '123456',
        ));
        $application->run($input, $output);

        //php bin/console fos:user:create admin admin@example.com 123456
        $input = new ArrayInput(array(
            'command'   => 'fos:user:create',
            'username'  => 'admin',
            'email'     => 'admin@example.com',
            'password'  => '123456',
            '--super-admin' => true
        ));
        $application->run($input, $output);


    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 2;
    }
}
