<?php

namespace App\Entity;

use App\Repository\PrecioPistaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PrecioPistaRepository::class)
 */
class PrecioPista
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Pista::class, inversedBy="preciopista", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $pista;

    /**
     * @ORM\Column(type="float")
     */
    private $precio;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPista(): ?Pista
    {
        return $this->pista;
    }

    public function setPista(Pista $pista): self
    {
        $this->pista = $pista;

        return $this;
    }

    public function getPrecio(): ?float
    {
        return $this->precio;
    }

    public function setPrecio(float $precio): self
    {
        $this->precio = $precio;

        return $this;
    }
}
