<?php

namespace App\Service\EntityLogic;

use App\Entity\FiberCategory;
use App\Form\FiberCategoryType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;

class FiberCategoryLogic implements EntityLogicInterface
{

    public function getSupportedEntity(): string
    {
        return 'fiber-category';
    }

    public function getEntityClass(): string
    {
        return FiberCategory::class;
    }

    public function createEntityInstance(): object
    {
        return new FiberCategory();
    }

    public function createForm(object $entityInstance, FormFactoryInterface $formFactory)
    {
        return $formFactory->create(FiberCategoryType::class, $entityInstance);
    }

    public function validateNewEntityForm(object $entityInstance, FormInterface $form): void
    {

        if (!$entityInstance instanceof FiberCategory) {
            throw new \InvalidArgumentException('Invalid entity type.');
        }

    }

    public function validateEditEntityForm(object $entityInstance, FormInterface $form): void
    {
        if (!$entityInstance instanceof FiberCategory) {
            throw new \InvalidArgumentException('Invalid entity type.');
        }

    }

    public function handleEntityRemoveLogic(object $entityInstance): void
    {
        if (!$entityInstance instanceof FiberCategory) {
            throw new \InvalidArgumentException('Invalid entity type.');
        }

    }

}