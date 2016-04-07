<?php

namespace AppBundle\Form;

use AppBundle\Entity\Discipline;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('disciplines', EntityType::class, array(
            'class' => 'AppBundle:Discipline',
            'label' => 'form.disciplines',
            'translation_domain' => 'FOSUserBundle',
            'query_builder' => function(EntityRepository $er) {
                return $er->createQueryBuilder('d')
                    ->orderBy('d.name', 'ASC');
            },
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
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }
}
