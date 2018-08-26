<?php

namespace AppBundle\Form\Type;
use AppBundle\Entity\Complementaria;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ComplementariaFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombreCentro', null, [
                'label' => false,
                'attr' => ['placeholder' => 'Nombre del Centro'],
            ])
            ->add('titulacion', null, [
                'label' => false,
                'attr' => ['placeholder' => 'Título obtenido'],
            ])
            ->add('horas', null, [
                'label' => false,
                'attr' => ['placeholder' => 'Horas'],
                ])
            ->add('anio', null, [
                'label' => false,
                'attr' => ['placeholder' => 'Año'],
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
            'data_class' => Complementaria::class
        ));
    }
    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_complementaria';
    }
}