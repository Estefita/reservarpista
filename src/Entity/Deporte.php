<?php

namespace App\Entity;

use App\Repository\DeporteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DeporteRepository::class)
 */
class Deporte
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
     * @ORM\Column(type="text", nullable=true)
     */
    private $imagen;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $fechacreacion;

    /**
     * @ORM\OneToMany(targetEntity=Pista::class, mappedBy="deporte")
     */
    private $pistas;

    public function __construct()
    {
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

    public function getImagen(): ?string
    {
        return $this->imagen;
    }

    public function setImagen(?string $imagen): self
    {
        $this->imagen = $imagen;

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
            $pista->setDeporte($this);
        }

        return $this;
    }

    public function removePista(Pista $pista): self
    {
        if ($this->pistas->contains($pista)) {
            $this->pistas->removeElement($pista);
            // set the owning side to null (unless already changed)
            if ($pista->getDeporte() === $this) {
                $pista->setDeporte(null);
            }
        }

        return $this;
    }
}
