<?php

namespace App\Entity;

use App\Repository\JugadorRepository;
use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=JugadorRepository::class)
 */
class Jugador
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=80)
     */
    private $apellidos;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $direccion;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $admin1code;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $admin2code;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $admin3code;

    /**
     * @ORM\Column(type="integer")
     */
    private $telefono;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="jugadors")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fechacreacion;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nombre;

   public function __construct()
   {
       $this->setFechacreacion(new DateTime());
   }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getApellidos(): ?string
    {
        return $this->apellidos;
    }

    public function setApellidos(string $apellidos): self
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    public function getDireccion(): ?string
    {
        return $this->direccion;
    }

    public function setDireccion(string $direccion): self
    {
        $this->direccion = $direccion;

        return $this;
    }

    public function getTelefono(): ?int
    {
        return $this->telefono;
    }

    public function setTelefono(int $telefono): self
    {
        $this->telefono = $telefono;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

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

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getAdmin1code(): ?string
    {
        return $this->admin1code;
    }

    public function setAdmin1code(?string $admin1code): self
    {
        $this->admin1code = $admin1code;

        return $this;
    }

    public function getAdmin2code(): ?string
    {
        return $this->admin2code;
    }

    public function setAdmin2code(string $admin2code): self
    {
        $this->admin2code = $admin2code;

        return $this;
    }

    public function getAdmin3code(): ?string
    {
        return $this->admin3code;
    }

    public function setAdmin3code(string $admin3code): self
    {
        $this->admin3code = $admin3code;

        return $this;
    }

}
