<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use App\Controller\GetByUsernameAction;
use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Serializer\Annotation\Context;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ApiResource(
    itemOperations: [
        'get',
        'get_by_username' => [
            'method' => 'GET',
            'controller' => GetByUsernameAction::class,
            'path' => '/users/{username}'
        ],
        'put',
        'delete',
        'patch'
    ]
)]
#[UniqueEntity(fields: ["username"])]
#[UniqueEntity(fields: ["email"])]
#[ApiFilter(SearchFilter::class, properties: ['username' => "exact"])]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[NotBlank]
    #[ORM\Column(type: 'string', length: 32)]
    private $username;

    #[ORM\Column(type: 'string', length: 60, nullable: true)]
    #[Email]
    private $email;

    #[NotBlank]
    #[ORM\Column(type: 'string', length: 60)]
    private $password;

    #[ORM\Column(type: 'integer')]
    private $role;

    #[Context([DateTimeNormalizer::FORMAT_KEY => 'd-m-Y'])]
    #[ORM\Column(type: 'datetime', nullable: true)]
    private $birthday;

    #[ORM\Column(type: 'text', nullable: true)]
    private $imageUrl;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password; //strval(password_hash($password, PASSWORD_DEFAULT));

        return $this;
    }

    public function validatePassword(string $password): bool
    {
        return password_verify($password, $this->password);
    }

    public function getRole(): ?int
    {
        return $this->role;
    }

    public function setRole(int $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->birthday;
    }

    public function setBirthday(?\DateTimeInterface $birthday): self
    {
        $this->birthday = $birthday;

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
}
