<?php

namespace App\Entity;

use App\Repository\SalesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SalesRepository::class)]
class Sales
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $prev_price = null;

    #[ORM\Column(length: 255)]
    private ?string $final_price = null;

    #[ORM\Column]
    private ?int $uid = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrevPrice(): ?string
    {
        return $this->prev_price;
    }

    public function setPrevPrice(string $prev_price): self
    {
        $this->prev_price = $prev_price;

        return $this;
    }

    public function getFinalPrice(): ?string
    {
        return $this->final_price;
    }

    public function setFinalPrice(string $final_price): self
    {
        $this->final_price = $final_price;

        return $this;
    }

    public function getUid(): ?int
    {
        return $this->uid;
    }

    public function setUid(int $uid): self
    {
        $this->uid = $uid;

        return $this;
    }
}
