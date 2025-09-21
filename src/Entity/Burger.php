<?php

namespace App\Entity;

use App\Repository\BurgerRepository;
use Doctrine\ORM\Mapping as ORM;
use JetBrains\PhpStorm\ObjectShape;

#[ORM\Entity(repositoryClass: BurgerRepository::class)]
class Burger
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 160)]
    private ?string $name = null;

    #[ORM\Column]
    private ?float $price = null;

    #[ORM\ManyToOne(targetEntity: Pain::class)]
    private $pain;

    #[ORM\ManyToMany(targetEntity: Oignon::class, mappedBy: 'burger')]
    private $oignon;

    #[ORM\ManyToMany(targetEntity: Sauce::class, mappedBy: 'burger')]
    private $sauce;

    #[ORM\OneToOne]
    private ?Image $image;

    #[ORM\OneToMany(targetEntity: Commentaire::class, mappedBy: 'burger')]
    public function getId(): ?int
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

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): static
    {
        $this->price = $price;

        return $this;
    }

}
