<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 190)]
    private ?string $name = null;

    #[ORM\Column(nullable: true)]
    private ?int $parent_id = null;

    #[ORM\Column(length: 255)]
    private ?string $categPicture = null;

    #[ORM\Column(length: 5)]
    private ?int $isActive = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): ?self
    {
        $this->id = $id;
        return $this;
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

    public function getParentId(): ?int
    {
        return $this->parent_id;
    }

    public function setParentId(?int $parent_id): self
    {
        $this->parent_id = $parent_id;

        return $this;
    }

    public function getCategPicture(): ?string
    {
        return $this->categPicture;
    }

    public function setCategPicture(string $categPicture): self
    {
        $this->categPicture = $categPicture;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getIsActive(): ?string
    {
        return $this->isActive;
    }

    /**
     * @param string|null $isActive
     */
    public function setIsActive(?string $isActive): void
    {
        $this->isActive = $isActive;
    }
}
