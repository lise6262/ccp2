<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom',TextType::class)
            ->add('mail',TextType::class)
            ->add('message',TextareaType::class,[
                'attr'=> ['rows' =>6],
            ])
            ->add('date',DateType::class)
            ->add('objet',ChoiceType::class,[
                'choices'=>[
                    'demande de rendez-vous'=>'rendez-vous',
                    'demande d accés bouboir'=>'bouboir',
                    'demande d information'=>'information',
                    'demande de devis'=>'devis',

                ]
            ])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
