<?php

namespace App\Service\EntityLogic;

use App\Entity\Property;
use App\Form\PropertyType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;

class PropertyLogic implements EntityLogicInterface
{

    public function getSupportedEntity(): string
    {
        return 'property';
    }

    public function getEntityClass(): string
    {
        return Property::class;
    }

    public function createEntityInstance(): object
    {
        return new Property();
    }

    public function createForm(object $entityInstance, FormFactoryInterface $formFactory)
    {
        return $formFactory->create(PropertyType::class, $entityInstance);
    }

    public function validateNewEntityForm(object $entityInstance, FormInterface $form): void
    {

        if (!$entityInstance instanceof Property) {
            throw new \InvalidArgumentException('Invalid entity type.');
        }

    }

    public function validateEditEntityForm(object $entityInstance, FormInterface $form): void
    {
        if (!$entityInstance instanceof Property) {
            throw new \InvalidArgumentException('Invalid entity type.');
        }

    }

    public function handleEntityRemoveLogic(object $entityInstance): void
    {
        if (!$entityInstance instanceof Property) {
            throw new \InvalidArgumentException('Invalid entity type.');
        }

    }

}