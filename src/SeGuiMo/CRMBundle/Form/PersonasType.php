<?php

namespace SeGuiMo\CRMBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PersonasType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('apellidos')
            ->add('mail1')
            ->add('mail2')
            ->add('telefono1')
            ->add('telefono2')
            ->add('observaciones')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SeGuiMo\CRMBundle\Entity\Personas'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'seguimo_crmbundle_personas';
    }
}
