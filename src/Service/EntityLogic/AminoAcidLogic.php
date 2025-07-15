<?php

namespace App\Service\EntityLogic;

use App\Entity\AminoAcid;
use App\Form\AminoAcidType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;

class AminoAcidLogic implements EntityLogicInterface
{

    public function getSupportedEntity(): string
    {
        return 'amino-acid';
    }

    public function getEntityClass(): string
    {
        return AminoAcid::class;
    }

    public function createEntityInstance(): object
    {
        return new AminoAcid();
    }

    public function createForm(object $entityInstance, FormFactoryInterface $formFactory)
    {
        return $formFactory->create(AminoAcidType::class, $entityInstance);
    }

    public function validateNewEntityForm(object $entityInstance, FormInterface $form): void
    {

        if (!$entityInstance instanceof AminoAcid) {
            throw new \InvalidArgumentException('Invalid entity type.');
        }

    }

    public function validateEditEntityForm(object $entityInstance, FormInterface $form): void
    {
        if (!$entityInstance instanceof AminoAcid) {
            throw new \InvalidArgumentException('Invalid entity type.');
        }

    }

    public function handleEntityRemoveLogic(object $entityInstance): void
    {
        if (!$entityInstance instanceof AminoAcid) {
            throw new \InvalidArgumentException('Invalid entity type.');
        }

    }

}