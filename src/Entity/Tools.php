<?php

namespace App\Entity;

use App\Repository\ToolsRepository;
use Doctrine\ORM\Mapping as ORM;
use Hateoas\Configuration\Annotation as Hateoas;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ToolsRepository::class)
 * @Hateoas\Relation(
 *      "self",
 *      href = @Hateoas\Route(
 *          "tools_show",
 *          parameters = { "id" = "expr(object.getId())" },
 *          absolute= true
 *      )
 * )
 * @Hateoas\Relation(
 *      "self",
 *      href = @Hateoas\Route(
 *          "tools_all_user_show",
 *          parameters = { "id" = "expr(object.getId())" },
 *          absolute= true
 *      )
 * )
 *
 */
class Tools
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Serializer\Expose
     * @Serializer\Groups({"tools"})
     */
    private $id;

    /**
     * @Assert\NotBlank(groups="Create", groups="Update")
     * @ORM\Column(type="string", length=255)
     * @Serializer\Expose
     * @Serializer\Groups({"tools"})
     */
    private $name;

    /**
     * @Assert\NotBlank(groups="Create", groups="Update")
     * @ORM\Column(type="string", length=255)
     * @Serializer\Expose
     * @Serializer\Groups({"tools"})
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="tools")
     */
    private $relation;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getRelation(): ?User
    {
        return $this->relation;
    }

    public function setRelation(?User $relation): self
    {
        $this->relation = $relation;

        return $this;
    }
}
