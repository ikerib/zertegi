<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;


/**
 * @ORM\Entity(repositoryClass="App\Repository\ArgazkiRepository")
 * @ORM\Table(name="argazki", indexes={@ORM\Index(columns={"deskribapena", "barrutia", "gaia", "oharrak"}, flags={"fulltext"})})
 */
class Argazki
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
    private $deskribapena;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $barrutia;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fecha;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $gaia;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $neurria;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $kolorea;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $zenbakia;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $oharrak;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $numdoc;

    /**
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $created;

    /**
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updated;

    /**
     * @ORM\Column(type="text", length=255, nullable=true)
     */
    private $knosysid;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getBarrutia(): ?string
    {
        return $this->barrutia;
    }

    public function setBarrutia(?string $barrutia): self
    {
        $this->barrutia = $barrutia;

        return $this;
    }

    public function getFecha(): ?string
    {
        return $this->fecha;
    }

    public function setFecha(?string $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getGaia(): ?string
    {
        return $this->gaia;
    }

    public function setGaia(?string $gaia): self
    {
        $this->gaia = $gaia;

        return $this;
    }

    public function getNeurria(): ?string
    {
        return $this->neurria;
    }

    public function setNeurria(?string $neurria): self
    {
        $this->neurria = $neurria;

        return $this;
    }

    public function getKolorea(): ?string
    {
        return $this->kolorea;
    }

    public function setKolorea(?string $kolorea): self
    {
        $this->kolorea = $kolorea;

        return $this;
    }

    public function getZenbakia(): ?string
    {
        return $this->zenbakia;
    }

    public function setZenbakia(?string $zenbakia): self
    {
        $this->zenbakia = $zenbakia;

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

    public function getCreated(): ?\DateTimeInterface
    {
        return $this->created;
    }

    public function setCreated(?\DateTimeInterface $created): self
    {
        $this->created = $created;

        return $this;
    }

    public function getUpdated(): ?\DateTimeInterface
    {
        return $this->updated;
    }

    public function setUpdated(?\DateTimeInterface $updated): self
    {
        $this->updated = $updated;

        return $this;
    }
}
