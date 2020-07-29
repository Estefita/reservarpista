<?php

namespace App\Entity;

use App\Repository\ReservaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReservaRepository::class)
 */
class Reserva
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $idclub;

    /**
     * @ORM\Column(type="time")
     */
    private $horadesde;

    /**
     * @ORM\Column(type="time")
     */
    private $horahasta;

    /**
     * @ORM\Column(type="date")
     */
    private $fechareserva;

    /**
     * @ORM\Column(type="integer")
     */
    private $idpista;

    /**
     * @ORM\Column(type="integer")
     */
    private $idusuario;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $estado;

    /**
     * @ORM\Column(type="float")
     */
    private $precio;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdclub(): ?int
    {
        return $this->idclub;
    }

    public function setIdclub(int $idclub): self
    {
        $this->idclub = $idclub;

        return $this;
    }

    public function getHoradesde(): ?\DateTimeInterface
    {
        return $this->horadesde;
    }

    public function setHoradesde(\DateTimeInterface $horadesde): self
    {
        $this->horadesde = $horadesde;

        return $this;
    }

    public function getHorahasta(): ?\DateTimeInterface
    {
        return $this->horahasta;
    }

    public function setHorahasta(\DateTimeInterface $horahasta): self
    {
        $this->horahasta = $horahasta;

        return $this;
    }

    public function getFechareserva(): ?\DateTimeInterface
    {
        return $this->fechareserva;
    }

    public function setFechareserva(\DateTimeInterface $fechareserva): self
    {
        $this->fechareserva = $fechareserva;

        return $this;
    }

    public function getIdpista(): ?int
    {
        return $this->idpista;
    }

    public function setIdpista(int $idpista): self
    {
        $this->idpista = $idpista;

        return $this;
    }

    public function getIdusuario(): ?int
    {
        return $this->idusuario;
    }

    public function setIdusuario(int $idusuario): self
    {
        $this->idusuario = $idusuario;

        return $this;
    }

    public function getEstado(): ?int
    {
        return $this->estado;
    }

    public function setEstado(?int $estado): self
    {
        $this->estado = $estado;

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
