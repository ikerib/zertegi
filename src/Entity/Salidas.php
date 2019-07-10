<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SalidasRepository")
 */
class Salidas
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
     * @ORM\Column(type="text", nullable=true)
     */
    private $signatura;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $eskatzailea;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $irteera;

    /**
     * @ORM\Column(type="text",  nullable=true)
     */
    private $sarrera;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $knosysid;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $numdoc;

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

    public function getSignatura(): ?string
    {
        return $this->signatura;
    }

    public function setSignatura(?string $signatura): self
    {
        $this->signatura = $signatura;

        return $this;
    }

    public function getEskatzailea(): ?string
    {
        return $this->eskatzailea;
    }

    public function setEskatzailea(?string $eskatzailea): self
    {
        $this->eskatzailea = $eskatzailea;

        return $this;
    }

    public function getIrteera(): ?string
    {
        return $this->irteera;
    }

    public function setIrteera(?string $irteera): self
    {
        $this->irteera = $irteera;

        return $this;
    }

    public function getSarrera(): ?string
    {
        return $this->sarrera;
    }

    public function setSarrera(?string $sarrera): self
    {
        $this->sarrera = $sarrera;

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

    public function getNumdoc(): ?string
    {
        return $this->numdoc;
    }

    public function setNumdoc(?string $numdoc): self
    {
        $this->numdoc = $numdoc;

        return $this;
    }
    
}
