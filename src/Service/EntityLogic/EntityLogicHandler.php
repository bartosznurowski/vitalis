<?php

namespace App\Service\EntityLogic;

use App\Service\EntityLogic\EntityLogicInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;
use Ramsey\Uuid\UuidInterface;
use Symfony\Component\String\Slugger\SluggerInterface;

class EntityLogicHandler
{
    private array $entityLogics;
    private EntityManagerInterface $entityManager;
    private FormFactoryInterface $formFactory;
    private EntityNameResolver $entityNameResolver;

    public function __construct(
        iterable $entityLogics,
        EntityManagerInterface $entityManager,
        FormFactoryInterface $formFactory,
        EntityNameResolver $entityNameResolver,
        SluggerInterface $slugger
    ) {
        $this->entityLogics = $this->mapEntityLogics($entityLogics);
        $this->entityManager = $entityManager;
        $this->formFactory = $formFactory;
        $this->entityNameResolver = $entityNameResolver;
        $this->slugger = $slugger;
    }

    private function mapEntityLogics(iterable $entityLogics): array
    {
        $map = [];
        foreach ($entityLogics as $logic) {
            $map[$logic->getSupportedEntity()] = $logic;
        }
        return $map;
    }

    public function createEntityInstance(string $entity): object
    {
        return $this->getLogic($entity)->createEntityInstance();
    }

    public function createFormForEntity(string $entity, object $entityInstance)
    {
        return $this->getLogic($entity)->createForm($entityInstance, $this->formFactory);
    }

    public function validateNewEntityForm(string $entity, object $entityInstance, FormInterface $form): void
    {
        $this->getLogic($entity)->validateNewEntityForm($entityInstance, $form);
    }

    public function validateEditEntityForm(string $entity, object $entityInstance, FormInterface $form): void
    {
        $this->getLogic($entity)->validateEditEntityForm($entityInstance, $form);
    }

    public function handleEntityRemoveLogic(string $entity, object $entityInstance): void
    {
        $this->getLogic($entity)->handleEntityRemoveLogic($entityInstance);
    }

    public function saveNewEntity(object $entityInstance): void
    {
        // tutaj jakis if czy ma slugga no bo zastosowania, przeciwskazania itp nie beda mialy sluggow
        if (method_exists($entityInstance, 'generateSlug')) {
            $entityInstance->generateSlug($this->slugger);
        }
        
        $currentDate = new \DateTimeImmutable();
        $entityInstance->setCreatedAt($currentDate);
        
        $this->entityManager->persist($entityInstance);
        $this->entityManager->flush();
    }

    public function saveEditedEntity(object $entityInstance): void
    {
        // tu ewentualnie setEditedAt kiedys
        
        $this->entityManager->persist($entityInstance);
        $this->entityManager->flush();
    }

    public function removeEntity(object $entityInstance): void
    {

        $this->entityManager->remove($entityInstance);
        $this->entityManager->flush();
        
    }

    public function getEntityList(string $entity): array
    {
        $repository = $this->entityManager->getRepository($this->getEntityClass($entity));
        return $repository->findAll();  
    }

    public function getEntityById(string $entity, UuidInterface $uuid): ?object
    {
        $repository = $this->entityManager->getRepository($this->getEntityClass($entity));
        return $repository->find($uuid);
    }

    public function getEntityByName(string $entity, string $name): ?object
    {
        // i tu podmianka potem ze encje maja te pola pod wyszkiwanie urlem typu rozp-w-wodize
        $repository = $this->entityManager->getRepository($this->getEntityClass($entity));
        return $repository->findOneBy(['name' => $name]);
    }

    public function getEntityListByCategoryId(string $entity, UuidInterface $uuid): array
    {
        $repository = $this->entityManager->getRepository($this->getEntityClass($entity));
        return $repository->findBy(['category' => $uuid]);
    }

    private function getEntityClass(string $entity): string
    {
 
        if (!isset($this->entityLogics[$entity])) {
            throw new \InvalidArgumentException(sprintf('Logic for entity "%s" not found.', $entity));
        }
        
        $logic = $this->entityLogics[$entity];
        return $logic->getEntityClass();  
    }

    private function getLogic(string $entity): EntityLogicInterface
    {
        if (!isset($this->entityLogics[$entity])) {
            throw new \InvalidArgumentException(sprintf('Logic for entity "%s" not found.', $entity));
        }

        return $this->entityLogics[$entity];
    }

    public function getEntityNameSingular(string $entity): string
    {
        return $this->entityNameResolver->getSingularName($entity);
    }

    public function getEntityNamePlural(string $entity): string
    {
        return $this->entityNameResolver->getPluralName($entity);
    }

    public function getEntityAccusativeName(string $entity): string
    {
        return $this->entityNameResolver->getAccusativeName($entity);
    }
}
