<?php

namespace AppBundle\Form\Type;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseRegistrationFormType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('address');
    }

    public function getParent()
    {
        return BaseRegistrationFormType::class;
    }

    public function getName()
    {
        return 'acme_user_registration';
    }
}