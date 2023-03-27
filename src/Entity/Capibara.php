<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use Doctrine\ORM\Mapping as ORM;

use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Put;
use ApiPlatform\Metadata\Delete;

use App\Controller\GetCapibara;
use App\Controller\GetCapibaras;
use App\Controller\PostCapibara;
use App\Controller\DeleteCapibara;
use App\Controller\PatchCapibara;
use App\Controller\PutCapibara;

#[ApiResource(operations: [
    new Get(controller: GetCapibara::class),
    new GetCollection(controller: GetCapibaras::class),
    new Post(controller: PostCapibara::class),
    new Put(controller: PutCapibara::class),
    new Patch(controller: PatchCapibara::class),
    new Delete(controller: DeleteCapibara::class)
]
)]


#[ORM\Entity]
class Capibara
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 80)]
    private string $name;

    #[ORM\Column(type: 'string', length: 255)]
    private string $description;

    #[ORM\Column(type: 'integer')]
    private int $age; 

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

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }
}