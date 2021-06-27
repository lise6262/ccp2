<?php

namespace App\Form;

use App\Entity\Photos;
use App\Entity\Categories;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class CategoriesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('nom_categories',TextType::class)
        ->add('description_categories',TextareaType::class,[
            'attr'=> ['rows' =>5],
            ])
        ->add('description_longue_categories',TextareaType::class,[
            'attr'=> ['rows' =>6],
            ])
        ->add('image_logo_categories',TextType::class)
        ->add('relation_photos',EntityType::class,[
            'class'=>Photos::class,
            'label'=>'choisir la photo (option)',
            'multiple'=>true,
            'expanded'=>true,
        ])
        
        ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Categories::class,
        ]);
    }
}
