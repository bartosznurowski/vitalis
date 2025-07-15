<?php

namespace App\Service\EntityLogic;

use App\Entity\Polyphenol;
use App\Form\PolyphenolType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;

class PolyphenolLogic implements EntityLogicInterface
{

    public function getSupportedEntity(): string
    {
        return 'polyphenol';
    }

    public function getEntityClass(): string
    {
        return Polyphenol::class;
    }

    public function createEntityInstance(): object
    {
        return new Polyphenol();
    }

    public function createForm(object $entityInstance, FormFactoryInterface $formFactory)
    {
        return $formFactory->create(PolyphenolType::class, $entityInstance);
    }

    public function validateNewEntityForm(object $entityInstance, FormInterface $form): void
    {

        if (!$entityInstance instanceof Polyphenol) {
            throw new \InvalidArgumentException('Invalid entity type.');
        }

    }

    public function validateEditEntityForm(object $entityInstance, FormInterface $form): void
    {
        if (!$entityInstance instanceof Polyphenol) {
            throw new \InvalidArgumentException('Invalid entity type.');
        }

    }

    public function handleEntityRemoveLogic(object $entityInstance): void
    {
        if (!$entityInstance instanceof Polyphenol) {
            throw new \InvalidArgumentException('Invalid entity type.');
        }

    }

}