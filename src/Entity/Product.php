<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ProductRepository;
use Carbon\Carbon;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Serializer\Annotation\Context;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\NotBlank;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
#[ApiResource(
    denormalizationContext: [
        'groups' => ['product:input'],
    ],
    normalizationContext: [
        'groups' => ['product:output'],
    ],
)]
#[UniqueEntity(fields: ["name"])]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(["product:output", "product:input", "person:output", "entity:output"])]
    private $id;

    #[NotBlank]
    #[ORM\Column(type: 'string', length: 80)]
    #[Groups(["product:output", "product:input", "person:output", "entity:output"])]
    private $name;

    #[ORM\Column(type: 'datetime', nullable: true)]
    #[Groups(["product:output", "product:input"])]
    #[Context([DateTimeNormalizer::FORMAT_KEY => 'd-m-Y'])]
    private $birthDate;

    #[ORM\Column(type: 'datetime', nullable: true)]
    #[Groups(["product:output", "product:input"])]
    #[Context([DateTimeNormalizer::FORMAT_KEY => 'd-m-Y'])]
    private $deathDate;

    #[ORM\Column(type: 'string', length: 2047, nullable: true)]
    #[Groups(["product:output", "product:input", "person:output", "entity:output"])]
    private $imageUrl;

    #[ORM\Column(type: 'string', length: 2047, nullable: true)]
    #[Groups(["product:output", "product:input"])]
    private $wikiUrl;

    #[ORM\ManyToMany(targetEntity: Entity::class, inversedBy: 'products')]
    #[Groups(["product:output", "product:input"])]
    private $entities;

    #[ORM\ManyToMany(targetEntity: Person::class, inversedBy: 'products')]
    #[Groups(["product:output", "product:input"])]
    private $persons;

    public function __construct()
    {
        $this->entities = new ArrayCollection();
        $this->persons = new ArrayCollection();
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
     * @return Collection<int, Entity>
     */
    public function getEntities(): Collection
    {
        return $this->entities;
    }

    public function addEntity(Entity $entity): self
    {
        if (!$this->entities->contains($entity)) {
            $this->entities[] = $entity;
        }

        return $this;
    }

    public function removeEntity(Entity $entity): self
    {
        $this->entities->removeElement($entity);

        return $this;
    }

    /**
     * @return Collection<int, Person>
     */
    public function getPersons(): Collection
    {
        return $this->persons;
    }

    public function addPerson(Person $person): self
    {
        if (!$this->persons->contains($person)) {
            $this->persons[] = $person;
        }

        return $this;
    }

    public function removePerson(Person $person): self
    {
        $this->persons->removeElement($person);

        return $this;
    }
}
