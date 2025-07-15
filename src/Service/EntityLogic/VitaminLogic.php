<?php

namespace App\Service\EntityLogic;

use App\Entity\Vitamin;
use App\Form\VitaminType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;

class VitaminLogic implements EntityLogicInterface
{

    public function getSupportedEntity(): string
    {
        return 'vitamin';
    }

    public function getEntityClass(): string
    {
        return Vitamin::class;
    }

    public function createEntityInstance(): object
    {
        return new Vitamin();
    }

    public function createForm(object $entityInstance, FormFactoryInterface $formFactory)
    {
        return $formFactory->create(VitaminType::class, $entityInstance);
    }

    public function validateNewEntityForm(object $entityInstance, FormInterface $form): void
    {

        if (!$entityInstance instanceof Vitamin) {
            throw new \InvalidArgumentException('Invalid entity type.');
        }

    }

    public function validateEditEntityForm(object $entityInstance, FormInterface $form): void
    {
        if (!$entityInstance instanceof Vitamin) {
            throw new \InvalidArgumentException('Invalid entity type.');
        }

    }

    public function handleEntityRemoveLogic(object $entityInstance): void
    {
        if (!$entityInstance instanceof Vitamin) {
            throw new \InvalidArgumentException('Invalid entity type.');
        }

    }

}