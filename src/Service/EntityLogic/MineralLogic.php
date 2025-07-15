<?php

namespace App\Service\EntityLogic;

use App\Entity\Mineral;
use App\Form\MineralType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;

class MineralLogic implements EntityLogicInterface
{

    public function getSupportedEntity(): string
    {
        return 'mineral';
    }

    public function getEntityClass(): string
    {
        return Mineral::class;
    }

    public function createEntityInstance(): object
    {
        return new Mineral();
    }

    public function createForm(object $entityInstance, FormFactoryInterface $formFactory)
    {
        return $formFactory->create(MineralType::class, $entityInstance);
    }

    public function validateNewEntityForm(object $entityInstance, FormInterface $form): void
    {

        if (!$entityInstance instanceof Mineral) {
            throw new \InvalidArgumentException('Invalid entity type.');
        }

    }

    public function validateEditEntityForm(object $entityInstance, FormInterface $form): void
    {
        if (!$entityInstance instanceof Mineral) {
            throw new \InvalidArgumentException('Invalid entity type.');
        }

    }

    public function handleEntityRemoveLogic(object $entityInstance): void
    {
        if (!$entityInstance instanceof Mineral) {
            throw new \InvalidArgumentException('Invalid entity type.');
        }

    }

}