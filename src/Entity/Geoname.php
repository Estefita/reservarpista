<?php

namespace App\Entity;

use App\Repository\GeonameRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GeonameRepository::class)
 */
class Geoname
{
   
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $geonameid;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private $asciiname;

    /**
     * @ORM\Column(type="string", length=10000, nullable=true)
     */
    private $alternatenames;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0, nullable=true)
     */
    private $latitude;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0, nullable=true)
     */
    private $longitude;

    /**
     * @ORM\Column(type="string", length=1, nullable=true)
     */
    private $featureclass;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $featurecode;

    /**
     * @ORM\Column(type="string", length=2, nullable=true)
     */
    private $countrycode;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private $cc2;

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
    private $population;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $elevation;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $dem;

    /**
     * @ORM\Column(type="string", length=40, nullable=true)
     */
    private $timezone;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $modificationdate;

    public function getId(): ?int
    {
        return $this->geonameid;
    }

    public function setId(int $id): self
    {
        $this->geonameid = $id;
        return $this;
    }

    public function getGeonameid(): ?int
    {
        return $this->geonameid;
    }

    public function setGeonameid(int $geonameid): self
    {
        $this->geonameid = $geonameid;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getAsciiname(): ?string
    {
        return $this->asciiname;
    }

    public function setAsciiname(string $asciiname): self
    {
        $this->asciiname = $asciiname;

        return $this;
    }

    public function getAlternatenames(): ?string
    {
        return $this->alternatenames;
    }

    public function setAlternatenames(?string $alternatenames): self
    {
        $this->alternatenames = $alternatenames;

        return $this;
    }

    public function getLatitude(): ?string
    {
        return $this->latitude;
    }

    public function setLatitude(?string $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude(): ?string
    {
        return $this->longitude;
    }

    public function setLongitude(?string $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getFeatureclass(): ?string
    {
        return $this->featureclass;
    }

    public function setFeatureclass(?string $featureclass): self
    {
        $this->featureclass = $featureclass;

        return $this;
    }

    public function getFeaturecode(): ?string
    {
        return $this->featurecode;
    }

    public function setFeaturecode(?string $featurecode): self
    {
        $this->featurecode = $featurecode;

        return $this;
    }

    public function getCountrycode(): ?string
    {
        return $this->countrycode;
    }

    public function setCountrycode(?string $countrycode): self
    {
        $this->countrycode = $countrycode;

        return $this;
    }

    public function getCc2(): ?string
    {
        return $this->cc2;
    }

    public function setCc2(?string $cc2): self
    {
        $this->cc2 = $cc2;

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

    public function getPopulation(): ?int
    {
        return $this->population;
    }

    public function setPopulation(?int $population): self
    {
        $this->population = $population;

        return $this;
    }

    public function getElevation(): ?int
    {
        return $this->elevation;
    }

    public function setElevation(?int $elevation): self
    {
        $this->elevation = $elevation;

        return $this;
    }

    public function getDem(): ?int
    {
        return $this->dem;
    }

    public function setDem(?int $dem): self
    {
        $this->dem = $dem;

        return $this;
    }

    public function getTimezone(): ?string
    {
        return $this->timezone;
    }

    public function setTimezone(?string $timezone): self
    {
        $this->timezone = $timezone;

        return $this;
    }

    public function getModificationdate(): ?\DateTimeInterface
    {
        return $this->modificationdate;
    }

    public function setModificationdate(?\DateTimeInterface $modificationdate): self
    {
        $this->modificationdate = $modificationdate;

        return $this;
    }
}
