<?php

namespace AppBundle\Form\Type;
use AppBundle\Entity\Formacion;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormacionFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombreCentro', null, [
                'label' => false,
                'attr' => ['placeholder' => 'Nombre del Centro'],
            ])
            ->add('especialidad', null, [
                'label' => false,
                'attr' => ['placeholder' => 'Título'],
            ])
            ->add('titulacion', ChoiceType::class, [
                'label' => false,
                'choices'  => [
                    'Educacion Secundaria Obligatoria' => 'Educacion Secundaria Obligatoria',
                    'Formación Profesional Grado Medio' => 'Formación Profesional Grado Medio',
                    'Formación Profesional Grado Superior' => 'Formación Profesional Grado Superior',
                    'Estudios Universitarios' => 'Estudios Universitarios',
                    'Grado' => 'Grado',
                    'Posgrado' => 'Posgrado',
                ]])
            ->add('obtencion', DateType::class, [
                'label' => false,
                'format' => 'dd-MM-yyyy',
                'years' => range(1930,Date('Y')),
                'placeholder' => [
                    'day' => 'Día', 'month' => 'Mes', 'year' => 'Año'
                ],
                'translation_domain' => 'FOSUserBundle'
            ])
            ->add('ciudad', null, [
                'label' => false,
                'attr' => ['placeholder' => 'Ciudad'],
            ]);

    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Formacion::class
        ));
    }
    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_formacion';
    }
}