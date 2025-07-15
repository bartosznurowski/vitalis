<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Doctrine\UuidGenerator;
use Ramsey\Uuid\UuidInterface;
use Symfony\Component\String\Slugger\SluggerInterface;

#[ORM\Entity(repositoryClass: ArticleRepository::class)]
class Article
{
    #[ORM\Id]
    #[ORM\Column(type: "uuid", unique: true)]
    #[ORM\GeneratedValue(strategy: "CUSTOM")]
    #[ORM\CustomIdGenerator(class: UuidGenerator::class)]
    protected ?UuidInterface $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    /**
     * @var Collection<string, Vitamin>
     */
    #[ORM\ManyToMany(targetEntity: Vitamin::class)]
    private Collection $vitamins;

    /**
     * @var Collection<string, Mineral>
     */
    #[ORM\ManyToMany(targetEntity: Mineral::class)]
    private Collection $minerals;

    /**
     * @var Collection<string, Property>
     */
    #[ORM\ManyToMany(targetEntity: Property::class)]
    private Collection $properties;

    #[ORM\Column]
    private ?int $energy_value = null;

    #[ORM\Column]
    private ?float $fat = null;

    #[ORM\Column]
    private ?float $of_which_saturates = null;

    #[ORM\Column]
    private ?float $carbohydrates = null;

    #[ORM\Column]
    private ?float $of_which_sugars = null;

    #[ORM\Column]
    private ?float $protein = null;

    #[ORM\Column]
    private ?float $fibre = null;

    #[ORM\Column]
    private ?float $salt = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column(length: 1024)]
    private ?string $image_file_name = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?ArticleCategory $category = null;

    /**
     * @var Collection<int, Polyphenol>
     */
    #[ORM\ManyToMany(targetEntity: Polyphenol::class)]
    private Collection $polyphenols;

    /**
     * @var Collection<int, FattyAcid>
     */
    #[ORM\ManyToMany(targetEntity: FattyAcid::class)]
    private Collection $fatty_acids;

    /**
     * @var Collection<int, Fiber>
     */
    #[ORM\ManyToMany(targetEntity: Fiber::class)]
    private Collection $fibers;

    /**
     * @var Collection<int, AminoAcid>
     */
    #[ORM\ManyToMany(targetEntity: AminoAcid::class)]
    private Collection $amino_acids;

    /**
     * @var Collection<int, Enzyme>
     */
    #[ORM\ManyToMany(targetEntity: Enzyme::class)]
    private Collection $enzymes;

    /**
     * @var Collection<int, Terpene>
     */
    #[ORM\ManyToMany(targetEntity: Terpene::class)]
    private Collection $terpenes;

    /**
     * @var Collection<int, Advisory>
     */
    #[ORM\ManyToMany(targetEntity: Advisory::class)]
    private Collection $advisories;

    /**
     * @var Collection<int, Usage>
     */
    #[ORM\ManyToMany(targetEntity: Usage::class)]
    private Collection $usages;

    /**
     * @var Collection<int, Contraindication>
     */
    #[ORM\ManyToMany(targetEntity: Contraindication::class)]
    private Collection $contraindications;

    #[ORM\Column(type: 'string', length: 255, unique: true)]
    private string $slug;

    public function __construct()
    {
        $this->vitamins = new ArrayCollection();
        $this->minerals = new ArrayCollection();
        $this->properties = new ArrayCollection();
        $this->polyphenols = new ArrayCollection();
        $this->fatty_acids = new ArrayCollection();
        $this->fibers = new ArrayCollection();
        $this->amino_acids = new ArrayCollection();
        $this->enzymes = new ArrayCollection();
        $this->terpenes = new ArrayCollection();
        $this->advisories = new ArrayCollection();
        $this->usages = new ArrayCollection();
        $this->contraindications = new ArrayCollection();
    }

    public function getId(): ?UuidInterface
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<string, Vitamin>
     */
    public function getVitamins(): Collection
    {
        return $this->vitamins;
    }

    public function addVitamin(Vitamin $vitamin): static
    {
        if (!$this->vitamins->contains($vitamin)) {
            $this->vitamins->add($vitamin);
        }

        return $this;
    }

    public function removeVitamin(Vitamin $vitamin): static
    {
        $this->vitamins->removeElement($vitamin);

        return $this;
    }

    /**
     * @return Collection<string, Mineral>
     */
    public function getMinerals(): Collection
    {
        return $this->minerals;
    }

    public function addMineral(Mineral $mineral): static
    {
        if (!$this->minerals->contains($mineral)) {
            $this->minerals->add($mineral);
        }

        return $this;
    }

    public function removeMineral(Mineral $mineral): static
    {
        $this->minerals->removeElement($mineral);

        return $this;
    }

    /**
     * @return Collection<string, Property>
     */
    public function getProperties(): Collection
    {
        return $this->properties;
    }

    public function addProperty(Property $property): static
    {
        if (!$this->properties->contains($property)) {
            $this->properties->add($property);
        }

        return $this;
    }

    public function removeProperty(Property $property): static
    {
        $this->properties->removeElement($property);

        return $this;
    }

    public function getEnergyValue(): ?int
    {
        return $this->energy_value;
    }

    public function setEnergyValue(int $energy_value): static
    {
        $this->energy_value = $energy_value;

        return $this;
    }

    public function getFat(): ?float
    {
        return $this->fat;
    }

    public function setFat(float $fat): static
    {
        $this->fat = $fat;

        return $this;
    }

    public function getOfWhichSaturates(): ?float
    {
        return $this->of_which_saturates;
    }

    public function setOfWhichSaturates(float $of_which_saturates): static
    {
        $this->of_which_saturates = $of_which_saturates;

        return $this;
    }

    public function getCarbohydrates(): ?float
    {
        return $this->carbohydrates;
    }

    public function setCarbohydrates(float $carbohydrates): static
    {
        $this->carbohydrates = $carbohydrates;

        return $this;
    }

    public function getOfWhichSugars(): ?float
    {
        return $this->of_which_sugars;
    }

    public function setOfWhichSugars(float $of_which_sugars): static
    {
        $this->of_which_sugars = $of_which_sugars;

        return $this;
    }

    public function getProtein(): ?float
    {
        return $this->protein;
    }

    public function setProtein(float $protein): static
    {
        $this->protein = $protein;

        return $this;
    }

    public function getFibre(): ?float
    {
        return $this->fibre;
    }

    public function setFibre(float $fibre): static
    {
        $this->fibre = $fibre;

        return $this;
    }

    public function getSalt(): ?float
    {
        return $this->salt;
    }

    public function setSalt(float $salt): static
    {
        $this->salt = $salt;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getImageFileName(): ?string
    {
        return $this->image_file_name;
    }

    public function setImageFileName(string $image_file_name): static
    {
        $this->image_file_name = $image_file_name;

        return $this;
    }

    public function getCategory(): ?ArticleCategory
    {
        return $this->category;
    }

    public function setCategory(?ArticleCategory $category): static
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection<int, Polyphenol>
     */
    public function getPolyphenols(): Collection
    {
        return $this->polyphenols;
    }

    public function addPolyphenol(Polyphenol $polyphenol): static
    {
        if (!$this->polyphenols->contains($polyphenol)) {
            $this->polyphenols->add($polyphenol);
        }

        return $this;
    }

    public function removePolyphenol(Polyphenol $polyphenol): static
    {
        $this->polyphenols->removeElement($polyphenol);

        return $this;
    }

    /**
     * @return Collection<int, FattyAcid>
     */
    public function getFattyAcids(): Collection
    {
        return $this->fatty_acids;
    }

    public function addFattyAcid(FattyAcid $fattyAcid): static
    {
        if (!$this->fatty_acids->contains($fattyAcid)) {
            $this->fatty_acids->add($fattyAcid);
        }

        return $this;
    }

    public function removeFattyAcid(FattyAcid $fattyAcid): static
    {
        $this->fatty_acids->removeElement($fattyAcid);

        return $this;
    }

    /**
     * @return Collection<int, Fiber>
     */
    public function getFibers(): Collection
    {
        return $this->fibers;
    }

    public function addFiber(Fiber $fiber): static
    {
        if (!$this->fibers->contains($fiber)) {
            $this->fibers->add($fiber);
        }

        return $this;
    }

    public function removeFiber(Fiber $fiber): static
    {
        $this->fibers->removeElement($fiber);

        return $this;
    }

    /**
     * @return Collection<int, AminoAcid>
     */
    public function getAminoAcids(): Collection
    {
        return $this->amino_acids;
    }

    public function addAminoAcid(AminoAcid $aminoAcid): static
    {
        if (!$this->amino_acids->contains($aminoAcid)) {
            $this->amino_acids->add($aminoAcid);
        }

        return $this;
    }

    public function removeAminoAcid(AminoAcid $aminoAcid): static
    {
        $this->amino_acids->removeElement($aminoAcid);

        return $this;
    }

    /**
     * @return Collection<int, Enzyme>
     */
    public function getEnzymes(): Collection
    {
        return $this->enzymes;
    }

    public function addEnzyme(Enzyme $enzyme): static
    {
        if (!$this->enzymes->contains($enzyme)) {
            $this->enzymes->add($enzyme);
        }

        return $this;
    }

    public function removeEnzyme(Enzyme $enzyme): static
    {
        $this->enzymes->removeElement($enzyme);

        return $this;
    }

    /**
     * @return Collection<int, Terpene>
     */
    public function getTerpenes(): Collection
    {
        return $this->terpenes;
    }

    public function addTerpene(Terpene $terpene): static
    {
        if (!$this->terpenes->contains($terpene)) {
            $this->terpenes->add($terpene);
        }

        return $this;
    }

    public function removeTerpene(Terpene $terpene): static
    {
        $this->terpenes->removeElement($terpene);

        return $this;
    }

    /**
     * @return Collection<int, Advisory>
     */
    public function getAdvisories(): Collection
    {
        return $this->advisories;
    }

    public function addAdvisory(Advisory $advisory): static
    {
        if (!$this->advisories->contains($advisory)) {
            $this->advisories->add($advisory);
        }

        return $this;
    }

    public function removeAdvisory(Advisory $advisory): static
    {
        $this->advisories->removeElement($advisory);

        return $this;
    }

    /**
     * @return Collection<int, Usage>
     */
    public function getUsages(): Collection
    {
        return $this->usages;
    }

    public function addUsage(Usage $usage): static
    {
        if (!$this->usages->contains($usage)) {
            $this->usages->add($usage);
        }

        return $this;
    }

    public function removeUsage(Usage $usage): static
    {
        $this->usages->removeElement($usage);

        return $this;
    }

    /**
     * @return Collection<int, Contraindication>
     */
    public function getContraindications(): Collection
    {
        return $this->contraindications;
    }

    public function addContraindication(Contraindication $contraindication): static
    {
        if (!$this->contraindications->contains($contraindication)) {
            $this->contraindications->add($contraindication);
        }

        return $this;
    }

    public function removeContraindication(Contraindication $contraindication): static
    {
        $this->contraindications->removeElement($contraindication);

        return $this;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;
        return $this;
    }

    public function generateSlug(SluggerInterface $slugger): void
    {
        $this->slug = strtolower($slugger->slug($this->name)->toString());
    }

}
