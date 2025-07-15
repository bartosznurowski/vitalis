<?php

namespace App\Form;

use App\Entity\Catalog;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class CatalogType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class , [ 
                'attr'=> array(
                'class' => 'form-control mb-4',
                ), 
                'label' => 'Nazwa encji odżywczej: ',
            ])
            ->add('description', TextareaType::class , [ 
                'attr'=> array(
                'class' => 'form-control mb-4',
                ), 
                'label' => 'Opis encji odżywczej: ',
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
            ->add('entity_name', TextType::class , [ 
                'attr'=> array(
                'class' => 'form-control mb-4',
                ), 
                'label' => 'Nazwa encji: ',
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
            'data_class' => Catalog::class,
        ]);
    }
}
