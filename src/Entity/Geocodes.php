<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GeocodesRepository")
 */
class Geocodes
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="brewery_id_id",type="integer", nullable=true)
     */
    private $brewery_id;

    /**
     * @ORM\Column(type="decimal", precision=50, scale=20, nullable=true)
     */
    private $latitude;

    /**
     * @ORM\Column(type="decimal", precision=50, scale=20, nullable=true)
     */
    private $longitude;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $accuracy;

    public function getId()
    {
        return $this->id;
    }

    public function getBreweryId()
    {
        return $this->brewery_id;
    }

    public function setBreweryId(?breweries $brewery_id): self
    {
        $this->brewery_id = $brewery_id;

        return $this;
    }

    public function getLatitude()
    {
        return $this->latitude;
    }

    public function setLatitude($latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude()
    {
        return $this->longitude;
    }

    public function setLongitude($longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getAccuracy(): ?string
    {
        return $this->accuracy;
    }

    public function setAccuracy(?string $accuracy): self
    {
        $this->accuracy = $accuracy;

        return $this;
    }
}
