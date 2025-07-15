<?php

namespace App\Service\EntityLogic;

use App\Entity\VitaminCategory;
use App\Form\VitaminCategoryType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;

class VitaminCategoryLogic implements EntityLogicInterface
{

    public function getSupportedEntity(): string
    {
        return 'vitamin-category';
    }

    public function getEntityClass(): string
    {
        return VitaminCategory::class;
    }

    public function createEntityInstance(): object
    {
        return new VitaminCategory();
    }

    public function createForm(object $entityInstance, FormFactoryInterface $formFactory)
    {
        return $formFactory->create(VitaminCategoryType::class, $entityInstance);
    }

    public function validateNewEntityForm(object $entityInstance, FormInterface $form): void
    {

        if (!$entityInstance instanceof VitaminCategory) {
            throw new \InvalidArgumentException('Invalid entity type.');
        }

    }

    public function validateEditEntityForm(object $entityInstance, FormInterface $form): void
    {
        if (!$entityInstance instanceof VitaminCategory) {
            throw new \InvalidArgumentException('Invalid entity type.');
        }

    }

    public function handleEntityRemoveLogic(object $entityInstance): void
    {
        if (!$entityInstance instanceof VitaminCategory) {
            throw new \InvalidArgumentException('Invalid entity type.');
        }

    }

}