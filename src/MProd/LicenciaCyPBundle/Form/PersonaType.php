<?php

namespace MProd\LicenciaCyPBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class PersonaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre' ,TextType::class, array( 'label'=>'Nombre'))
            ->add('apellido',TextType::class, array( 'label'=>'Apellido'))
            ->add('fechaNacimiento', DateType::class, array( 'label'=>'Fecha de Nacimiento',
                    'required' => FALSE,
                    // render as a single text box
                    'widget' => 'single_text',
                    'format' => 'dd/MM/yyyy',
                    // do not render as type="date", to avoid HTML5 date pickers
                    'html5' => true,
                    // add a class that can be selected in JavaScript
                    'attr' => ['class' => 'js-datepicker'],))
            ->add('documento', IntegerType::class, 
                    array('label' => 'Número de Documento', 'attr'=>array('placeholder'=>'99999999')))
            ->add('calle',TextType::class, array( 'label'=>'Calle'))
            ->add('numero',IntegerType::class, 
                    array('label' => 'Número de Documento'))
            ->add('sexo', ChoiceType::class,
                    array(
                        'label' => 'Sexo',
                        'choices' => array(
                            'M' => 'M',
                            'F' => 'F'
                        )
                    )
                )
            ->add('jubilado', 
                ChoiceType::class,
                array(
                    'label' => 'Jubilado',
                    'choices' => array(
                        '0' => 'SI',
                        '1' => 'NO'
                    ), 
                    'required' => FALSE
                    )
            )                    
            ->add('telefono', IntegerType::class, 
                array('label' => 'Teléfono', 
                      'required' => FALSE, 
                      'attr'=>array('placeholder'=>'3420000000')))
            ->add('email',EmailType::class, 
                array(
                    'label' => 'Email'
                ))
          /*  ->add('localidad',EntityType::class, array(
                'class' => 'MProdLicenciaCyPBundle:Localidad',                    
                'choice_label' => 'username'
                ))*/
            ->add('provincia',TextType::class, array(
                'label' => 'Nombre'
                ))
            ->add('localidadOtraProvincia',TextType::class, array(
                'label' => 'Localidad Otra Provincia'
                ))
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
