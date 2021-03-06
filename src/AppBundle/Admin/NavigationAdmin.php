<?php

namespace AppBundle\Admin;

use AppBundle\Entity\Navigation;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class NavigationAdmin extends Admin
{
    protected $datagridValues = array(
        '_sort_order' => 'ASC',
        '_sort_by' => 'discipline.name',
    );

    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Content', array('class' => 'col-md-9'))
                ->add('name', TextType::class, array('label' => 'Name'))
                ->add('url', TextType::class, array('label' => 'Url'))
                ->add('content', TextareaType::class, array(
                    'attr' => array(
                        'class' => 'tinymce'
                    ),
                    'label' => 'Content'
                ))
            ->end()
            ->with('Meta data', array('class' => 'col-md-3'))
                ->add('discipline', 'sonata_type_model', array(
                    'label' => 'Discipline',
                    'class' => 'AppBundle\Entity\Discipline',
                    'property' => 'name',
                    'required'    => false,
                    'placeholder' => 'Main Navigation',
                    'empty_data'  => null
                ))
                ->add('active')
                ->add('order')
            ->end()
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('discipline.name')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')
            ->add('discipline.name')
            ->add('url')
            ->add('active')
            ->add('order')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ))
        ;
    }

    public function toString($object)
    {
        return $object instanceof Navigation
            ? $object->getName()
            : 'Navigation Item'; // shown in the breadcrumb on the create view
    }
}