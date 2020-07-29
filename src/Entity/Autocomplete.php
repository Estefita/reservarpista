<?php

namespace App\Entity;

use App\Repository\AutocompleteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AutocompleteRepository::class)
 */
class Autocomplete
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=600)
     */
    private $textobusqueda;

    /**
     * @ORM\Column(type="string", length=2)
     */
    private $tipo;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $admin1code;

    /**
     * @ORM\Column(type="string", length=80, nullable=true)
     */
    private $admin2code;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $admin3code;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $admin4code;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $idclub;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTextobusqueda(): ?string
    {
        return $this->textobusqueda;
    }

    public function setTextobusqueda(string $textobusqueda): self
    {
        $this->textobusqueda = $textobusqueda;

        return $this;
    }

    public function getTipo(): ?string
    {
        return $this->tipo;
    }

    public function setTipo(string $tipo): self
    {
        $this->tipo = $tipo;

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

    public function setAdmin2code(?string $admin2code): self
    {
        $this->admin2code = $admin2code;

        return $this;
    }

    public function getAdmin3code(): ?string
    {
        return $this->admin3code;
    }

    public function setAdmin3code(?string $admin3code): self
    {
        $this->admin3code = $admin3code;

        return $this;
    }

    public function getAdmin4code(): ?string
    {
        return $this->admin4code;
    }

    public function setAdmin4code(?string $admin4code): self
    {
        $this->admin4code = $admin4code;

        return $this;
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
}
