<?php

namespace App\Service\EntityLogic;

use App\Entity\ArticleCategory;
use App\Form\ArticleCategoryType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;

class ArticleCategoryLogic implements EntityLogicInterface
{

    public function getSupportedEntity(): string
    {
        return 'article-category';
    }

    public function getEntityClass(): string
    {
        return ArticleCategory::class;
    }

    public function createEntityInstance(): object
    {
        return new ArticleCategory();
    }

    public function createForm(object $entityInstance, FormFactoryInterface $formFactory)
    {
        return $formFactory->create(ArticleCategoryType::class, $entityInstance);
    }

    public function validateNewEntityForm(object $entityInstance, FormInterface $form): void
    {

        if (!$entityInstance instanceof ArticleCategory) {
            throw new \InvalidArgumentException('Invalid entity type.');
        }

    }

    public function validateEditEntityForm(object $entityInstance, FormInterface $form): void
    {
        if (!$entityInstance instanceof ArticleCategory) {
            throw new \InvalidArgumentException('Invalid entity type.');
        }

    }

    public function handleEntityRemoveLogic(object $entityInstance): void
    {
        if (!$entityInstance instanceof ArticleCategory) {
            throw new \InvalidArgumentException('Invalid entity type.');
        }

    }

}