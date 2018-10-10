<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProjectRepository")
 */
class Project
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     * @Assert\NotBlank(message="Le nom du projet est obligatoire")
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Merci de saisir le nom d'une image")
     * @Assert\Regex(
     *     pattern="/[a-zA-Z-\d]+.+(?:jpg|png|jpeg)/",
     *     message="L'image doit être au format .jpg, .jpeg ou .png")
     *
     */
    private $caption;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank(message="La description est obligatoire")
     * @Assert\Regex(
     *     pattern="/^[A-Z]/",
     *     message="La première lettre de la description doit être une majuscule")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=40, nullable=true)
     */
    private $url;

    /**
     * @ORM\Column(type="string", length=30)
     * @Assert\NotBlank(message="Merci de saisir le nom d'une image")
     * @Assert\Regex(
     *     pattern="/[a-zA-Z-\d]+.+(?:jpg|png|jpeg)/",
     *     message="L'image doit être au format .jpg, .jpeg ou .png")
     */
    private $image;

    /**
     * @ORM\Column(type="date")
     * @Assert\NotBlank(message="Merci de saisir la date de création du projet")
     * @Assert\Type("\DateTime")
     */
    private $createdAt;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="projects")
     * @Assert\NotBlank(message="Merci de séléctionner une catégorie")
     */
    private $category;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Skill", inversedBy="projects")
     * @Assert\NotBlank(message="Merci de séléctionner une compétence")
     */
    private $skill;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Resume", mappedBy="project")
     */
    private $resume;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $url2;

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

    public function getCaption(): ?string
    {
        return $this->caption;
    }

    public function setCaption(string $caption): self
    {
        $this->caption = $caption;

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

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getIdCategory(): ?Category
    {
        return $this->category;
    }

    public function setIdCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getSkill(): ?Skill
    {
        return $this->skill;
    }

    public function setSkill(?Skill $skill): self
    {
        $this->skill = $skill;

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
            $resume->setProject($this);
        }

        return $this;
    }

    public function removeResume(Resume $resume): self
    {
        if ($this->resume->contains($resume)) {
            $this->resume->removeElement($resume);
            // set the owning side to null (unless already changed)
            if ($resume->getProject() === $this) {
                $resume->setProject(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }

    public function getUrl2(): ?string
    {
        return $this->url2;
    }

    public function setUrl2(?string $url2): self
    {
        $this->url2 = $url2;

        return $this;
    }
}
