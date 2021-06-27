<?php

namespace App\Form;

use App\Entity\Techniques;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class TechniquesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('nom_techniques',TextType::class)
        ->add('description_courte_techniques',TextareaType::class,[
            'attr'=> ['rows' =>6],
            ])
        ->add('description_longue_techniques',TextareaType::class,[
            'attr'=> ['rows' =>6],
            ])
        ->add('image_logo_techniques',TextType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Techniques::class,
        ]);
    }
}
