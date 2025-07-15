<?php

namespace App\Service\EntityLogic;

use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;

interface EntityLogicInterface
{
    public function getSupportedEntity(): string;

    public function getEntityClass(): string;

    public function createEntityInstance(): object;

    public function createForm(object $entityInstance, FormFactoryInterface $formFactory);

    public function validateNewEntityForm(object $entityInstance, FormInterface $form): void;

    public function validateEditEntityForm(object $entityInstance, FormInterface $form): void;

    public function handleEntityRemoveLogic(object $entityInstance): void;
}
