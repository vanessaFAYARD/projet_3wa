<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass="App\Repository\CompanyRepository")
 */
class Company
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     * @Assert\NotBlank(message="Le nom de la société est obligatoire")
     */
    private $name;


    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank(message="L'activité de la société est obligatoire")
     */
    private $activity;


    /**
     * @ORM\Column(type="string", length=40)
     * @Assert\NotBlank(message="La ville de la société est obligatoire")
     */
    private $city;


    /**
     * @ORM\Column(type="integer")
     * @Assert\Regex(
     *     pattern="/[0-9]{2}/",
     *     message="Le code postal doit être un code postal valide (exemple : 38)")
     * @Assert\NotBlank(message="Le code postal de la société est obligatoire")
     */
    private $address;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Resume", mappedBy="company")
     */
    private $resume;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    public function __construct()
    {
        $this->resume = new ArrayCollection();
    }

     public function getId(): ?int
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

    public function getActivity(): ?string
    {
        return $this->activity;
    }

    public function setActivity(string $activity): self
    {
        $this->activity = $activity;

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
            $resume->setCompany($this);
        }

        return $this;
    }

    public function removeResume(Resume $resume): self
    {
        if ($this->resume->contains($resume)) {
            $this->resume->removeElement($resume);
            // set the owning side to null (unless already changed)
            if ($resume->getCompany() === $this) {
                $resume->setCompany(null);
            }
        }

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }

}
