<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StylesRepository")
 */
class styles
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="categories", inversedBy="styles")
     */
    private $cat_id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $style_name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $last_mod;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Beers", mappedBy="style_id")
     */
    private $beers;

    public function __construct()
    {
        $this->beers = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
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

    public function getStyleName(): ?string
    {
        return $this->style_name;
    }

    public function setStyleName(?string $style_name): self
    {
        $this->style_name = $style_name;

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

    /**
     * @return Collection|Beers[]
     */
    public function getBeers(): Collection
    {
        return $this->beers;
    }

    public function addBeer(Beers $beer): self
    {
        if (!$this->beers->contains($beer)) {
            $this->beers[] = $beer;
            $beer->setStyleId($this);
        }

        return $this;
    }

    public function removeBeer(Beers $beer): self
    {
        if ($this->beers->contains($beer)) {
            $this->beers->removeElement($beer);
            // set the owning side to null (unless already changed)
            if ($beer->getStyleId() === $this) {
                $beer->setStyleId(null);
            }
        }

        return $this;
    }
}
