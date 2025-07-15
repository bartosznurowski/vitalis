<?php

namespace App\Service\EntityLogic;

use App\Entity\Usage;
use App\Form\UsageType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;

class UsageLogic implements EntityLogicInterface
{

    public function getSupportedEntity(): string
    {
        return 'usage';
    }

    public function getEntityClass(): string
    {
        return Usage::class;
    }

    public function createEntityInstance(): object
    {
        return new Usage();
    }

    public function createForm(object $entityInstance, FormFactoryInterface $formFactory)
    {
        return $formFactory->create(UsageType::class, $entityInstance);
    }

    public function validateNewEntityForm(object $entityInstance, FormInterface $form): void
    {

        if (!$entityInstance instanceof Usage) {
            throw new \InvalidArgumentException('Invalid entity type.');
        }

    }

    public function validateEditEntityForm(object $entityInstance, FormInterface $form): void
    {
        if (!$entityInstance instanceof Usage) {
            throw new \InvalidArgumentException('Invalid entity type.');
        }

    }

    public function handleEntityRemoveLogic(object $entityInstance): void
    {
        if (!$entityInstance instanceof Usage) {
            throw new \InvalidArgumentException('Invalid entity type.');
        }

    }

}