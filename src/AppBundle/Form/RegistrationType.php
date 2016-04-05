<?php

namespace AppBundle\Form;

use AppBundle\Services\DisciplineService;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationType extends AbstractType
{
    protected $disciplineService;

    public function __construct(DisciplineService $disciplineService)
    {
        $this->disciplineService = $disciplineService;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        /*$disciplines = $this->disciplineService->getDisciplines();

        $builder->add('disciplines', ChoiceType::class, array(
            'choices' => $disciplines,
            'choices_as_values' => true,
        ));*/
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }
}
