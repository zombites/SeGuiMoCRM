<?php

namespace SeGuiMo\CRMBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PersonasHasNodosType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('personas', 'entity', array( 
												'class' => 'SeGuiMo\CRMBundle\Entity\Personas', 
												'choice_label' => 'nombre', 
												'placeholder' => 'Selecciona la persona', 
												'required' => false ))
            ->add('nodos', 'entity', array( 
												'class' => 'SeGuiMo\CRMBundle\Entity\Nodos', 
												'choice_label' => 'nombre', 
												'placeholder' => 'Selecciona el nodo', 
												'required' => false ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SeGuiMo\CRMBundle\Entity\PersonasHasNodos'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'seguimo_crmbundle_personashasnodos';
    }
}
