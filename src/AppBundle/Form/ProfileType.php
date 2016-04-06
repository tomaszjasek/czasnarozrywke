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
use AppBundle\Services\DisciplineService;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Test\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;

class ProfileType extends AbstractType
{
    /**
     * @var DisciplineService
     */
    protected $disciplineService;

    /**
     * @var TokenStorage
     */
    protected $tokenStorage;

    public function __construct(
        DisciplineService $disciplineService,
        TokenStorage $tokenStorage
    ) {
        $this->disciplineService = $disciplineService;
        $this->tokenStorage = $tokenStorage;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $disciplines = $this->disciplineService->getDisciplines();

        /** @var User $user */
        $user = $this->tokenStorage->getToken()->getUser();

        $builder->add('disciplines', ChoiceType::class, array(
            'label' => 'form.disciplines',
            'translation_domain' => 'FOSUserBundle',
            'choices' => $disciplines,
            'choice_label' => function($discipline) {
                /** @var Discipline $discipline */
                return $discipline->getName();
            },
            'choices_as_values' => true,
            'expanded' => true,
            'multiple' => true
        ));
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\ProfileFormType';
    }
}
