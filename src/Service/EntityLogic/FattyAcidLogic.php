<?php

namespace App\Service\EntityLogic;

use App\Entity\FattyAcid;
use App\Form\FattyAcidType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;

class FattyAcidLogic implements EntityLogicInterface
{

    public function getSupportedEntity(): string
    {
        return 'fatty-acid';
    }

    public function getEntityClass(): string
    {
        return FattyAcid::class;
    }

    public function createEntityInstance(): object
    {
        return new FattyAcid();
    }

    public function createForm(object $entityInstance, FormFactoryInterface $formFactory)
    {
        return $formFactory->create(FattyAcidType::class, $entityInstance);
    }

    public function validateNewEntityForm(object $entityInstance, FormInterface $form): void
    {

        if (!$entityInstance instanceof FattyAcid) {
            throw new \InvalidArgumentException('Invalid entity type.');
        }

    }

    public function validateEditEntityForm(object $entityInstance, FormInterface $form): void
    {
        if (!$entityInstance instanceof FattyAcid) {
            throw new \InvalidArgumentException('Invalid entity type.');
        }

    }

    public function handleEntityRemoveLogic(object $entityInstance): void
    {
        if (!$entityInstance instanceof FattyAcid) {
            throw new \InvalidArgumentException('Invalid entity type.');
        }

    }

}