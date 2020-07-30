<?php

namespace App\Entity;

use App\Repository\ClubRepository;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClubRepository::class)
 */
class Club
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
    private $nomres;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nomclub;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $direccion;

    /**
     * @ORM\Column(type="integer")
     */
    private $telefono;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $web;

     /**
     * @ORM\Column(type="string", length=200, nullable=true)
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
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="clubs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fechacreacion;

    /**
     * @ORM\OneToMany(targetEntity=Pista::class, mappedBy="club")
     */
    private $pista;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $descripcion;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $imagen;

    public function __construct()
    {
        $this->fechacreacion = new DateTime();
        $this->pista = new ArrayCollection(); 
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomres(): ?string
    {
        return $this->nomres;
    }

    public function setNomres(string $nomres): self
    {
        $this->nomres = $nomres;

        return $this;
    }

    public function getNomclub(): ?string
    {
        return $this->nomclub;
    }

    public function setNomclub(string $nomclub): self
    {
        $this->nomclub = $nomclub;

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

    public function getWeb(): ?string
    {
        return $this->web;
    }

    public function setWeb(string $web): self
    {
        $this->web = $web;

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

    /**
     * @return Collection|Pista[]
     */
    public function getPista()
    {
        return $this->pista;
    }

    public function addPistum(Pista $pistum): self
    {
        if (!$this->pista->contains($pistum)) {
            $this->pista[] = $pistum;
            $pistum->setClub($this);
        }

        return $this;
    }

    public function removePistum(Pista $pistum): self
    {
        if ($this->pista->contains($pistum)) {
            $this->pista->removeElement($pistum);
            // set the owning side to null (unless already changed)
            if ($pistum->getClub() === $this) {
                $pistum->setClub(null);
            }
        }

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(?string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getAvatarUrl(int $size = null): string
    {
        $url = 'https://robohash.org/'.$this->getNomres();

        if ($size) {
            $url .= sprintf('?size=%dx%d', $size, $size);
        }
        return $url;
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

}
