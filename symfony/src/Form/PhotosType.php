<?php

namespace App\Form;

use App\Entity\Photos;
use App\Entity\Categories;
use App\Entity\Techniques;
use App\Entity\Photographe;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class PhotosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('url_photos',TextType::class)
        ->add('titre_photos',TextType::class)
        ->add('exif_dimensions_photos',TextType::class)
        ->add('exif_date_photos')
        ->add('exif_speed_photos',TextType::class)
        ->add('exif_apperture_photos',TextType::class)
        ->add('exif_iso_photos',TextType::class)
        ->add('exif_focale_photos',TextType::class)
        ->add('exif_objectif_photos',TextType::class)
        ->add('exif_cam_photos',TextType::class)
        ->add('categories',EntityType::class,[
            'class'=>Categories::class,
            'label'=>''
            ])
        ->add('techniques',EntityType::class,[
            'class'=>Techniques::class,
            'label'=>''
        ])
        ->add('photographe',EntityType::class,[
            'class'=>Photographe::class,
            'label'=>''

        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Photos::class,
        ]);
    }
}
