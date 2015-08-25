<?php

namespace SeGuiMo\CRMBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class LibroDiarioType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('concepto')
            ->add('cantidad')
            ->add('fecha', 'date', array( 'widget' => 'single_text', 'format' => 'dd/MM/yyyy', 'required' => false ))
			->add('cuenta', 'entity', array( 
									'class' => 'SeGuiMo\CRMBundle\Entity\Cuentas', 
									'choice_label' => 'nombre', 
									'placeholder' => 'Selecciona la cuenta', 
									'required' => false ))
            ->add('observaciones')
            ->add('documentos', 'entity', array( 
									'class' => 'SeGuiMo\CRMBundle\Entity\Documentos', 
									'choice_label' => 'nombre', 
									'placeholder' => 'Selecciona el documento', 
									'required' => false ))
            //->add('personasHasNodos')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SeGuiMo\CRMBundle\Entity\LibroDiario'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'seguimo_crmbundle_librodiario';
    }
}
