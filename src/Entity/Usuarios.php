<?php

namespace App\Entity;

use App\Repository\UsuariosRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UsuariosRepository::class)]
class Usuarios
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, Materias>
     */
    #[ORM\OneToMany(targetEntity: Materias::class, mappedBy: 'usuarios')]
    private Collection $materias;

    public function __construct()
    {
        $this->materias = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Materias>
     */
    public function getMaterias(): Collection
    {
        return $this->materias;
    }

    public function addMateria(Materias $materia): static
    {
        if (!$this->materias->contains($materia)) {
            $this->materias->add($materia);
            $materia->setUsuarios($this);
        }

        return $this;
    }

    public function removeMateria(Materias $materia): static
    {
        if ($this->materias->removeElement($materia)) {
            // set the owning side to null (unless already changed)
            if ($materia->getUsuarios() === $this) {
                $materia->setUsuarios(null);
            }
        }

        return $this;
    }
}
