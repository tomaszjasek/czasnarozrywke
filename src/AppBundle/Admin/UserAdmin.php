<?php

namespace AppBundle\Admin;

use AppBundle\Form\InterestsType;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class UserAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Data', array('class' => 'col-md-9'))
                ->add('email')
                ->add('enabled')
                ->add('locked')
                ->add('expired')
            ->end()
            ->with('Roles', array('class' => 'col-md-3'))
                ->add('roles', 'collection')
            ->end()
            ->with('Interest', array('class' => 'col-md-9'))
                ->add('interests', InterestsType::class)
            ->end()
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('email')
            ->add('roles')
            ->add('interests')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('email')
            ->add('enabled')
            ->add('locked')
            ->add('expired')
            ->add('last_login', 'datetime')
            ->add('created_at', 'datetime')
            ->add('updated_at', 'datetime')
        ;
    }
}