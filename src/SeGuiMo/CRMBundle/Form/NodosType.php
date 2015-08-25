<?php

namespace SeGuiMo\CRMBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NodosType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('direccion')
            ->add('ip')
            ->add('user')
            ->add('pass')
            ->add('urlGuifi')
            ->add('fechaAlta', 'date', array( 'widget' => 'single_text', 'format' => 'dd/MM/yyyy', 'required' => false ))
            ->add('fechaBaja', 'date', array( 'widget' => 'single_text', 'format' => 'dd/MM/yyyy', 'required' => false ))
            ->add('observaciones')
			->add('supernodo', 'entity', array( 
												'class' => 'SeGuiMo\CRMBundle\Entity\Nodos', 
												'choice_label' => 'nombre', 
												'placeholder' => 'Selecciona el supernodo', 
												'required' => false ))
            ->add('materialesRed', 'entity', array( 
												'class' => 'SeGuiMo\CRMBundle\Entity\MaterialesRed', 
												'choice_label' => 'modelo', 
												'placeholder' => 'Selecciona el material de red', 
												'required' => false ))
            //->add('materiales');
			;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SeGuiMo\CRMBundle\Entity\Nodos'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'seguimo_crmbundle_nodos';
    }
}
