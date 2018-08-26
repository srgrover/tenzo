<?php

namespace AppBundle\Form\Type;
use AppBundle\Entity\Complementaria;
use AppBundle\Entity\Idioma;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class IdiomaFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('idioma', null, [
                'label' => false,
                'attr' => ['placeholder' => 'Idioma'],
            ])
            ->add('habla', ChoiceType::class, [
                'label' => 'Nivel oral',
                'choices'  => [
                    'Bajo' => 'Bajo',
                    'Medio' => 'Medio',
                    'Alto' => 'Alto',
                    'Nativo' => 'Nativo',
                ]])
            ->add('escribe', ChoiceType::class, [
                'label' => 'Nivel escrito',
                'choices'  => [
                    'Bajo' => 'Bajo',
                    'Medio' => 'Medio',
                    'Alto' => 'Alto',
                    'Nativo' => 'Nativo',
                ]])
            ->add('traduce', ChoiceType::class, [
                'label' => 'Nivel traducción',
                'choices'  => [
                    'Bajo' => 'Bajo',
                    'Medio' => 'Medio',
                    'Alto' => 'Alto',
                    'Nativo' => 'Nativo',
                ]]);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Idioma::class
        ));
    }
    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_idioma';
    }
}