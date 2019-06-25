<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EntradasRepository")
 */
class Entradas
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
    private $data;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $igorlea;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $deskribapena;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $signatura;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $numdoc;

    /**
     * @ORM\Column(type="text", length=255, nullable=true)
     */
    private $knosysid;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getData(): ?string
    {
        return $this->data;
    }

    public function setData(?string $data): self
    {
        $this->data = $data;

        return $this;
    }

    public function getIgorlea(): ?string
    {
        return $this->igorlea;
    }

    public function setIgorlea(?string $igorlea): self
    {
        $this->igorlea = $igorlea;

        return $this;
    }

    public function getDeskribapena(): ?string
    {
        return $this->deskribapena;
    }

    public function setDeskribapena(?string $deskribapena): self
    {
        $this->deskribapena = $deskribapena;

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
