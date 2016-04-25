<?php

namespace AppBundle\Form;

use AppBundle\EventListener\InterestsListener;
use AppBundle\Services\DisciplineService;
use AppBundle\Services\StateService;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InterestsType extends AbstractType
{
    protected $disciplineService;

    protected $stateService;

    public function __construct(
        DisciplineService $disciplineService,
        StateService $stateService
    ) {
        $this->disciplineService = $disciplineService;
        $this->stateService = $stateService;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->addEventSubscriber(
            new InterestsListener(
                $this->disciplineService,
                $this->stateService
            )
        );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'allow_extra_fields' => true,
        ));
    }
}
