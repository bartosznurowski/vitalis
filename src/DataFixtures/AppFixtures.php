<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Service\EntityLogic\EntityLogicHandler;
use App\Service\FileUploader;
use App\Entity\User;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{

    private $entityLogicHandler;
    private $fileUploader;

    public function __construct(EntityLogicHandler $entityLogicHandler, FileUploader $fileUploader, UserPasswordHasherInterface $passwordHasher)
    {
        $this->entityLogicHandler = $entityLogicHandler;
        $this->fileUploader = $fileUploader;
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        // admin
        $admin = new User();
        $admin->setEmail($_ENV['ADMIN_MOCK_PASSWORD']);
        $admin->setRoles(['ROLE_SUPER_ADMIN']);

        $password = $_ENV['ADMIN_MOCK_PASSWORD'];
        $hashedPassword = $this->passwordHasher->hashPassword($admin, $password);
        $admin->setPassword($hashedPassword);

        $currentDate = new \DateTimeImmutable();
        $admin->setCreatedAt($currentDate);

        $manager->persist($admin);
        $manager->flush();

        // katalog
        $catalogues = [
            ['name' => 'Artykuły', 'description' => 'Opis', 'entityName' => 'article'],
            ['name' => 'Witaminy', 'description' => 'Opis', 'entityName' => 'vitamin'],
            ['name' => 'Minerały', 'description' => 'Opis', 'entityName' => 'mineral'],
            ['name' => 'Kwasy tłuszczowe', 'description' => 'Opis', 'entityName' => 'fatty-acid'],
            ['name' => 'Błonniki', 'description' => 'Opis', 'entityName' => 'fiber'],
            ['name' => 'Polifenole', 'description' => 'Opis', 'entityName' => 'polyphenol'],
            ['name' => 'Terpeny', 'description' => 'Opis', 'entityName' => 'terpene'],
            ['name' => 'Aminokwasy', 'description' => 'Opis', 'entityName' => 'amino-acid'],
            ['name' => 'Enzymy', 'description' => 'Opis', 'entityName' => 'enzyme'],
        ];
        
        foreach ($catalogues as $data) {

            $entityInstance = $this->entityLogicHandler->createEntityInstance('catalog');
            $entityInstance->setName($data['name']);
            $entityInstance->setDescription($data['description']);
            $entityInstance->setEntityName($data['entityName']);

            $manager->persist($entityInstance);
        
            $imageFile = new File($_ENV['MOCK_IMAGE_FILE_PATH']);
            $newFilename = $this->fileUploader->upload($imageFile, 'catalog', $entityInstance->getId());
            $entityInstance->setImageFileName($newFilename);

            $this->entityLogicHandler->saveNewEntity($entityInstance);
        }

        // kategorie
        $categories = [
            'article-category' => [
                ['name' => 'Zioła', 'description' => 'Opis'],
                ['name' => 'Orzechy', 'description' => 'Opis'],
                ['name' => 'Owoce', 'description' => 'Opis'],
                ['name' => 'Warzywa', 'description' => 'Opis']
            ],
            'vitamin-category' => [
                ['name' => 'Rozpuszczalne w wodzie', 'description' => 'Opis'],
                ['name' => 'Rozpuszczalne w tłuszczach', 'description' => 'Opis']
            ],
            'mineral-category' => [
                ['name' => 'Makroelementy', 'description' => 'Opis'],
                ['name' => 'Mikroelementy', 'description' => 'Opis']
            ],
            'fatty-acid-category' => [
                ['name' => 'Nasycone', 'description' => 'Opis'],
                ['name' => 'Jednonienasycone', 'description' => 'Opis'],
                ['name' => 'Wielonienasycone', 'description' => 'Opis']
            ],
            'fiber-category' => [
                ['name' => 'Rozpuszczalny', 'description' => 'Opis'],
                ['name' => 'Nierozpuszczalny', 'description' => 'Opis']
            ],
            'polyphenol-category' => [
                ['name' => 'Flawonoidy', 'description' => 'Opis'],
                ['name' => 'Kwasy fenolowe', 'description' => 'Opis'],
                ['name' => 'Stilbeny', 'description' => 'Opis'],
                ['name' => 'Taniny', 'description' => 'Opis']
            ],
            'terpene-category' => [
                ['name' => 'Monoterpeny', 'description' => 'Opis'],
                ['name' => 'Seskwiterpeny', 'description' => 'Opis'],
                ['name' => 'Diterpeny', 'description' => 'Opis']
            ],
            'amino-acid-category' => [
                ['name' => 'Egzogenny ', 'description' => 'Opis'],
                ['name' => 'Endogenny', 'description' => 'Opis']
            ],
            'enzyme-category' => [
                ['name' => 'Trawienny', 'description' => 'Opis'],
                ['name' => 'Metaboliczny', 'description' => 'Opis']
            ],
        ];

        foreach ($categories as $entityType => $categoryData) {

            foreach ($categoryData as $data) {

                $entityInstance = $this->entityLogicHandler->createEntityInstance($entityType);
                $entityInstance->setName($data['name']);
                $entityInstance->setDescription($data['description']);

                $this->entityLogicHandler->saveNewEntity($entityInstance);
            }

        }

        // skladniki odzywcze
        $nutrients = [
            'vitamin' => [
                ['name' => 'Witamina A', 'description' => 'Poprawia wzrok, wspomaga odporność', 'categoryName' => 'Rozpuszczalne w tłuszczach'],
                ['name' => 'Witamina D', 'description' => 'Wspiera zdrowie kości, reguluje wapń', 'categoryName' => 'Rozpuszczalne w tłuszczach'],
                ['name' => 'Witamina E', 'description' => 'Silny antyoksydant, chroni komórki', 'categoryName' => 'Rozpuszczalne w tłuszczach'],
                ['name' => 'Witamina K', 'description' => 'Odpowiada za krzepnięcie krwi', 'categoryName' => 'Rozpuszczalne w tłuszczach'],
                ['name' => 'Witamina C', 'description' => 'Antyoksydant, wspiera odporność', 'categoryName' => 'Rozpuszczalne w wodzie'],
                ['name' => 'Witamina B1 (Tiamina)', 'description' => 'Wspiera układ nerwowy', 'categoryName' => 'Rozpuszczalne w wodzie'],
                ['name' => 'Witamina B2 (Ryboflawina)', 'description' => 'Wpływa na metabolizm energetyczny', 'categoryName' => 'Rozpuszczalne w wodzie'],
                ['name' => 'Witamina B3 (Niacyna)', 'description' => 'Obniża poziom cholesterolu', 'categoryName' => 'Rozpuszczalne w wodzie'],
                ['name' => 'Witamina B5 (Kwas pantotenowy)', 'description' => 'Wspiera metabolizm i gojenie ran', 'categoryName' => 'Rozpuszczalne w wodzie'],
                ['name' => 'Witamina B6 (Pirydoksyna)', 'description' => 'Reguluje pracę mózgu i produkcję hormonów', 'categoryName' => 'Rozpuszczalne w wodzie'],
                ['name' => 'Witamina B7 (Biotyna)', 'description' => 'Poprawia kondycję skóry, włosów i paznokci', 'categoryName' => 'Rozpuszczalne w wodzie'],
                ['name' => 'Witamina B9 (Kwas foliowy)', 'description' => 'Niezbędna w ciąży dla prawidłowego rozwoju płodu', 'categoryName' => 'Rozpuszczalne w wodzie'],
                ['name' => 'Witamina B12 (Kobalamina)', 'description' => 'Niezbędna dla układu nerwowego i produkcji czerwonych krwinek', 'categoryName' => 'Rozpuszczalne w wodzie']
            ],
            'mineral' => [
                ['name' => 'Wapń', 'description' => 'Budulec kości i zębów, reguluje pracę serca', 'categoryName' => 'Makroelementy'],
                ['name' => 'Fosfor', 'description' => 'Wspiera metabolizm energetyczny i zdrowie kości', 'categoryName' => 'Makroelementy'],
                ['name' => 'Magnez', 'description' => 'Reguluje funkcje mięśni i nerwów', 'categoryName' => 'Makroelementy'],
                ['name' => 'Sód', 'description' => 'Odpowiada za równowagę elektrolitową', 'categoryName' => 'Makroelementy'],
                ['name' => 'Potas', 'description' => 'Reguluje ciśnienie krwi i pracę serca', 'categoryName' => 'Makroelementy'],
                ['name' => 'Chlor', 'description' => 'Wspiera produkcję kwasu solnego w żołądku', 'categoryName' => 'Makroelementy'],
                ['name' => 'Siarka', 'description' => 'Wchodzi w skład aminokwasów i wspiera metabolizm', 'categoryName' => 'Makroelementy'],
                ['name' => 'Żelazo', 'description' => 'Niezbędne do produkcji hemoglobiny i transportu tlenu', 'categoryName' => 'Mikroelementy'],
                ['name' => 'Cynk', 'description' => 'Wzmacnia odporność i wspiera gojenie ran', 'categoryName' => 'Mikroelementy'],
                ['name' => 'Miedź', 'description' => 'Pomaga w przyswajaniu żelaza', 'categoryName' => 'Mikroelementy'],
                ['name' => 'Mangan', 'description' => 'Wspiera metabolizm i produkcję kolagenu', 'categoryName' => 'Mikroelementy'],
                ['name' => 'Jod', 'description' => 'Niezbędny do produkcji hormonów tarczycy', 'categoryName' => 'Mikroelementy'],
                ['name' => 'Selen', 'description' => 'Silny antyoksydant, wspiera układ odpornościowy', 'categoryName' => 'Mikroelementy'],
                ['name' => 'Fluor', 'description' => 'Chroni zęby przed próchnicą', 'categoryName' => 'Mikroelementy'],
                ['name' => 'Chrom', 'description' => 'Reguluje poziom cukru we krwi', 'categoryName' => 'Mikroelementy'],
                ['name' => 'Molibden', 'description' => 'Wspiera detoksykację organizmu', 'categoryName' => 'Mikroelementy']
            ],
            'fatty-acid' => [
                ['name' => 'Kwas palmitynowy', 'description' => 'Występuje w oleju palmowym i mięsie', 'categoryName' => 'Nasycone'],
                ['name' => 'Kwas oleinowy', 'description' => 'Obecny w oliwie z oliwek, zdrowy dla serca', 'categoryName' => 'Jednonienasycone'],
                ['name' => 'Kwas linolowy', 'description' => 'Niezbędny kwas tłuszczowy omega-6', 'categoryName' => 'Wielonienasycone'],
                ['name' => 'Kwas alfa-linolenowy', 'description' => 'Omega-3, wspiera zdrowie serca', 'categoryName' => 'Wielonienasycone']
            ],
            'fiber' => [
                ['name' => 'Pektyna', 'description' => 'Rozpuszczalny błonnik, obniża poziom cholesterolu', 'categoryName' => 'Rozpuszczalny'],
                ['name' => 'Beta-glukan', 'description' => 'Wzmacnia odporność, redukuje cholesterol', 'categoryName' => 'Rozpuszczalny'],
                ['name' => 'Celuloza', 'description' => 'Poprawia perystaltykę jelit', 'categoryName' => 'Nierozpuszczalny'],
                ['name' => 'Lignina', 'description' => 'Chroni przed nowotworami', 'categoryName' => 'Nierozpuszczalny']
            ],
            'polyphenol' => [
                ['name' => 'Kwercetyna', 'description' => 'Flawonoid o właściwościach przeciwzapalnych', 'categoryName' => 'Flawonoidy'],
                ['name' => 'Katechina', 'description' => 'Silny antyoksydant, obecny w zielonej herbacie', 'categoryName' => 'Flawonoidy'],
                ['name' => 'Kwas chlorogenowy', 'description' => 'Obecny w kawie, wspomaga metabolizm', 'categoryName' => 'Kwasy fenolowe'],
                ['name' => 'Resweratrol', 'description' => 'Chroni serce, obecny w czerwonym winie', 'categoryName' => 'Stilbeny'],
                ['name' => 'Tanina', 'description' => 'Działa przeciwzapalnie, występuje w herbacie', 'categoryName' => 'Taniny']
            ],
            'terpene' => [
                ['name' => 'Mentol', 'description' => 'Działa chłodząco, obecny w mięcie', 'categoryName' => 'Monoterpeny'],
                ['name' => 'Limonen', 'description' => 'Nadaje cytrusowy zapach, działa przeciwzapalnie', 'categoryName' => 'Monoterpeny'],
                ['name' => 'Humulon', 'description' => 'Obecny w chmielu, działa uspokajająco', 'categoryName' => 'Seskwiterpeny'],
                ['name' => 'Kariofilen', 'description' => 'Działa przeciwzapalnie, występuje w pieprzu', 'categoryName' => 'Seskwiterpeny'],
                ['name' => 'Retinol', 'description' => 'Aktywna forma witaminy A', 'categoryName' => 'Diterpeny']
            ],
            'amino-acid' => [
                ['name' => 'Lizyna', 'description' => 'Niezbędna dla wzrostu i regeneracji', 'categoryName' => 'Egzogenny'],
                ['name' => 'Leucyna', 'description' => 'Pomaga budować mięśnie', 'categoryName' => 'Egzogenny'],
                ['name' => 'Glicyna', 'description' => 'Wspiera produkcję kolagenu', 'categoryName' => 'Endogenny'],
                ['name' => 'Glutamina', 'description' => 'Wzmacnia odporność, wspomaga jelita', 'categoryName' => 'Endogenny']
            ],
            'enzyme' => [
                ['name' => 'Amylaza', 'description' => 'Rozkłada skrobię na cukry proste', 'categoryName' => 'Trawienny'],
                ['name' => 'Pepsyna', 'description' => 'Rozkłada białka w żołądku', 'categoryName' => 'Trawienny'],
                ['name' => 'Katalaza', 'description' => 'Chroni przed stresem oksydacyjnym', 'categoryName' => 'Metaboliczny'],
                ['name' => 'Polimeraza DNA', 'description' => 'Naprawia uszkodzenia DNA', 'categoryName' => 'Metaboliczny']
            ]
        ];

        foreach ($nutrients as $entityType => $nutrientData) {

            foreach ($nutrientData as $data) {

                $entityInstance = $this->entityLogicHandler->createEntityInstance($entityType);
                $entityInstance->setName($data['name']);
                $entityInstance->setDescription($data['description']);
                
                $entityCategory = $entityType.'-category';

                $category = $this->entityLogicHandler->getEntityByName($entityCategory, $data['categoryName']); 
                $entityInstance->setCategory($category);

                $this->entityLogicHandler->saveNewEntity($entityInstance);
            }

        }

        // artykuły
        $articles = [
            [
                'name' => 'Melisa', 
                'description' => 'Zioło o właściwościach uspokajających.', 
                'energy_value' => 44, 
                'fat' => 0.6, 
                'of_which_saturates' => 0.1, 
                'carbohydrates' => 8.0, 
                'of_which_sugars' => 0.2, 
                'protein' => 3.7, 
                'fibre' => 6.8, 
                'salt' => 0.01, 
                'categoryName' => 'Zioła', 
                'vitaminNames' => ['Witamina C'],
                'mineralNames' => ['Magnez', 'Potas'],
                'polyphenolNames' => ['Kwercetyna', 'Resweratrol'],
                'fattyAcidsNames' => ['Kwas linolowy', 'Kwas oleinowy'],
                'fiberNames' => ['Beta-glukan', 'Lignina'],
                'aminoAcidNames' => ['Leucyna'],
                'enzymeNames' => ['Trawienny'],
                'terpeneNames' => ['Limonen', 'Retinol'],
                'properties' => ['Uspokajający', 'Przeciwzapalny'],
                'advisories'  => ['Unikać w nadmiarze'],
                'usages'  => ['Herbata', 'Kąpiel'],
                'contraindications'  => ['Ciąża'],
            ],
            [
                'name' => 'Orzechy Nerkowca', 
                'description' => 'Orzechy bogate w zdrowe tłuszcze.', 
                'energy_value' => 553,
                'fat' => 44.0,
                'of_which_saturates' => 7.8,
                'carbohydrates' => 30.2,
                'of_which_sugars' => 5.9,
                'protein' => 18.2,
                'fibre' => 3.3,
                'salt' => 0.02,
                'categoryName' => 'Orzechy',
                'vitaminNames' => ['Witamina E', 'Witamina B1 (Tiamina)'],
                'mineralNames' => ['Magnez', 'Fosfor'],
                'polyphenolNames' => ['Katechina'],
                'fattyAcidsNames' => ['Kwas linolowy'],
                'fiberNames' => ['Lignina'],
                'aminoAcidNames' => ['Alanina'],
                'enzymeNames' => ['Amylaza'],
                'terpeneNames' => ['Beta-pinen'],
                'properties' => ['Przeciwutleniające', 'Regeneracyjne'],
                'advisories'  => ['Wysoka kaloryczność'],
                'usages'  => ['Przekąska', 'Smoothie'],
                'contraindications'  => ['Alergia na orzechy'],
            ],
            [
                'name' => 'Migdały',
                'description' => 'Źródło witaminy E i zdrowych tłuszczów.',
                'energy_value' => 579,
                'fat' => 49.9,
                'of_which_saturates' => 3.7,
                'carbohydrates' => 21.6,
                'of_which_sugars' => 4.8,
                'protein' => 21.2,
                'fibre' => 12.5,
                'salt' => 0.01,
                'categoryName' => 'Orzechy',
                'vitaminNames' => ['Witamina E', 'Witamina B2 (Ryboflawina)'],
                'mineralNames' => ['Magnez', 'Potas'],
                'polyphenolNames' => ['Katechina', 'Kwercetyna'],
                'fattyAcidsNames' => ['Kwas oleinowy'],
                'fiberNames' => ['Beta-glukan', 'Lignina'],
                'aminoAcidNames' => ['Leucyna'],
                'enzymeNames' => ['Amylaza'],
                'terpeneNames' => ['Pinen'],
                'properties' => ['Przeciwutleniające', 'Przeciwzapalne'],
                'advisories'  => ['Uwaga na alergie'],
                'usages'  => ['Baton energetyczny', 'Pieczenie'],
                'contraindications'  => ['Alergia na orzechy'],
            ],
            [
                'name' => 'Jabłko',
                'description' => 'Owoc bogaty w błonnik i witaminę C.',
                'energy_value' => 52,
                'fat' => 0.2,
                'of_which_saturates' => 0.0,   
                'carbohydrates' => 13.8,
                'of_which_sugars' => 10.0,
                'protein' => 0.3,
                'fibre' => 2.4,
                'salt' => 0.00,
                'categoryName' => 'Owoce',
                'vitaminNames' => ['Witamina C'],
                'mineralNames' => ['Potas', 'Wapń'],
                'polyphenolNames' => ['Kwercetyna'],
                'fattyAcidsNames' => ['Kwas linolowy'],
                'fiberNames' => ['Beta-glukan'],
                'aminoAcidNames' => [],
                'enzymeNames' => ['Amylaza'],
                'terpeneNames' => [],
                'properties' => ['Wzmacniający odporność'],
                'advisories'  => ['Dla osób z nadwrażliwością na fruktozę'],
                'usages'  => ['Surowe', 'Sok'],
                'contraindications'  => [],
            ],
            [
                'name' => 'Szpinak',
                'description' => 'Warzywo bogate w żelazo i witaminę K.',
                'energy_value' => 23,
                'fat' => 0.4,
                'of_which_saturates' => 0.1,    
                'carbohydrates' => 3.6,
                'of_which_sugars' => 0.4,
                'protein' => 2.9,
                'fibre' => 2.2,
                'salt' => 0.06,
                'categoryName' => 'Warzywa',
                'vitaminNames' => ['Witamina K', 'Witamina C'],
                'mineralNames' => ['Żelazo', 'Magnez'],
                'polyphenolNames' => ['Kwercetyna'],
                'fattyAcidsNames' => ['Kwas alfa-linolenowy'],
                'fiberNames' => ['Beta-glukan'],
                'aminoAcidNames' => ['Glutamina'],
                'enzymeNames' => ['Amylaza'],
                'terpeneNames' => [],
                'properties' => ['Odżywczy', 'Przeciwzapalny'],
                'advisories'  => ['Nie dla osób z kamieniami nerkowymi'],
                'usages'  => ['Sałatka', 'Smoothie'],
                'contraindications'  => ['Nadkwasota'],
            ],
        ];
        
        
        
        foreach ($articles as $data) {

            $entityInstance = $this->entityLogicHandler->createEntityInstance('article');
            $entityInstance->setName($data['name']);
            $entityInstance->setDescription($data['description']);
            $entityInstance->setEnergyValue($data['energy_value']);
            $entityInstance->setFat($data['fat']);
            $entityInstance->setOfWhichSaturates($data['of_which_saturates']);
            $entityInstance->setCarbohydrates($data['carbohydrates']);
            $entityInstance->setOfWhichSugars($data['of_which_sugars']);
            $entityInstance->setProtein($data['protein']);
            $entityInstance->setFibre($data['fibre']);
            $entityInstance->setSalt($data['salt']);

            $category = $this->entityLogicHandler->getEntityByName('article-category', $data['categoryName']); 
            $entityInstance->setCategory($category);

            foreach($data['vitaminNames'] as $vitaminName) {

                $vitamin = $this->entityLogicHandler->getEntityByName('vitamin', $vitaminName); 
                $entityInstance->addVitamin($vitamin);

            }

            foreach($data['mineralNames'] as $mineralName) {

                $mineral = $this->entityLogicHandler->getEntityByName('mineral', $mineralName); 
                $entityInstance->addMineral($mineral);

            }

            foreach($data['polyphenolNames'] as $polyphenolName) {

                $polyphenol = $this->entityLogicHandler->getEntityByName('polyphenol', $polyphenolName); 
                $entityInstance->addPolyphenol($polyphenol);

            }

            foreach($data['fattyAcidsNames'] as $fattyAcidName) {

                $fattyAcid = $this->entityLogicHandler->getEntityByName('fatty-acid', $fattyAcidName); 
                $entityInstance->addFattyAcid($fattyAcid);

            }

            foreach($data['fiberNames'] as $fiberName) {

                $fiber = $this->entityLogicHandler->getEntityByName('fiber', $fiberName); 
                $entityInstance->addFiber($fiber);

            }

            foreach($data['aminoAcidNames'] as $aminoAcidName) {

                $aminoAcid = $this->entityLogicHandler->getEntityByName('amino-acid', $aminoAcidName); 

                if(!is_null($aminoAcid)){
                    $entityInstance->addAminoAcid($aminoAcid);
                }

            }

            foreach($data['enzymeNames'] as $enzymeName) {

                $enzyme = $this->entityLogicHandler->getEntityByName('enzyme', $enzymeName); 
                if(!is_null($enzyme)){
                    $entityInstance->addEnzyme($enzyme);
                }

            }

            foreach($data['terpeneNames'] as $terpeneName) {

                $terpene = $this->entityLogicHandler->getEntityByName('terpene', $terpeneName); 
                if(!is_null($terpene)){
                    $entityInstance->addTerpene($terpene);
                }

            }

            foreach($data['properties'] as $propertyName) {

                $property = $this->entityLogicHandler->createEntityInstance('property');
                $property->setName($propertyName); 
                $this->entityLogicHandler->saveNewEntity($property);

                $entityInstance->addProperty($property);
                
            }

            foreach($data['advisories'] as $advisoryName) {

                $advisory = $this->entityLogicHandler->createEntityInstance('advisory');
                $advisory->setName($advisoryName); 
                $this->entityLogicHandler->saveNewEntity($advisory);
                
                $entityInstance->addAdvisory($advisory);

            }

            foreach($data['usages'] as $usageName) {

                $usage = $this->entityLogicHandler->createEntityInstance('usage');
                $usage->setName($usageName); 
                $this->entityLogicHandler->saveNewEntity($usage);
                
                $entityInstance->addUsage($usage);

            }

            foreach($data['contraindications'] as $contraindicationName) {

                $contraindication = $this->entityLogicHandler->createEntityInstance('contraindication');
                $contraindication->setName($contraindicationName); 
                $this->entityLogicHandler->saveNewEntity($contraindication);
                
                $entityInstance->addContraindication($contraindication);

            }

            $manager->persist($entityInstance);
        
            $imageFile = new File($_ENV['MOCK_IMAGE_FILE_PATH']);
            $newFilename = $this->fileUploader->upload($imageFile, 'article', $entityInstance->getId());
            $entityInstance->setImageFileName($newFilename);

            $this->entityLogicHandler->saveNewEntity($entityInstance);
        }
        
        
    }
}
