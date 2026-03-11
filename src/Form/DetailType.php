<?php

namespace App\Form;

use App\Entity\Detail;
use App\Entity\Service;
use BcMath\Number;
use Doctrine\DBAL\Types\IntegerType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DetailType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('imageFileName', FileType::class, [
                'label' => 'Image (JPG or PNG file)',
                'mapped' => false,
                'required' => false, 
            ])
            ->add('titre')
            ->add('description')
            ->add('tarif')
            
            ->add('service', EntityType::class, [
                'class' => Service::class,
                'choice_label' => 'titre',
            ])

            ->add('save', SubmitType::class, [
                'label' => 'Save',
                'attr' => ['class' => 'btn btn-primary mt-3']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Detail::class,
        ]);
    }
}
