<?php

namespace App\Service\EntityLogic;

use App\Entity\Fiber;
use App\Form\FiberType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;

class FiberLogic implements EntityLogicInterface
{

    public function getSupportedEntity(): string
    {
        return 'fiber';
    }

    public function getEntityClass(): string
    {
        return Fiber::class;
    }

    public function createEntityInstance(): object
    {
        return new Fiber();
    }

    public function createForm(object $entityInstance, FormFactoryInterface $formFactory)
    {
        return $formFactory->create(FiberType::class, $entityInstance);
    }

    public function validateNewEntityForm(object $entityInstance, FormInterface $form): void
    {

        if (!$entityInstance instanceof Fiber) {
            throw new \InvalidArgumentException('Invalid entity type.');
        }

    }

    public function validateEditEntityForm(object $entityInstance, FormInterface $form): void
    {
        if (!$entityInstance instanceof Fiber) {
            throw new \InvalidArgumentException('Invalid entity type.');
        }

    }

    public function handleEntityRemoveLogic(object $entityInstance): void
    {
        if (!$entityInstance instanceof Fiber) {
            throw new \InvalidArgumentException('Invalid entity type.');
        }

    }

}