<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\EntityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints\NotBlank;

#[ORM\Entity(repositoryClass: EntityRepository::class)]
#[ApiResource]
#[UniqueEntity(fields: ["name"])]
class Entity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[NotBlank]
    #[ORM\Column(type: 'string', length: 80)]
    private $name;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $birthDate;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $deathDate;

    #[ORM\Column(type: 'string', length: 2047, nullable: true)]
    private $imageUrl;

    #[ORM\Column(type: 'string', length: 2047, nullable: true)]
    private $wikiUrl;

    #[ORM\ManyToMany(targetEntity: Product::class, mappedBy: 'entities')]
    private $products;

    #[ORM\OneToMany(mappedBy: 'entity', targetEntity: Person::class)]
    private $persons;

    public function __construct()
    {
        $this->products = new ArrayCollection();
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
            $product->addEntity($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        if ($this->products->removeElement($product)) {
            $product->removeEntity($this);
        }

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
            $person->setEntity($this);
        }

        return $this;
    }

    public function removePerson(Person $person): self
    {
        if ($this->persons->removeElement($person)) {
            // set the owning side to null (unless already changed)
            if ($person->getEntity() === $this) {
                $person->setEntity(null);
            }
        }

        return $this;
    }
}
