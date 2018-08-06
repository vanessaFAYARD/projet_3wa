<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

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
     */
    private $name;


    /**
     * @ORM\Column(type="string", length=50)
     */
    private $activity;


    /**
     * @ORM\Column(type="string", length=40)
     */
    private $city;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $address;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\resume", mappedBy="id_company")
     */
    private $resumes;

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             public function __construct()
    {
        $this->resumes = new ArrayCollection();
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

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return Collection|resume[]
     */
    public function getResumes(): Collection
    {
        return $this->resumes;
    }

    public function addResume(resume $resume): self
    {
        if (!$this->resumes->contains($resume)) {
            $this->resumes[] = $resume;
            $resume->setIdCompany($this);
        }

        return $this;
    }

    public function removeResume(resume $resume): self
    {
        if ($this->resumes->contains($resume)) {
            $this->resumes->removeElement($resume);
            // set the owning side to null (unless already changed)
            if ($resume->getIdCompany() === $this) {
                $resume->setIdCompany(null);
            }
        }

        return $this;
    }


}
