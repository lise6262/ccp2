<?php

namespace App\Form;

use App\Entity\Photographe;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class PhotographeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('nom_photographe',TextType::class,[
            'label'=>'nom photographe'
        ])
        ->add('prenom_photographe',TextType::class,[
            'label'=>'prenom photographe'
        ])
        ->add('email_photographe',EmailType::class)
        ->add('avatar_photographe',TextType::class,[
            'label'=>'Photo du photographe'
        ])
        ->add('description_photographe',TextareaType::class,[
            'label'=>'description',
            'attr'=> ['rows' =>6],
        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Photographe::class,
        ]);
    }
}
