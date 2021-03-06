<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PersonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Serializer\Annotation\Context;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\NotBlank;

#[ORM\Entity(repositoryClass: PersonRepository::class)]
#[ApiResource(
    denormalizationContext: [
        'groups' => ['person:input'],
    ],
    normalizationContext: [
        'groups' => ['person:output'],
    ],
)]
#[UniqueEntity(fields: ["name"])]
class Person
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(["person:output", "person:input", "product:output", "entity:output"])]
    private $id;

    #[NotBlank]
    #[ORM\Column(type: 'string', length: 80)]
    #[Groups(["person:output", "person:input", "product:output", "entity:output"])]
    private $name;

    #[ORM\Column(type: 'datetime', nullable: true)]
    #[Context([DateTimeNormalizer::FORMAT_KEY => 'd-m-Y'])]
    #[Groups(["person:output", "person:input"])]
    private $birthDate;

    #[ORM\Column(type: 'datetime', nullable: true)]
    #[Context([DateTimeNormalizer::FORMAT_KEY => 'd-m-Y'])]
    #[Groups(["person:output", "person:input"])]
    private $deathDate;

    #[ORM\Column(type: 'string', length: 2047, nullable: true)]
    #[Groups(["person:output", "person:input", "product:output", "entity:output"])]
    private $imageUrl;

    #[ORM\Column(type: 'string', length: 2047, nullable: true)]
    #[Groups(["person:output", "person:input"])]
    private $wikiUrl;

    #[ORM\ManyToMany(targetEntity: Product::class, mappedBy: 'persons')]
    #[Groups(["person:output", "person:input"])]
    private $products;

    #[ORM\ManyToOne(targetEntity: Entity::class, inversedBy: 'persons')]
    #[Groups(["person:output", "person:input"])]
    private $entity;

    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->birthDate;
    }

    public function setBirthDate(?\DateTimeInterface $birthDate): self
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    public function getDeathDate(): ?\DateTimeInterface
    {
        return $this->deathDate;
    }

    public function setDeathDate(?\DateTimeInterface $deathDate): self
    {
        $this->deathDate = $deathDate;

        return $this;
    }

    public function getImageUrl(): ?string
    {
        return $this->imageUrl;
    }

    public function setImageUrl(?string $imageUrl): self
    {
        $this->imageUrl = $imageUrl;

        return $this;
    }

    public function getWikiUrl(): ?string
    {
        return $this->wikiUrl;
    }

    public function setWikiUrl(?string $wikiUrl): self
    {
        $this->wikiUrl = $wikiUrl;

        return $this;
    }

    /**
     * @return Collection<int, Product>
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProduct(Product $product): self
    {
        if (!$this->products->contains($product)) {
            $this->products[] = $product;
            $product->addPerson($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        if ($this->products->removeElement($product)) {
            $product->removePerson($this);
        }

        return $this;
    }

    public function getEntity(): ?Entity
    {
        return $this->entity;
    }

    public function setEntity(?Entity $entity): self
    {
        $this->entity = $entity;

        return $this;
    }
}
