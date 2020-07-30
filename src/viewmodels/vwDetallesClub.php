<?php

namespace App\viewmodels;

class vwDetallesClub
{
    
    private $idDeporte;
    private $NombreDeporte;
    private $idPista;
    private $NombrePista;
    private $idTipoPista;
    private $TipoPistab;

    

    public function getIdDeporte(): ?int
    {
        return $this->idDeporte;
    }
    public function setIdDeporte(int $idDeporte): self
    {
        $this->idDeporte = $idDeporte;

        return $this;
    }
    

    public function getNombreDeporte(): ?string
    {
        return $this->NombreDeporte;
    }

    public function setNombreDeporte(string $NombreDeporte): self
    {
        $this->NombreDeporte;

        return $this;
    }

    public function getIdPista(): ?int
    {
        return $this->idPista;
    }
    public function setIdPista(int $idPista): self
    {
        $this->idPista = $idPista;

        return $this;
    }

    public function getNombrePista(): ?string
    {
        return $this->NombrePista;
    }

    public function setNombrePista(string $NombrePista): self
    {
        $this->NombrePista = $NombrePista;

        return $this;
    }

    public function getIdTipoPista(): ?int
    {
        return $this->idTipoPista;
    }
    public function setIdTipoPista(int $idTipoPista): self
    {
        $this->idTipoPista = $idTipoPista;

        return $this;
    }

    public function getTipoPista(): ?string
    {
        return $this->TipoPista;
    }

    public function setTipoPista(string $TipoPista): self
    {
        $this->TipoPista = $TipoPista;

        return $this;
    }

}