<?php

namespace App\Form;

use App\Entity\User;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email',TextType::class)
            ->add('roles',ChoiceType::class, array(
                'label' => 'role',

                'choices' => User::ROLES,
                'choice_translation_domain' => 'user',
                'multiple'  => true,
                'expanded' => true,
                'required' => true,
                ))
              
            ->add('password',PasswordType::class)
            ->add('isVerified',CheckboxType::class, array(
                'required' => false,
                'value' => 1,
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
