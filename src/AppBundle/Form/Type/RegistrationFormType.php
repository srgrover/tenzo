<?php

namespace AppBundle\Form\Type;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseRegistrationFormType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', null, [
                'label' => false,
                'attr' => ['placeholder' => 'form.email'],
                'translation_domain' => 'FOSUserBundle'
            ])
            ->add('gender', ChoiceType::class, [
                'label' => false,
                'choices'  => [
                    'Masculino' => 'Hombre',
                    'Femenino' => 'Mujer',
                ]])
            ->add('born', DateType::class, [
                'label' => false,
                'format' => 'dd-MM-yyyy',
                'years' => range(1930,Date('Y')-18),
                'placeholder' => [
                    'day' => 'Día', 'month' => 'Mes', 'year' => 'Año'
                ],
                'attr' => ['placeholder' => ''],
                'translation_domain' => 'FOSUserBundle'
            ])
            ->add('username', null, [
                'label' => false,
                'attr' => ['placeholder' => 'form.username'],
                'translation_domain' => 'FOSUserBundle'
            ])
            ->add('firstName', null, [
                'label' => false,
                'attr' => ['placeholder' => 'Nombre', 'class' => ''],
                'translation_domain' => 'FOSUserBundle'
            ])
            ->add('lastName', null, [
                'label' => false,
                'attr' => ['placeholder' => 'Apellidos'],
                'translation_domain' => 'FOSUserBundle'
            ])
            ->add('address', null, [
                "label" => false,
                'attr' => ['placeholder' => 'Nombre de calle, número'],
            ])
            ->add('phoneNumber', null,[
                "label" => false,
                "required" => true,
                "attr" => ['placeholder' => 'Número de contacto']
            ])
            ->add('city', null,[
                "label" => false,
                "required" => true,
                "attr" => ['placeholder' => 'Ciudad'],
                'translation_domain' => 'FOSUserBundle'
            ])
            ->add('plainPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'options' => [
                    'translation_domain' => 'FOSUserBundle'
                ],
                'first_name' => "pass",
                'first_options' => [
                    'label' => false,
                    'attr' => ['placeholder' => 'form.password'],
                ],
                'second_name' => "repeat",
                'second_options' => [
                    'label' => false,
                    'attr' => ['placeholder' => 'form.password_confirmation'],
                ],
                'invalid_message' => 'fos_user.password.mismatch',
            ]);;
    }

    public function getParent()
    {
        return BaseRegistrationFormType::class;
    }

    public function getName()
    {
        return 'acme_user_registration';
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\User'
        ));
    }
    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_user';
    }
}