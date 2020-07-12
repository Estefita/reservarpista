<?php

namespace App\Entity;

use App\Repository\TipoRepository;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TipoRepository::class)
 */
class Tipo
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nombre;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $fechacreacion;

    /**
     * @ORM\OneToMany(targetEntity=Pista::class, mappedBy="tipo")
     */
    private $pistas;

    public function __construct()
    {
        $this->setFechacreacion(new DateTime());
        $this->pistas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getFechacreacion(): ?\DateTimeInterface
    {
        return $this->fechacreacion;
    }

    public function setFechacreacion(?\DateTimeInterface $fechacreacion): self
    {
        $this->fechacreacion = $fechacreacion;

        return $this;
    }

    /**
     * @return Collection|Pista[]
     */
    public function getPistas(): Collection
    {
        return $this->pistas;
    }

    public function addPista(Pista $pista): self
    {
        if (!$this->pistas->contains($pista)) {
            $this->pistas[] = $pista;
            $pista->setTipo($this);
        }

        return $this;
    }

    public function removePista(Pista $pista): self
    {
        if ($this->pistas->contains($pista)) {
            $this->pistas->removeElement($pista);
            // set the owning side to null (unless already changed)
            if ($pista->getTipo() === $this) {
                $pista->setTipo(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getNombre();
    }
}
