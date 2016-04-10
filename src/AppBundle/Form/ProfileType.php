<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppBundle\Form;

use AppBundle\Entity\Discipline;
use AppBundle\Entity\User;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;

class ProfileType extends AbstractType
{
    /**
     * @var TokenStorage
     */
    protected $tokenStorage;

    public function __construct(
        EntityManager $em,
        TokenStorage $tokenStorage
    ) {
        $this->em = $em;
        $this->tokenStorage = $tokenStorage;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        /** @var User $user */
        $userInterests = $this->tokenStorage->getToken()->getUser()->getInterests();

        $data = array();
        foreach($userInterests as $interest) {
            $discipline = $interest['discipline'];
            /** @var Discipline $discipline */
            $data[] = $this->em->getReference('AppBundle:Discipline', $discipline->getId());
        }

        $builder
            ->remove('current_password')
            ->remove('username');
//            ->add('disciplines', EntityType::class, array(
//                'class' => 'AppBundle:Discipline',
//                'label' => 'form.disciplines',
//                'translation_domain' => 'FOSUserBundle',
//                'choice_label' => function($discipline) {
//                    /** @var Discipline $discipline */
//                   return $discipline->getName();
//                },
//                'query_builder' => function(EntityRepository $er) {
//                    return $er->createQueryBuilder('d')
//                        ->orderBy('d.name', 'ASC');
//                },
//                'expanded' => true,
//                'multiple' => true,
//                'data' => $data
//            ));
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\ProfileFormType';
    }
}
