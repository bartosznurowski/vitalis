<?php

namespace App\Form;

use App\Entity\Article;
use App\Entity\Mineral;
use App\Entity\Property;
use App\Entity\Vitamin;
use App\Entity\ArticleCategory;
use App\Entity\Polyphenol;
use App\Entity\FattyAcid;
use App\Entity\Fiber;
use App\Entity\AminoAcid;
use App\Entity\Enzyme;
use App\Entity\Terpene;
use App\Entity\Advisory;
use App\Entity\Usage;
use App\Entity\Contraindication;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class , [ 
                'attr'=> array(
                'class' => 'form-control mb-4',
                ), 
                'label' => 'Nazwa artykułu: ',
            ])
            ->add('description', TextareaType::class , [ 
                'attr'=> array(
                'class' => 'form-control mb-4',
                ), 
                'label' => 'Opis artykułu: ',
            ])
            ->add('category', EntityType::class, [
                'class' => ArticleCategory::class,
                'choice_label' => 'name', 
                'attr'=> array(
                    'class' => 'form-control mb-4',
                ), 
                'label' => "Kategoria artykułu: ",
            ])
            ->add('image_file_name', FileType::class, [
                'attr'=> array(
                    'class' => 'form-control mb-4',
                ), 
                'label' => 'Zdjęcie poglądowe:',
                'mapped' => false,
                'multiple' => false,
                'required' => false
            ])
            ->add('energy_value', IntegerType::class , [ 
                'attr'=> array(
                'class' => 'form-control mb-4',
                ), 
                'label' => 'Wartość odżywcza (kcal): ',
            ])
            ->add('fat', NumberType::class , [ 
                'attr'=> array(
                'class' => 'form-control mb-4',
                ), 
                'label' => 'Tłuszcz: ',
            ])
            ->add('of_which_saturates', NumberType::class , [ 
                'attr'=> array(
                'class' => 'form-control mb-4',
                ), 
                'label' => 'w tym kwasy tłuszczowe nasycone: ',
            ])
            ->add('carbohydrates', NumberType::class , [ 
                'attr'=> array(
                'class' => 'form-control mb-4',
                ), 
                'label' => 'Węglowodany: ',
            ])
            ->add('of_which_sugars', NumberType::class , [ 
                'attr'=> array(
                'class' => 'form-control mb-4',
                ), 
                'label' => 'w tym cukry: ',
            ])
            ->add('protein', NumberType::class , [ 
                'attr'=> array(
                'class' => 'form-control mb-4',
                ), 
                'label' => 'Białko: ',
            ])
            ->add('fibre', NumberType::class , [ 
                'attr'=> array(
                'class' => 'form-control mb-4',
                ), 
                'label' => 'Błonnik: ',
            ])
            ->add('salt', NumberType::class , [ 
                'attr'=> array(
                'class' => 'form-control mb-4',
                ), 
                'label' => 'Sól: ',
            ])
            ->add('vitamins', EntityType::class, [
                'class' => Vitamin::class,
                'choice_label' => 'name', 
                'multiple' => true,  
                'expanded' => true,  
                'attr' => ['class' => 'form-control mb-4'],
                'label' => "Witaminy: ",
            ])
            ->add('minerals', EntityType::class, [
                'class' => Mineral::class,
                'choice_label' => 'name', 
                'multiple' => true,  
                'expanded' => true,  
                'attr' => ['class' => 'form-control mb-4'],
                'label' => "Minerały: ",
            ])
            ->add('properties', EntityType::class, [
                'class' => Property::class,
                'choice_label' => 'name', 
                'multiple' => true,  
                'expanded' => true,  
                'attr' => ['class' => 'form-control mb-4'],
                'label' => "Właściwości: ",
            ])
            ->add('polyphenols', EntityType::class, [
                'class' => Polyphenol::class,
                'choice_label' => 'name', 
                'multiple' => true,  
                'expanded' => true,  
                'attr' => ['class' => 'form-control mb-4'],
                'label' => "Polifenole: ",
            ])
            ->add('fatty_acids', EntityType::class, [
                'class' => FattyAcid::class,
                'choice_label' => 'name', 
                'multiple' => true,  
                'expanded' => true,  
                'attr' => ['class' => 'form-control mb-4'],
                'label' => "Kwasy tłuszczowe: ",
            ])
            ->add('fibers', EntityType::class, [
                'class' => Fiber::class,
                'choice_label' => 'name', 
                'multiple' => true,  
                'expanded' => true,  
                'attr' => ['class' => 'form-control mb-4'],
                'label' => "Polifenole: ",
            ])
            ->add('amino_acids', EntityType::class, [
                'class' => AminoAcid::class,
                'choice_label' => 'name', 
                'multiple' => true,  
                'expanded' => true,  
                'attr' => ['class' => 'form-control mb-4'],
                'label' => "Polifenole: ",
            ])
            ->add('enzymes', EntityType::class, [
                'class' => Enzyme::class,
                'choice_label' => 'name', 
                'multiple' => true,  
                'expanded' => true,  
                'attr' => ['class' => 'form-control mb-4'],
                'label' => "Enzymy: ",
            ])
            ->add('terpenes', EntityType::class, [
                'class' => Terpene::class,
                'choice_label' => 'name', 
                'multiple' => true,  
                'expanded' => true,  
                'attr' => ['class' => 'form-control mb-4'],
                'label' => "Terpeny: ",
            ])
            ->add('advisories', EntityType::class, [
                'class' => Advisory::class,
                'choice_label' => 'description', 
                'multiple' => true,  
                'expanded' => true,  
                'attr' => ['class' => 'form-control mb-4'],
                'label' => "Ważne informacje: ",
            ])
            ->add('usages', EntityType::class, [
                'class' => Usage::class,
                'choice_label' => 'description', 
                'multiple' => true,  
                'expanded' => true,  
                'attr' => ['class' => 'form-control mb-4'],
                'label' => "Jak stosować: ",
            ])
            ->add('contraindications', EntityType::class, [
                'class' => Contraindication::class,
                'choice_label' => 'description', 
                'multiple' => true,  
                'expanded' => true,  
                'attr' => ['class' => 'form-control mb-4'],
                'label' => "Przeciwwskazania: ",
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
            'data_class' => Article::class,
        ]);
    }
}
