<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use App\Service\EntityLogic\EntityLogicHandler;
use Ramsey\Uuid\Uuid;
use Psr\Log\LoggerInterface;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;
use Symfony\Component\Security\Csrf\CsrfToken;

class AdminController extends AbstractController
{

    private $entityLogicHandler;

    public function __construct(EntityLogicHandler $entityLogicHandler)
    {
        $this->entityLogicHandler = $entityLogicHandler;
    }

    #[Route('/admin', name: 'admin_dashboard')]
    public function index(): Response
    {

        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    #[Route('/admin/{entity}/new', name: 'admin_entity_new')]
    public function entityAdd(string $entity, Request $request): Response
    {
        $entityInstance = $this->entityLogicHandler->createEntityInstance($entity);

        $form = $this->entityLogicHandler->createFormForEntity($entity, $entityInstance);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $this->entityLogicHandler->validateNewEntityForm($entity, $entityInstance, $form);
            $this->entityLogicHandler->saveNewEntity($entityInstance);

            return $this->redirectToRoute('admin_entity_list', ['entity' => $entity]);

        }

        return $this->render('admin/entity/new_entity.html.twig', [
            'form' => $form->createView(),
            'entityName' => $entity,
            'entityNameSingular' => $this->entityLogicHandler->getEntityNameSingular($entity),
            'entityNamePlural' => $this->entityLogicHandler->getEntityNamePlural($entity),
            'entityNameAccusative' => $this->entityLogicHandler->getEntityAccusativeName($entity)
        ]);
    }

    #[Route('/admin/{entity}/list', name: 'admin_entity_list')]
    public function entityList(string $entity): Response
    {
        
        try {
            
            $entityList = $this->entityLogicHandler->getEntityList($entity);  
            
        } catch (\InvalidArgumentException $e) {
            
            $this->addFlash('error', $e->getMessage());
            
            return $this->redirectToRoute('admin_dashboard'); 
        }

        return $this->render('admin/entity/entity_list.html.twig', [
            'entityList' => $entityList,
            'entityName' => $entity,
            'entityNameSingular' => $this->entityLogicHandler->getEntityNameSingular($entity),
            'entityNamePlural' => $this->entityLogicHandler->getEntityNamePlural($entity),
            'entityNameAccusative' => $this->entityLogicHandler->getEntityAccusativeName($entity)
        ]);
    }

    #[Route('/admin/{entity}/{id}/edit', name: 'admin_entity_edit')]
    public function entityEdit(Request $request, string $entity, string $id): Response
    {
        $uuid = Uuid::fromString($id);

        $entityInstance = $this->entityLogicHandler->getEntityById($entity, $uuid);

        $form = $this->entityLogicHandler->createFormForEntity($entity, $entityInstance);
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
       
            $this->entityLogicHandler->validateEditEntityForm($entity, $entityInstance, $form);
            $this->entityLogicHandler->saveEditedEntity($entityInstance);

            return $this->redirectToRoute('admin_entity_list', ['entity' => $entity]);
        }

        return $this->render('admin/entity/edit_entity.html.twig', [
            'form' => $form->createView(),
            'entityName' => $entity,
            'entityNameSingular' => $this->entityLogicHandler->getEntityNameSingular($entity),
            'entityNamePlural' => $this->entityLogicHandler->getEntityNamePlural($entity),
            'entityNameAccusative' => $this->entityLogicHandler->getEntityAccusativeName($entity)
        ]);

    }

    #[Route('/admin/{entity}/{id}/delete', name: 'admin_entity_delete'/*, methods: ['POST']*/)]
    public function entityDelete(string $entity, string $id, Request $request, CsrfTokenManagerInterface $csrfTokenManager, LoggerInterface $logger): Response
    {
        
        $uuid = Uuid::fromString($id);

        $entityInstance = $this->entityLogicHandler->getEntityById($entity, $uuid);

        $this->entityLogicHandler->handleEntityRemoveLogic($entity, $entityInstance);

        $this->entityLogicHandler->removeEntity($entityInstance);

        return new RedirectResponse($this->generateUrl('app_admin_entity_list', ['entity' => $entity]));
        
    }

}
