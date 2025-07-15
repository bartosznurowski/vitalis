<?php

namespace App\Service\EntityLogic;

use App\Entity\MineralCategory;
use App\Form\MineralCategoryType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;

class MineralCategoryLogic implements EntityLogicInterface
{

    public function getSupportedEntity(): string
    {
        return 'mineral-category';
    }

    public function getEntityClass(): string
    {
        return MineralCategory::class;
    }

    public function createEntityInstance(): object
    {
        return new MineralCategory();
    }

    public function createForm(object $entityInstance, FormFactoryInterface $formFactory)
    {
        return $formFactory->create(MineralCategoryType::class, $entityInstance);
    }

    public function validateNewEntityForm(object $entityInstance, FormInterface $form): void
    {

        if (!$entityInstance instanceof MineralCategory) {
            throw new \InvalidArgumentException('Invalid entity type.');
        }

    }

    public function validateEditEntityForm(object $entityInstance, FormInterface $form): void
    {
        if (!$entityInstance instanceof MineralCategory) {
            throw new \InvalidArgumentException('Invalid entity type.');
        }

    }

    public function handleEntityRemoveLogic(object $entityInstance): void
    {
        if (!$entityInstance instanceof MineralCategory) {
            throw new \InvalidArgumentException('Invalid entity type.');
        }

    }

}