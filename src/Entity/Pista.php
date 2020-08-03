<?php

namespace App\Entity;

use App\Repository\PistaRepository;
use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PistaRepository::class)
 */
class Pista
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
     * @ORM\Column(type="datetime")
     */
    private $fechacreacion;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $imagen;

    /**
     * @ORM\ManyToOne(targetEntity=Deporte::class, inversedBy="pistas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $deporte;

    /**
     * @ORM\ManyToOne(targetEntity=Tipo::class, inversedBy="pistas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $tipo;

    /**
     * @ORM\ManyToOne(targetEntity=Club::class, inversedBy="pista")
     */
    private $club;

    /**
     * @ORM\OneToOne(targetEntity=PrecioPista::class, mappedBy="pista", cascade={"persist", "remove"})
     */
    private $preciopista;

    public function __construct()
    {
        $this->setFechacreacion(new DateTime());
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

    public function setFechacreacion(\DateTimeInterface $fechacreacion): self
    {
        $this->fechacreacion = $fechacreacion;

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

    public function getDeporte(): ?Deporte
    {
        return $this->deporte;
    }

    public function setDeporte(?Deporte $deporte): self
    {
        $this->deporte = $deporte;

        return $this;
    }

    public function getTipo(): ?Tipo
    {
        return $this->tipo;
    }

    public function setTipo(?Tipo $tipo): self
    {
        $this->tipo = $tipo;

        return $this;
    }

    public function getClub(): ?Club
    {
        return $this->club;
    }

    public function setClub(?Club $club): self
    {
        $this->club = $club;

        return $this;
    }

    public function getPreciopista(): ?PrecioPista
    {
        return $this->preciopista;
    }

    public function setPreciopista(PrecioPista $preciopista): self
    {
        $this->preciopista = $preciopista;

        // set the owning side of the relation if necessary
        if ($preciopista->getPista() !== $this) {
            $preciopista->setPista($this);
        }

        return $this;
    }
}
