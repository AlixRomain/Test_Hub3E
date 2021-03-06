<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
use JMS\Serializer\Annotation\Type;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @UniqueEntity(
 *     fields={"email"},
 *     message="L'adresse mail {{ value }} est déjà inscrit en base"
 * )
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User implements UserInterface
{
    const ROLE_ADMIN  = ["ROLE_ADMIN","ROLE_USER"];
    const ROLE_USER   = ["ROLE_USER"];
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Serializer\Groups({"register"})
     * @ORM\Column(type="string", length=180, unique=true)
     * @Assert\NotBlank(groups="Create")
     * @Assert\Email()
     * @Assert\Length(
     *     max = 255
     * )
     */
    private $email;


    /**
     * @Type("array")
     * @ORM\Column(type="json")
     */
    private $roles = ['ROLE_USER'];

    /**
     * @Serializer\Groups("register")
     * @var string The hashed password
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(groups="Create")
     * @Assert\Length(
     *     min = 8,
     *     max = 255
     * )
     * @Assert\Regex(
     *     pattern = "^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W)^",
     *     match = true,
     *     message = "Password must contain at least one lowercase, one uppercase, one digit and one special character !"
     * )
     */
    private $password;

    /**
     * @Serializer\Groups("register","tools")
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(groups="Create")
     * @Assert\Length(
     *     min = 3,
     *     max = 25
     * )
     */
    private $username;

    /**
     * @Serializer\Groups("tools")
     * @ORM\OneToMany(targetEntity=Tools::class, mappedBy="relation")
     */
    private $tools;

    public function __construct()
    {
        $this->tools = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return Collection|Tools[]
     */
    public function getTools(): Collection
    {
        return $this->tools;
    }

    public function addTool(Tools $tool): self
    {
        if (!$this->tools->contains($tool)) {
            $this->tools[] = $tool;
            $tool->setRelation($this);
        }

        return $this;
    }

    public function removeTool(Tools $tool): self
    {
        if ($this->tools->removeElement($tool)) {
            // set the owning side to null (unless already changed)
            if ($tool->getRelation() === $this) {
                $tool->setRelation(null);
            }
        }

        return $this;
    }
}
