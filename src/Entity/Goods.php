<?php

namespace App\Entity;

use App\Repository\GoodsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GoodsRepository::class)]
class Goods
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 150)]
    private ?int $sales_id = null;

    #[ORM\Column(length: 255)]
    private ?string $uid = null;

    #[ORM\Column]
    private ?int $category_id = null;

    #[ORM\Column]
    private ?int $seller_id = null;

    #[ORM\Column(nullable: true)]
    private ?int $SalesCount = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSalesId(): ?int
    {
        return $this->sales_id;
    }

    public function setSalesId(int $sales_id): self
    {
        $this->sales_id = $sales_id;

        return $this;
    }

    public function getUid(): ?string
    {
        return $this->uid;
    }

    public function setUid(string $uid): self
    {
        $this->uid = $uid;

        return $this;
    }

    public function getCategoryId(): ?int
    {
        return $this->category_id;
    }

    public function setCategoryId(int $category_id): self
    {
        $this->category_id = $category_id;

        return $this;
    }

    public function getSellerId(): ?int
    {
        return $this->seller_id;
    }

    public function setSellerId(int $seller_id): self
    {
        $this->seller_id = $seller_id;

        return $this;
    }

    public function getSalesCount(): ?int
    {
        return $this->SalesCount;
    }

    public function setSalesCount(?int $SalesCount): self
    {
        $this->SalesCount = $SalesCount;

        return $this;
    }
}
