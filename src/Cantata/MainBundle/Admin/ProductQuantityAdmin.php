<?php
namespace Cantata\MainBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;


class ProductQuantityAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('prod', null, array('label' => 'Ապրանքը'))
            ->add('quantity', null, array('label' => 'Քանակը'))
            ->add('year', null, array('label' => 'Տարին'))
            ->add('month', null, array('label' => 'Ամիսը'))
            ->add('shop', null, array('label' => 'Խանութը'))
            ->add('type', null, array('label' => 'Տեսակը'))
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('prod', null, array('label' => 'Ապրանքը'))
            ->add('quantity', null, array('label' => 'Քանակը'))
            ->add('year', null, array('label' => 'Տարին'))
            ->add('month', null, array('label' => 'Ամիսը'))
            ->add('shop', null, array('label' => 'Խանութը'))
            ->add('type', null, array('label' => 'Տեսակը'))
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('prod', null, array('label' => 'Ապրանքը'))
            ->add('quantity', null, array('label' => 'Քանակը'))
            ->add('year', null, array('label' => 'Տարին'))
            ->add('month', null, array('label' => 'Ամիսը'))
            ->add('shop', null, array('label' => 'Խանութը'))
            ->add('type', null, array('label' => 'Տեսակը'))
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