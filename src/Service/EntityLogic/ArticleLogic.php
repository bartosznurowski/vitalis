<?php

namespace App\Service\EntityLogic;

use App\Entity\Article;
use App\Form\ArticleType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use Doctrine\ORM\EntityManagerInterface;


class ArticleLogic implements EntityLogicInterface
{

    private EntityManagerInterface $entityManager;
    private ParameterBagInterface $parameters;
    private ValidatorInterface $validator;

    public function __construct(
        EntityManagerInterface $entityManager,
        ParameterBagInterface $parameters, 
        ValidatorInterface $validator 
    ) {
        $this->entityManager = $entityManager;
        $this->parameters = $parameters;
        $this->validator = $validator;
    }

    public function getSupportedEntity(): string
    {
        return 'article';
    }

    public function getEntityClass(): string
    {
        return Article::class;
    }

    public function createEntityInstance(): object
    {
        return new Article();
    }

    public function createForm(object $entityInstance, FormFactoryInterface $formFactory)
    {
        return $formFactory->create(ArticleType::class, $entityInstance);
    }

    public function validateNewEntityForm(object $entityInstance, FormInterface $form): void
    {

        if (!$entityInstance instanceof Article) {
            throw new \InvalidArgumentException('Invalid entity type.');
        }

        $imageFile = $form->get('image_file_name')->getData();

        if (!$imageFile) {
            throw new \InvalidArgumentException('Image file is required.');
        }

        $this->validateImage($imageFile);

        $this->entityManager->persist($entityInstance);

        $newFilename = uniqid() . '.' . $imageFile->guessExtension();

        $directoryPath = $this->parameters->get('kernel.project_dir') . '/var/files/article/' . $entityInstance->getId();

        if (!is_dir($directoryPath)) {
            mkdir($directoryPath, 0777, true);
        }

        try {

            $imageFile->move($directoryPath, $newFilename);

            $entityInstance->setImageFileName($newFilename);

        } catch (FileException $e) {

            throw new \RuntimeException('An error occurred while uploading the file: ' . $e->getMessage());
        }

    }

    public function validateEditEntityForm(object $entityInstance, FormInterface $form): void
    {
        if (!$entityInstance instanceof Article) {
            throw new \InvalidArgumentException('Invalid entity type.');
        }

    }

    public function handleEntityRemoveLogic(object $entityInstance): void
    {
        if (!$entityInstance instanceof Article) {
            throw new \InvalidArgumentException('Invalid entity type.');
        }


        $basePath = realpath($this->parameters->get('kernel.project_dir') . '/var/files/article');
        $directoryPath = realpath($basePath . '/' . $entityInstance->getId());

        if ($directoryPath === false || strpos($directoryPath, $basePath) !== 0) {
            throw new \RuntimeException('Niepoprawna ścieżka katalogu.');
        }

        if (is_dir($directoryPath)) {
            try {
                $this->filesystem->remove($directoryPath);
            } catch (\Exception $e) {
                $this->logger->error('Nie udało się usunąć katalogu: ' . $directoryPath, ['exception' => $e]);
            }
        }

    }

    private function validateImage(UploadedFile $imageFile): void
    {
        
        $violations = $this->validator->validate($imageFile, [
            new File([
                'maxSize' => '5M', 
                'mimeTypes' => ['image/jpeg', 'image/png'], 
                'mimeTypesMessage' => 'Tylko pliki JPG i PNG są dozwolone.',
                'maxSizeMessage' => 'Maksymalny rozmiar pliku to 5MB.',
            ])
        ]);

        if (count($violations) > 0) {
            /** @var ConstraintViolationListInterface $violations */
            $errorMessages = [];
            foreach ($violations as $violation) {
                $errorMessages[] = $violation->getMessage();
            }

            throw new \RuntimeException(implode(' ', $errorMessages));
        }

    }


    // handle entityimageremovelogic 
}
