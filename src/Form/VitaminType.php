<?php

namespace App\Form;

use App\Entity\Vitamin;
use App\Entity\VitaminCategory;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class VitaminType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class , [ 
                'attr'=> array(
                'class' => 'form-control mb-4',
                ), 
                'label' => 'Nazwa witaminy: ',
            ])
            ->add('description', TextType::class , [ 
                'attr'=> array(
                'class' => 'form-control mb-4',
                ), 
                'label' => 'Opis witaminy: ',
            ])
            ->add('category', EntityType::class, [
                'class' => VitaminCategory::class,
                'choice_label' => 'name', 
                'attr'=> array(
                    'class' => 'form-control mb-4',
                ), 
                'label' => "Kategoria witaminy: ",
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
            'data_class' => Vitamin::class,
        ]);
    }
}
