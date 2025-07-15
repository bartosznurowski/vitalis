<?php

namespace App\Service\EntityLogic;

use App\Entity\FattyAcidCategory;
use App\Form\FattyAcidCategoryType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;

class FattyAcidCategoryLogic implements EntityLogicInterface
{

    public function getSupportedEntity(): string
    {
        return 'fatty-acid-category';
    }

    public function getEntityClass(): string
    {
        return FattyAcidCategory::class;
    }

    public function createEntityInstance(): object
    {
        return new FattyAcidCategory();
    }

    public function createForm(object $entityInstance, FormFactoryInterface $formFactory)
    {
        return $formFactory->create(FattyAcidCategoryType::class, $entityInstance);
    }

    public function validateNewEntityForm(object $entityInstance, FormInterface $form): void
    {

        if (!$entityInstance instanceof FattyAcidCategory) {
            throw new \InvalidArgumentException('Invalid entity type.');
        }

    }

    public function validateEditEntityForm(object $entityInstance, FormInterface $form): void
    {
        if (!$entityInstance instanceof FattyAcidCategory) {
            throw new \InvalidArgumentException('Invalid entity type.');
        }

    }

    public function handleEntityRemoveLogic(object $entityInstance): void
    {
        if (!$entityInstance instanceof FattyAcidCategory) {
            throw new \InvalidArgumentException('Invalid entity type.');
        }

    }

}