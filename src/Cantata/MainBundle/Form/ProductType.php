<?php

namespace Cantata\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProductType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('code', null, array('attr' => array('class' => 'form-control')))
            ->add('name', null, array('attr' => array('class' => 'form-control')))
            ->add('cost', null, array('attr' => array('class' => 'form-control')))
            ->add('primeCost', null, array('attr' => array('class' => 'form-control')))
            ->add('save', 'submit', array('attr' => array("class" => "btn btn-default")))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Cantata\MainBundle\Entity\Product'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'cantata_mainbundle_product';
    }
}
