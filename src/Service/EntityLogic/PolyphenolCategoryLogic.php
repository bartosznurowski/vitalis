<?php

namespace App\Service\EntityLogic;

use App\Entity\PolyphenolCategory;
use App\Form\PolyphenolCategoryType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;

class PolyphenolCategoryLogic implements EntityLogicInterface
{

    public function getSupportedEntity(): string
    {
        return 'polyphenol-category';
    }

    public function getEntityClass(): string
    {
        return PolyphenolCategory::class;
    }

    public function createEntityInstance(): object
    {
        return new PolyphenolCategory();
    }

    public function createForm(object $entityInstance, FormFactoryInterface $formFactory)
    {
        return $formFactory->create(PolyphenolCategoryType::class, $entityInstance);
    }

    public function validateNewEntityForm(object $entityInstance, FormInterface $form): void
    {

        if (!$entityInstance instanceof PolyphenolCategory) {
            throw new \InvalidArgumentException('Invalid entity type.');
        }

    }

    public function validateEditEntityForm(object $entityInstance, FormInterface $form): void
    {
        if (!$entityInstance instanceof PolyphenolCategory) {
            throw new \InvalidArgumentException('Invalid entity type.');
        }

    }

    public function handleEntityRemoveLogic(object $entityInstance): void
    {
        if (!$entityInstance instanceof PolyphenolCategory) {
            throw new \InvalidArgumentException('Invalid entity type.');
        }

    }

}