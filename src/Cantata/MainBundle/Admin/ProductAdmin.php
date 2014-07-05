<?php
namespace Cantata\MainBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;


class ProductAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('code', null, array('label' => 'Կոդը'))
            ->add('name', null, array('label' => 'Անվանումը'))
            ->add('cost', null, array('label' => 'Գինը'))
            ->add('primeCost', null, array('label' => 'Ինքնարժեքը'))
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('code', null, array('label' => 'Կոդը'))
            ->add('name', null, array('label' => 'Անվանումը'))
            ->add('cost', null, array('label' => 'Գինը'))
            ->add('primeCost', null, array('label' => 'Ինքնարժեքը'))
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('code', null, array('label' => 'Կոդը'))
            ->add('name', null, array('label' => 'Անվանումը'))
            ->add('cost', null, array('label' => 'Գինը'))
            ->add('primeCost', null, array('label' => 'Ինքնարժեքը'))
            ->add(
                '_action',
                'actions',
                array(
                    'actions' => array(
                        'view' => array(),
                        'edit' => array(),
                        'delete' => array(),
                    )
                )
            )
        ;
    }
}