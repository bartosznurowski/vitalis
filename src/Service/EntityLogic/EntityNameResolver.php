<?php

namespace App\Service\EntityLogic;

class EntityNameResolver
{
    private array $entityNames = [
        'article' => ['singular' => 'Artykuł', 'plural' => 'Artykuły', 'accusative' => 'artykuł'],
        'article-category' => ['singular' => 'Kategorie artykułów', 'plural' => 'Kategorie artykułów', 'accusative' => 'kategorie artykułu'],
        'vitamin' => ['singular' => 'Witamina', 'plural' => 'Witaminy', 'accusative' => 'witamine'],
        'vitamin-category' => ['singular' => 'Kategorie witamin', 'plural' => 'Kategorie witamin', 'accusative' => 'kategorie witamin'],
        'mineral' => ['singular' => 'Minerał', 'plural' => 'Minerały', 'accusative' => 'minerał'],
        'mineral-category' => ['singular' => 'Kategorie Minerałów', 'plural' => 'Kategorie minerałów', 'accusative' => 'kategorie minerałów'],
        'property' => ['singular' => 'Właściwość', 'plural' => 'Właściwości', 'accusative' => 'właściwość'],
        'polyphenol' => ['singular' => 'Polifenol', 'plural' => 'Polifenole', 'accusative' => 'polifenol'],
        'polyphenol-category' => ['singular' => 'Kategorie polifenoli', 'plural' => 'Kategorie polifenoli', 'accusative' => 'kategorie polifenoli'],
        'fatty-acid' => ['singular' => 'Kwas tłuszczowy', 'plural' => 'Kwasy tłuszczowe', 'accusative' => 'kwas tłuszczowy'],
        'fatty-acid-category' => ['singular' => 'Kategorie kwasów tłuszczowych', 'plural' => 'Kategorie kwasów tłuszczowych', 'accusative' => 'kategorie kwasów tłuszczowych'],
        'fiber' => ['singular' => 'Błonnik', 'plural' => 'Błonniki', 'accusative' => 'błonnik'],
        'fiber-category' => ['singular' => 'Kategorie błonników', 'plural' => 'Kategorie błonników', 'accusative' => 'kategorie błonnika'],
        'amino-acid' => ['singular' => 'Aminokwas', 'plural' => 'Aminokwasy', 'accusative' => 'aminokwas'],
        'amino-acid-category' => ['singular' => 'Kategorie aminokwasów', 'plural' => 'Kategorie aminokwasów', 'accusative' => 'kategorie aminokwasów'],
        'enzyme' => ['singular' => 'Enzym', 'plural' => 'Enzymy', 'accusative' => 'enzym'],
        'enzyme-category' => ['singular' => 'Kategorie enzymów', 'plural' => 'Kategorie enzymów', 'accusative' => 'kategorie enzymów'],
        'terpene' => ['singular' => 'Terpen', 'plural' => 'Terpeny', 'accusative' => 'terpen'],
        'terpene-category' => ['singular' => 'Kategorie terpenów', 'plural' => 'Kategorie terpenów', 'accusative' => 'kategorie terpenów'],
        'usage' => ['singular' => 'Stosowanie', 'plural' => 'Stosowania', 'accusative' => 'stosowanie'],
        'advisory' => ['singular' => 'Ważna informacja', 'plural' => 'Ważne informacje', 'accusative' => 'ważną informacje'],
        'contraindication' => ['singular' => 'Przeciwwskazanie', 'plural' => 'Przeciwwskazania', 'accusative' => 'przeciwwskazanie'],
        'nutrition-entity-catalog' => ['singular' => 'Katalog', 'plural' => 'Katalog', 'accusative' => 'encje odżywczą'],
    ];
    
    public function getSingularName(string $entity): string
    {
        return $this->entityNames[$entity]['singular'] ?? ucfirst($entity);
    }
    
    public function getPluralName(string $entity): string
    {
        return $this->entityNames[$entity]['plural'] ?? ucfirst($entity) . 'y';
    }
    
    public function getAccusativeName(string $entity): string
    {
        return $this->entityNames[$entity]['accusative'] ?? ucfirst($entity);
    }
    
}
