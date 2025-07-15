<?php

namespace App\Service\EntityLogic;

use App\Entity\Advisory;
use App\Form\AdvisoryType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;

class AdvisoryLogic implements EntityLogicInterface
{

    public function getSupportedEntity(): string
    {
        return 'advisory';
    }

    public function getEntityClass(): string
    {
        return Advisory::class;
    }

    public function createEntityInstance(): object
    {
        return new Advisory();
    }

    public function createForm(object $entityInstance, FormFactoryInterface $formFactory)
    {
        return $formFactory->create(AdvisoryType::class, $entityInstance);
    }

    public function validateNewEntityForm(object $entityInstance, FormInterface $form): void
    {

        if (!$entityInstance instanceof Advisory) {
            throw new \InvalidArgumentException('Invalid entity type.');
        }

    }

    public function validateEditEntityForm(object $entityInstance, FormInterface $form): void
    {
        if (!$entityInstance instanceof Advisory) {
            throw new \InvalidArgumentException('Invalid entity type.');
        }

    }

    public function handleEntityRemoveLogic(object $entityInstance): void
    {
        if (!$entityInstance instanceof Advisory) {
            throw new \InvalidArgumentException('Invalid entity type.');
        }

    }

}