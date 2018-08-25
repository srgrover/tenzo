<?php

namespace AppBundle\Form\Type;
use AppBundle\Entity\Formacion;
use AppBundle\Entity\Laboral;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LaboralFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('empresa', null, [
                'label' => false,
                'attr' => ['placeholder' => 'Nombre de la empresa'],
            ])
            ->add('puesto', null, [
                'label' => false,
                'attr' => ['placeholder' => 'Puesto'],
            ])
            ->add('actividad', null, [
                'label' => false,
                'attr' => ['placeholder' => 'Actividad'],
            ])
            ->add('tareas', TextareaType::class, [
                'label' => 'Tareas',
                'attr' => ['placeholder' => 'Tareas que realizabas en tu puesto de trabajo'],
            ])
            ->add('fechaInicio', DateType::class, [
                'label' => 'Fecha inicio',
                'format' => 'dd-MM-yyyy',
                'years' => range(1930,Date('Y')),
                'placeholder' => [
                    'day' => 'Día', 'month' => 'Mes', 'year' => 'Año'
                ],
                'translation_domain' => 'FOSUserBundle'
            ])
            ->add('fechaFin', DateType::class, [
                'label' => 'Fecha fin',
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
            'data_class' => Laboral::class
        ));
    }
    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_laboral';
    }
}