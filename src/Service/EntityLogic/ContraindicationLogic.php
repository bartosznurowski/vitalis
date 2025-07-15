<?php

namespace App\Service\EntityLogic;

use App\Entity\Contraindication;
use App\Form\ContraindicationType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;

class ContraindicationLogic implements EntityLogicInterface
{

    public function getSupportedEntity(): string
    {
        return 'contraindication';
    }

    public function getEntityClass(): string
    {
        return Contraindication::class;
    }

    public function createEntityInstance(): object
    {
        return new Contraindication();
    }

    public function createForm(object $entityInstance, FormFactoryInterface $formFactory)
    {
        return $formFactory->create(ContraindicationType::class, $entityInstance);
    }

    public function validateNewEntityForm(object $entityInstance, FormInterface $form): void
    {

        if (!$entityInstance instanceof Contraindication) {
            throw new \InvalidArgumentException('Invalid entity type.');
        }

    }

    public function validateEditEntityForm(object $entityInstance, FormInterface $form): void
    {
        if (!$entityInstance instanceof Contraindication) {
            throw new \InvalidArgumentException('Invalid entity type.');
        }

    }

    public function handleEntityRemoveLogic(object $entityInstance): void
    {
        if (!$entityInstance instanceof Contraindication) {
            throw new \InvalidArgumentException('Invalid entity type.');
        }

    }

}