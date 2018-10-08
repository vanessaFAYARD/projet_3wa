<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass="App\Repository\ResumeRepository")
 */
class Resume
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=130)
     * @Assert\NotBlank(message="Merci de saisir le nom de l'expérience")
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=20)
     * @Assert\NotBlank(message="Merci de saisir la période de l'expérience")
     */
    private $period;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="Merci de séléctionner un choix")
     */
    private $value_section;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Project", inversedBy="resume")
     */
    private $project;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Company", inversedBy="resume")
     */
    private $company;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\School", inversedBy="resume")
     */
    private $school;


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

    public function getPeriod(): ?string
    {
        return $this->period;
    }

    public function setPeriod(string $period): self
    {
        $this->period = $period;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getValue_Section(): ?int
    {
        return $this->value_section;
    }

    public function setValue_Section(int $value_section): self
    {
        $this->value_section = $value_section;

        return $this;
    }

    public function getValueSection(): ?int
    {
        return $this->value_section;
    }

    public function setValueSection(int $value_section): self
    {
        $this->value_section = $value_section;

        return $this;
    }

    public function getProject(): ?Project
    {
        return $this->project;
    }

    public function setProject(?Project $project): self
    {
        $this->project = $project;

        return $this;
    }

    public function getCompany(): ?Company
    {
        return $this->company;
    }

    public function setCompany(?Company $company): self
    {
        $this->company = $company;

        return $this;
    }

    public function getSchool(): ?School
    {
        return $this->school;
    }

    public function setSchool(?School $school): self
    {
        $this->school = $school;

        return $this;
    }
}
