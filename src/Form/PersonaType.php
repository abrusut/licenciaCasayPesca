<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PersonaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('apellido')
            ->add('fechaNacimiento', 'date', array( 'label'=>'Fecha de Nacimiento',
                    'required' => FALSE,
                    // render as a single text box
                    'widget' => 'single_text',
                    'format' => 'dd/MM/yyyy',
                    // do not render as type="date", to avoid HTML5 date pickers
                    'html5' => false,
                    // add a class that can be selected in JavaScript
                    'attr' => ['class' => 'js-datepicker'],))
            ->add('documento', 'text', array('label' => 'Número de Documento', 'attr'=>array('placeholder'=>'99999999')))
            ->add('calle')
            ->add('numero')
            ->add('sexo', 'choice', array('choices' => array('m' => 'Masculino', 'f' => 'Femenino'), 'required' => FALSE))
            ->add('jubilado', 'choice', array('choices' => array('s' => 'Si', 'n' => 'No'), 'required' => FALSE))
            ->add('telefono', 'text', array('label' => 'Teléfono', 'required' => FALSE, 'attr'=>array('placeholder'=>'3420000000')))
            ->add('email')
            ->add('localidad')
            ->add('provincia')
            ->add('localidadOtraProvincia')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MProd\LicenciaCyPBundle\Entity\Persona',
            'cascade_validation' => true
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'mprod_licenciacypbundle_persona';
    }
}
