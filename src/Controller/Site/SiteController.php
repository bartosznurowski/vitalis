<?php

namespace App\Controller\Site;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Service\EntityLogic\EntityLogicHandler;
use Ramsey\Uuid\Uuid;

class SiteController extends AbstractController
{

    private $entityLogicHandler;

    public function __construct(EntityLogicHandler $entityLogicHandler)
    {
        $this->entityLogicHandler = $entityLogicHandler;
    }

    #[Route('/', name: 'site_home')]
    public function index(): Response
    {
        return $this->render('site/index.html.twig', [
            
        ]);
        
    }

    #[Route('/katalog', name: 'site_catalog')]
    public function catalog(): Response
    {

        try {
            
            $typeOfEntity = 'nutrition-entity-catalog';

            $entityList = $this->entityLogicHandler->getEntityList($typeOfEntity);  
            
        } catch (\InvalidArgumentException $e) {
            
            return $this->redirectToRoute('site_home'); 

        }
        dd($entityList);
        return $this->render('site/catalog/list.html.twig', [
            'entityList' => $entityList,
            'entityNameSingular' => $this->entityLogicHandler->getEntityNameSingular($typeOfEntity),
            'entityNamePlural' => $this->entityLogicHandler->getEntityNamePlural($typeOfEntity),
            'entityNameAccusative' => $this->entityLogicHandler->getEntityAccusativeName($typeOfEntity)
        ]);
    }

    #[Route('/{typeOfEntity}/category/list', name: 'site_entity_category_list')]
    public function categoryList(string $typeOfEntity): Response
    {

        try {

            $entityCategory = $typeOfEntity.'-category';

            $entityList = $this->entityLogicHandler->getEntityList($entityCategory);  
            
        } catch (\InvalidArgumentException $e) {
            
            return $this->redirectToRoute('site_home'); 

        }

        return $this->render('site/entity-category-list/list.html.twig', [
            'entityList' => $entityList,
            'typeOfEntity' => $typeOfEntity,
            'entityNameSingular' => $this->entityLogicHandler->getEntityNameSingular($entityCategory),
            'entityNamePlural' => $this->entityLogicHandler->getEntityNamePlural($entityCategory),
            'entityNameAccusative' => $this->entityLogicHandler->getEntityAccusativeName($entityCategory)
        ]);
    }

    #[Route('/{typeOfEntity}/{categoryName}/list', name: 'site_entity_list')]
    public function categoryEntityList(string $typeOfEntity, string $categoryName): Response
    {

        try {

            $entityCategory = $typeOfEntity.'-category';
            $category = $this->entityLogicHandler->getEntityByName($entityCategory, $categoryName); 

            $categoryId = $category->getId();

            $entityList = $this->entityLogicHandler->getEntityListByCategoryId($typeOfEntity, $categoryId);  
            
        } catch (\InvalidArgumentException $e) {
            
            return $this->redirectToRoute('site_home'); 

        }

        return $this->render('site/entity-list/list.html.twig', [
            'entityList' => $entityList,
            'typeOfEntity' => $typeOfEntity,
            'categoryName' => $categoryName,
            'entityCategoryNameSingular' => $this->entityLogicHandler->getEntityNameSingular($entityCategory),
            'entityNameSingular' => $this->entityLogicHandler->getEntityNameSingular($typeOfEntity),
            'entityNamePlural' => $this->entityLogicHandler->getEntityNamePlural($typeOfEntity),
            'entityNameAccusative' => $this->entityLogicHandler->getEntityAccusativeName($typeOfEntity)
        ]);
    }

    #[Route('/{typeOfEntity}/{categoryName}/{entityName}', name: 'site_entity_page')]
    public function entityPage(string $typeOfEntity, string $categoryName, string $entityName): Response
    {

        try {

            $entityInstance = $this->entityLogicHandler->getEntityByName($typeOfEntity, $entityName); 
            
        } catch (\InvalidArgumentException $e) {
            
            return $this->redirectToRoute('site_home'); 

        }

        return $this->render('site/entity/entity.html.twig', [
            'entityInstance' => $entityInstance,
            'typeOfEntity' => $typeOfEntity,
            'entityName' => $entityName,
            'categoryName' => $categoryName,
            'entityCategoryNameSingular' => $this->entityLogicHandler->getEntityNameSingular($typeOfEntity.'-category'),
            'entityNameSingular' => $this->entityLogicHandler->getEntityNameSingular($typeOfEntity),
            'entityNamePlural' => $this->entityLogicHandler->getEntityNamePlural($typeOfEntity),
            'entityNameAccusative' => $this->entityLogicHandler->getEntityAccusativeName($typeOfEntity)
        ]);
    }

}
