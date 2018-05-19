<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BeersRepository")
 */
class Beers
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(name="cat_id_id",type="integer", nullable=true)
     */
    private $cat_id;

    /**
     * @ORM\Column(name="style_id_id",type="integer", nullable=true)
     */
    private $style_id;

    /**
     * @ORM\Column(type="decimal", precision=50, scale=5, nullable=true)
     */
    private $abv;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=3, nullable=true)
     */
    private $ibu;

    /**
     * @ORM\Column(type="decimal", precision=20, scale=5, nullable=true)
     */
    private $srm;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $upc;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $filepath;

    /**
     * @ORM\Column(type="string", length=5000, nullable=true)
     */
    private $descript;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $add_user;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $last_mod;

    public function getId()
    {
        return $this->id;
    }

    public function getBreweryId(): ?breweries
    {
        return $this->brewery_id;
    }

    public function setBreweryId(?breweries $brewery_id): self
    {
        $this->brewery_id = $brewery_id;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCatId(): ?categories
    {
        return $this->cat_id;
    }

    public function setCatId(?categories $cat_id): self
    {
        $this->cat_id = $cat_id;

        return $this;
    }

    public function getStyleId(): ?styles
    {
        return $this->style_id;
    }

    public function setStyleId(?styles $style_id): self
    {
        $this->style_id = $style_id;

        return $this;
    }

    public function getAbv()
    {
        return $this->abv;
    }

    public function setAbv($abv): self
    {
        $this->abv = $abv;

        return $this;
    }

    public function getIbu()
    {
        return $this->ibu;
    }

    public function setIbu($ibu): self
    {
        $this->ibu = $ibu;

        return $this;
    }

    public function getSrm()
    {
        return $this->srm;
    }

    public function setSrm($srm): self
    {
        $this->srm = $srm;

        return $this;
    }

    public function getUpc(): ?int
    {
        return $this->upc;
    }

    public function setUpc(?int $upc): self
    {
        $this->upc = $upc;

        return $this;
    }

    public function getFilepath(): ?string
    {
        return $this->filepath;
    }

    public function setFilepath(?string $filepath): self
    {
        $this->filepath = $filepath;

        return $this;
    }

    public function getDescript(): ?string
    {
        return $this->descript;
    }

    public function setDescript(?string $descript): self
    {
        $this->descript = $descript;

        return $this;
    }

    public function getAddUser(): ?int
    {
        return $this->add_user;
    }

    public function setAddUser(?int $add_user): self
    {
        $this->add_user = $add_user;

        return $this;
    }

    public function getLastMod(): ?string
    {
        return $this->last_mod;
    }

    public function setLastMod(?string $last_mod): self
    {
        $this->last_mod = $last_mod;

        return $this;
    }
}
