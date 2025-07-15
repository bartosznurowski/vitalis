<?php

namespace App\Service\EntityLogic;

use App\Entity\TerpeneCategory;
use App\Form\TerpeneCategoryType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;

class TerpeneCategoryLogic implements EntityLogicInterface
{

    public function getSupportedEntity(): string
    {
        return 'terpene-category';
    }

    public function getEntityClass(): string
    {
        return TerpeneCategory::class;
    }

    public function createEntityInstance(): object
    {
        return new TerpeneCategory();
    }

    public function createForm(object $entityInstance, FormFactoryInterface $formFactory)
    {
        return $formFactory->create(TerpeneCategoryType::class, $entityInstance);
    }

    public function validateNewEntityForm(object $entityInstance, FormInterface $form): void
    {

        if (!$entityInstance instanceof TerpeneCategory) {
            throw new \InvalidArgumentException('Invalid entity type.');
        }

    }

    public function validateEditEntityForm(object $entityInstance, FormInterface $form): void
    {
        if (!$entityInstance instanceof TerpeneCategory) {
            throw new \InvalidArgumentException('Invalid entity type.');
        }

    }

    public function handleEntityRemoveLogic(object $entityInstance): void
    {
        if (!$entityInstance instanceof TerpeneCategory) {
            throw new \InvalidArgumentException('Invalid entity type.');
        }

    }

}