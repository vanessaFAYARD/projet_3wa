<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SkillRepository")
 */
class Skill
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     * @Assert\NotBlank(message="Merci de saisir un nom pour cette compétence")
     * @Assert\Regex(
     *     pattern="/^[A-Z]/",
     *     message="La première lettre du nom doit être une majuscule")
     *
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="La description est obligatoire")
     * @Assert\Regex(
     *     pattern="/^[A-Z]/",
     *     message="La première lettre de la description doit être une majuscule")
     *
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=30)
     * @Assert\NotBlank(message="Merci de saisir le nom d'une image")
     * @Assert\Regex(
     *     pattern="/[a-zA-Z-\d]+.+(?:jpg|png|jpeg)/",
     *     message="L'image doit être au format .jpg, .jpeg ou .png")
     *
     */
    private $image;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Project", mappedBy="skill")
     */
    private $projects;


    public function __construct()
    {
        $this->projects = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

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

    /**
     * @return Collection|Project[]
     */
    public function getProjects(): Collection
    {
        return $this->projects;
    }

    public function addProject(Project $project): self
    {
        if (!$this->projects->contains($project)) {
            $this->projects[] = $project;
            $project->setSkill($this);
        }

        return $this;
    }

    public function removeProject(Project $project): self
    {
        if ($this->projects->contains($project)) {
            $this->projects->removeElement($project);
// set the owning side to null (unless already changed)
            if ($project->getSkill() === $this) {
                $project->setSkill(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }
}
