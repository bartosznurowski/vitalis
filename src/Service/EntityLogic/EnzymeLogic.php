<?php

namespace App\Service\EntityLogic;

use App\Entity\Enzyme;
use App\Form\EnzymeType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;

class EnzymeLogic implements EntityLogicInterface
{

    public function getSupportedEntity(): string
    {
        return 'enzyme';
    }

    public function getEntityClass(): string
    {
        return Enzyme::class;
    }

    public function createEntityInstance(): object
    {
        return new Enzyme();
    }

    public function createForm(object $entityInstance, FormFactoryInterface $formFactory)
    {
        return $formFactory->create(EnzymeType::class, $entityInstance);
    }

    public function validateNewEntityForm(object $entityInstance, FormInterface $form): void
    {

        if (!$entityInstance instanceof Enzyme) {
            throw new \InvalidArgumentException('Invalid entity type.');
        }

    }

    public function validateEditEntityForm(object $entityInstance, FormInterface $form): void
    {
        if (!$entityInstance instanceof Enzyme) {
            throw new \InvalidArgumentException('Invalid entity type.');
        }

    }

    public function handleEntityRemoveLogic(object $entityInstance): void
    {
        if (!$entityInstance instanceof Enzyme) {
            throw new \InvalidArgumentException('Invalid entity type.');
        }

    }

}