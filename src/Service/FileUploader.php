<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Ramsey\Uuid\UuidInterface;

class FileUploader
{
    private $parameters;

    public function __construct(ParameterBagInterface $parameters)
    {
        $this->parameters = $parameters;
    }

    public function upload(File $imageFile, string $entityName, UuidInterface $entityId): string
    {

        $newFilename = uniqid() . '.' . $imageFile->guessExtension();

        $directoryPath = $this->parameters->get('kernel.project_dir') . '/var/files/' . $entityName . '/' . $entityId;

        if (!is_dir($directoryPath)) {
            mkdir($directoryPath, 0777, true);
        }

        try {
            copy($imageFile->getPathname(), $directoryPath . '/' . $newFilename);
        } catch (FileException $e) {
            throw new \RuntimeException('An error occurred while uploading the file: ' . $e->getMessage());
        }

        return $newFilename;
    }
}
