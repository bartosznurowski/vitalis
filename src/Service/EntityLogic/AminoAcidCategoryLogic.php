<?php

namespace App\Service\EntityLogic;

use App\Entity\AminoAcidCategory;
use App\Form\AminoAcidCategoryType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;

class AminoAcidCategoryLogic implements EntityLogicInterface
{

    public function getSupportedEntity(): string
    {
        return 'amino-acid-category';
    }

    public function getEntityClass(): string
    {
        return AminoAcidCategory::class;
    }

    public function createEntityInstance(): object
    {
        return new AminoAcidCategory();
    }

    public function createForm(object $entityInstance, FormFactoryInterface $formFactory)
    {
        return $formFactory->create(AminoAcidCategoryType::class, $entityInstance);
    }

    public function validateNewEntityForm(object $entityInstance, FormInterface $form): void
    {

        if (!$entityInstance instanceof AminoAcidCategory) {
            throw new \InvalidArgumentException('Invalid entity type.');
        }

    }

    public function validateEditEntityForm(object $entityInstance, FormInterface $form): void
    {
        if (!$entityInstance instanceof AminoAcidCategory) {
            throw new \InvalidArgumentException('Invalid entity type.');
        }

    }

    public function handleEntityRemoveLogic(object $entityInstance): void
    {
        if (!$entityInstance instanceof AminoAcidCategory) {
            throw new \InvalidArgumentException('Invalid entity type.');
        }

    }

}