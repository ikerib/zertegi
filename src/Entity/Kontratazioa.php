<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\KontratazioaRepository")
 */
class Kontratazioa
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $espedientea;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $urtea;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sailkapena;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $signatura;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $numdoc;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $knosysid;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEspedientea(): ?string
    {
        return $this->espedientea;
    }

    public function setEspedientea(?string $espedientea): self
    {
        $this->espedientea = $espedientea;

        return $this;
    }

    public function getUrtea(): ?string
    {
        return $this->urtea;
    }

    public function setUrtea(?string $urtea): self
    {
        $this->urtea = $urtea;

        return $this;
    }

    public function getSailkapena(): ?string
    {
        return $this->sailkapena;
    }

    public function setSailkapena(?string $sailkapena): self
    {
        $this->sailkapena = $sailkapena;

        return $this;
    }

    public function getSignatura(): ?string
    {
        return $this->signatura;
    }

    public function setSignatura(?string $signatura): self
    {
        $this->signatura = $signatura;

        return $this;
    }

    public function getNumdoc(): ?string
    {
        return $this->numdoc;
    }

    public function setNumdoc(?string $numdoc): self
    {
        $this->numdoc = $numdoc;

        return $this;
    }

    public function getKnosysid(): ?string
    {
        return $this->knosysid;
    }

    public function setKnosysid(?string $knosysid): self
    {
        $this->knosysid = $knosysid;

        return $this;
    }
}