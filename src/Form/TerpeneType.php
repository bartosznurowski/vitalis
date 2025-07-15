<?php

namespace App\Form;

use App\Entity\Property;
use App\Entity\Terpene;
use App\Entity\TerpeneCategory;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class TerpeneType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class , [ 
                'attr'=> array(
                'class' => 'form-control mb-4',
                ), 
                'label' => 'Nazwa terpenu: ',
            ])
            ->add('description', TextType::class , [ 
                'attr'=> array(
                'class' => 'form-control mb-4',
                ), 
                'label' => 'Opis terpenu: ',
            ])
            ->add('category', EntityType::class, [
                'class' => TerpeneCategory::class,
                'choice_label' => 'name', 
                'attr'=> array(
                    'class' => 'form-control mb-4',
                ), 
                'label' => "Kategoria terpenu: ",
            ])
            ->add('properties', EntityType::class, [
                'class' => Property::class,
                'choice_label' => 'name', 
                'multiple' => true,  
                'expanded' => true,  
                'attr' => ['class' => 'form-control mb-4'],
                'label' => "Właściwości: ",
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Zapisz',
                'attr' => [
                    'class' => 'btn btn-success',  
                ],
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Terpene::class,
        ]);
    }
}
