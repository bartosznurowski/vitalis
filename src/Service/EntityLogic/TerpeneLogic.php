<?php

namespace App\Service\EntityLogic;

use App\Entity\Terpene;
use App\Form\TerpeneType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;

class TerpeneLogic implements EntityLogicInterface
{

    public function getSupportedEntity(): string
    {
        return 'terpene';
    }

    public function getEntityClass(): string
    {
        return Terpene::class;
    }

    public function createEntityInstance(): object
    {
        return new Terpene();
    }

    public function createForm(object $entityInstance, FormFactoryInterface $formFactory)
    {
        return $formFactory->create(TerpeneType::class, $entityInstance);
    }

    public function validateNewEntityForm(object $entityInstance, FormInterface $form): void
    {

        if (!$entityInstance instanceof Terpene) {
            throw new \InvalidArgumentException('Invalid entity type.');
        }

    }

    public function validateEditEntityForm(object $entityInstance, FormInterface $form): void
    {
        if (!$entityInstance instanceof Terpene) {
            throw new \InvalidArgumentException('Invalid entity type.');
        }

    }

    public function handleEntityRemoveLogic(object $entityInstance): void
    {
        if (!$entityInstance instanceof Terpene) {
            throw new \InvalidArgumentException('Invalid entity type.');
        }

    }

}