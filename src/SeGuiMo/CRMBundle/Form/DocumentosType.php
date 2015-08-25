<?php

namespace SeGuiMo\CRMBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DocumentosType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        	->add('nombre', 'file', array('label' => 'PDF, JPG, PNG o fichero de texto plano', 'data_class' => null, 'required' => null))
            ->add('observaciones')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SeGuiMo\CRMBundle\Entity\Documentos'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'seguimo_crmbundle_documentos';
    }
}
