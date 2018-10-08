<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SchoolRepository")
 */
class School
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $city;

    /**
     * @ORM\Column(type="integer")
     */
    private $address;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Resume", mappedBy="school")
     */
    private $resume;

    public function __construct()
    {
        $this->resume = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
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

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getAddress(): ?int
    {
        return $this->address;
    }

    public function setAddress(int $address): self
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return Collection|Resume[]
     */
    public function getResume(): Collection
    {
        return $this->resume;
    }

    public function addResume(Resume $resume): self
    {
        if (!$this->resume->contains($resume)) {
            $this->resume[] = $resume;
            $resume->setSchool($this);
        }

        return $this;
    }

    public function removeResume(Resume $resume): self
    {
        if ($this->resume->contains($resume)) {
            $this->resume->removeElement($resume);
            // set the owning side to null (unless already changed)
            if ($resume->getSchool() === $this) {
                $resume->setSchool(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }
}
