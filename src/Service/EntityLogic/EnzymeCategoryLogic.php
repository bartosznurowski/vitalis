<?php

namespace App\Service\EntityLogic;

use App\Entity\EnzymeCategory;
use App\Form\EnzymeCategoryType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;

class EnzymeCategoryLogic implements EntityLogicInterface
{

    public function getSupportedEntity(): string
    {
        return 'enzyme-category';
    }

    public function getEntityClass(): string
    {
        return EnzymeCategory::class;
    }

    public function createEntityInstance(): object
    {
        return new EnzymeCategory();
    }

    public function createForm(object $entityInstance, FormFactoryInterface $formFactory)
    {
        return $formFactory->create(EnzymeCategoryType::class, $entityInstance);
    }

    public function validateNewEntityForm(object $entityInstance, FormInterface $form): void
    {

        if (!$entityInstance instanceof EnzymeCategory) {
            throw new \InvalidArgumentException('Invalid entity type.');
        }

    }

    public function validateEditEntityForm(object $entityInstance, FormInterface $form): void
    {
        if (!$entityInstance instanceof EnzymeCategory) {
            throw new \InvalidArgumentException('Invalid entity type.');
        }

    }

    public function handleEntityRemoveLogic(object $entityInstance): void
    {
        if (!$entityInstance instanceof EnzymeCategory) {
            throw new \InvalidArgumentException('Invalid entity type.');
        }

    }

}