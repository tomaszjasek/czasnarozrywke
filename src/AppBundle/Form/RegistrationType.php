<?php

namespace AppBundle\Form;

use AppBundle\Entity\Discipline;
use AppBundle\Services\DisciplineService;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationType extends AbstractType
{
    /**
     * @var DisciplineService
     */
    protected $disciplineService;

    public function __construct(DisciplineService $disciplineService)
    {
        $this->disciplineService = $disciplineService;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $disciplines = $this->disciplineService->getDisciplines();

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
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }
}
