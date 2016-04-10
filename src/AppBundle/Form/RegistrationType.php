<?php

namespace AppBundle\Form;

use AppBundle\Entity\Discipline;
use AppBundle\Services\DisciplineService;
use AppBundle\Services\StateService;
use Doctrine\ORM\EntityRepository;
use Sonata\AdminBundle\Form\Type\Filter\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistrationType extends AbstractType
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
        $builder->remove('username');

        $disciplines = $this->disciplineService->getDisciplines();
        $states = $this->stateService->getStates();

        /*$builder->add('interests', CollectionType::class, array(
            'entry_type'   => ChoiceType::class,
            'entry_options'  => array(
                'choices'  => array(
                    'nashville' => 'Nashville',
                    'paris'     => 'Paris',
                    'berlin'    => 'Berlin',
                    'london'    => 'London',
                ),
            ),
        ));*/

        // TODO check collection type
        /** @var Discipline $discipline */
//        foreach($disciplines as $discipline) {
//            $builder->add('interests', CheckboxType::class, array(
//                'translation_domain' => 'FOSUserBundle',
//                'label' => $discipline->getName()
//            ));
//        }
//            ->add('disciplines', EntityType::class, array(
//                'class' => 'AppBundle:Discipline',
//                'label' => 'form.disciplines',
//                'translation_domain' => 'FOSUserBundle',
//                'query_builder' => function(EntityRepository $er) {
//                    return $er->createQueryBuilder('d')
//                        ->orderBy('d.name', 'ASC');
//                },
//                'choice_label' => function($discipline) {
//                    /** @var Discipline $discipline */
//                    return $discipline->getName();
//                },
//                'choices_as_values' => true,
//                'expanded' => true,
//                'multiple' => true
//            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\User',
            'csrf_token_id' => 'registration',
            'allow_extra_fields' => true,
            // BC for SF < 2.8
            'intention'  => 'registration',
        ));
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }
}
