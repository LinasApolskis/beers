<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoriesRepository")
 */
class categories
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cat_name;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $last_mod;

    /**
     * @ORM\OneToMany(targetEntity="styles", mappedBy="cat_id")
     */
    private $styles;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Beers", mappedBy="cat_id")
     */
    private $beers;

    public function __construct()
    {
        $this->styles = new ArrayCollection();
        $this->beers = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getCatName(): ?string
    {
        return $this->cat_name;
    }

    public function setCatName(?string $cat_name): self
    {
        $this->cat_name = $cat_name;

        return $this;
    }

    public function getLastMod(): ?\DateTimeInterface
    {
        return $this->last_mod;
    }

    public function setLastMod(?\DateTimeInterface $last_mod): self
    {
        $this->last_mod = $last_mod;

        return $this;
    }

    /**
     * @return Collection|styles[]
     */
    public function getStyles(): Collection
    {
        return $this->styles;
    }

    public function addStyle(styles $style): self
    {
        if (!$this->styles->contains($style)) {
            $this->styles[] = $style;
            $style->setCatId($this);
        }

        return $this;
    }

    public function removeStyle(styles $style): self
    {
        if ($this->styles->contains($style)) {
            $this->styles->removeElement($style);
            // set the owning side to null (unless already changed)
            if ($style->getCatId() === $this) {
                $style->setCatId(null);
            }
        }

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
            $beer->setCatId($this);
        }

        return $this;
    }

    public function removeBeer(Beers $beer): self
    {
        if ($this->beers->contains($beer)) {
            $this->beers->removeElement($beer);
            // set the owning side to null (unless already changed)
            if ($beer->getCatId() === $this) {
                $beer->setCatId(null);
            }
        }

        return $this;
    }
}
