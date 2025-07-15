<?php

namespace App\Form;

use App\Entity\FattyAcid;
use App\Entity\FattyAcidCategory;
use App\Entity\Property;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class FattyAcidType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class , [ 
                'attr'=> array(
                'class' => 'form-control mb-4',
                ), 
                'label' => 'Nazwa kwasu tłuszczowego: ',
            ])
            ->add('description', TextType::class , [ 
                'attr'=> array(
                'class' => 'form-control mb-4',
                ), 
                'label' => 'Opis kwasu tłuszczowego: ',
            ])
            ->add('category', EntityType::class, [
                'class' => FattyAcidCategory::class,
                'choice_label' => 'name', 
                'attr'=> array(
                    'class' => 'form-control mb-4',
                ), 
                'label' => "Kategoria kwasu tłuszczowego: ",
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
            'data_class' => FattyAcid::class,
        ]);
    }
}
