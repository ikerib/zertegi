<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProtokoloakRepository")
 */
class Protokoloak
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $artxiboa;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $saila;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $signatura;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $eskribaua;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $data;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $laburpena;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $datuak;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $oharrak;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $bilatzaileak;

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

    public function getArtxiboa(): ?string
    {
        return $this->artxiboa;
    }

    public function setArtxiboa(?string $artxiboa): self
    {
        $this->artxiboa = $artxiboa;

        return $this;
    }

    public function getSaila(): ?string
    {
        return $this->saila;
    }

    public function setSaila(?string $saila): self
    {
        $this->saila = $saila;

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

    public function getEskribaua(): ?string
    {
        return $this->eskribaua;
    }

    public function setEskribaua(?string $eskribaua): self
    {
        $this->eskribaua = $eskribaua;

        return $this;
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

    public function getLaburpena(): ?string
    {
        return $this->laburpena;
    }

    public function setLaburpena(?string $laburpena): self
    {
        $this->laburpena = $laburpena;

        return $this;
    }

    public function getDatuak(): ?string
    {
        return $this->datuak;
    }

    public function setDatuak(?string $datuak): self
    {
        $this->datuak = $datuak;

        return $this;
    }

    public function getOharrak(): ?string
    {
        return $this->oharrak;
    }

    public function setOharrak(?string $oharrak): self
    {
        $this->oharrak = $oharrak;

        return $this;
    }

    public function getBilatzaileak(): ?string
    {
        return $this->bilatzaileak;
    }

    public function setBilatzaileak(?string $bilatzaileak): self
    {
        $this->bilatzaileak = $bilatzaileak;

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
