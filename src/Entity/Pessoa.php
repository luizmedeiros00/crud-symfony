<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PessoaRepository")
 */
class Pessoa
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tipo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $identificador;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nome;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Contato", mappedBy="pessoa")
     */
    private $contatos;

    public function __construct()
    {
        $this->contatos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTipo(): ?string
    {
        return $this->tipo;
    }

    public function setTipo(string $tipo): self
    {
        $this->tipo = $tipo;

        return $this;
    }

    public function getIdentificador(): ?string
    {
        return $this->identificador;
    }

    public function setIdentificador(string $identificador): self
    {
        $this->identificador = $identificador;

        return $this;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * @return Collection|Contato[]
     */
    public function getContatos(): Collection
    {
        return $this->contatos;
    }

    public function addContato(Contato $contato): self
    {
        if (!$this->contatos->contains($contato)) {
            $this->contatos[] = $contato;
            $contato->setPessoa($this);
        }

        return $this;
    }

    public function removeContato(Contato $contato): self
    {
        if ($this->contatos->contains($contato)) {
            $this->contatos->removeElement($contato);
            // set the owning side to null (unless already changed)
            if ($contato->getPessoa() === $this) {
                $contato->setPessoa(null);
            }
        }

        return $this;
    }
}
