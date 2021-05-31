<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArgazkiRepository")
 * @ORM\Table(name="argazki", indexes={
 *     @ORM\Index(columns={"deskribapena", "barrutia", "fecha", "gaia", "oharrak"}, flags={"fulltext"}),
 *     @ORM\Index(columns={"deskribapena"}, flags={"fulltext"}),
 *     @ORM\Index(columns={"barrutia"}, flags={"fulltext"}),
 *     @ORM\Index(columns={"fecha"}, flags={"fulltext"}),
 *     @ORM\Index(columns={"gaia"}, flags={"fulltext"}),
 *     @ORM\Index(columns={"oharrak"}, flags={"fulltext"})
 * })
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

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $berrikusi;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $berrikusiDeskribapena;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $berrikusiBarrutia;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $berrikusiFecha;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $berrikusiGaia;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $berrikusiNeurria;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $berrikusiKolorea;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $berrikusiZenbakia;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $berrikusiOharrak;

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

    public function getBerrikusiDeskribapena(): ?string
    {
        return $this->berrikusiDeskribapena;
    }

    public function setBerrikusiDeskribapena(?string $berrikusiDeskribapena): self
    {
        $this->berrikusiDeskribapena = $berrikusiDeskribapena;

        return $this;
    }

    public function getBerrikusiBarrutia(): ?string
    {
        return $this->berrikusiBarrutia;
    }

    public function setBerrikusiBarrutia(?string $berrikusiBarrutia): self
    {
        $this->berrikusiBarrutia = $berrikusiBarrutia;

        return $this;
    }

    public function getBerrikusiFecha(): ?string
    {
        return $this->berrikusiFecha;
    }

    public function setBerrikusiFecha(?string $berrikusiFecha): self
    {
        $this->berrikusiFecha = $berrikusiFecha;

        return $this;
    }

    public function getBerrikusiGaia(): ?string
    {
        return $this->berrikusiGaia;
    }

    public function setBerrikusiGaia(?string $berrikusiGaia): self
    {
        $this->berrikusiGaia = $berrikusiGaia;

        return $this;
    }

    public function getBerrikusiNeurria(): ?string
    {
        return $this->berrikusiNeurria;
    }

    public function setBerrikusiNeurria(?string $berrikusiNeurria): self
    {
        $this->berrikusiNeurria = $berrikusiNeurria;

        return $this;
    }

    public function getBerrikusiKolorea(): ?string
    {
        return $this->berrikusiKolorea;
    }

    public function setBerrikusiKolorea(?string $berrikusiKolorea): self
    {
        $this->berrikusiKolorea = $berrikusiKolorea;

        return $this;
    }

    public function getBerrikusiZenbakia(): ?string
    {
        return $this->berrikusiZenbakia;
    }

    public function setBerrikusiZenbakia(?string $berrikusiZenbakia): self
    {
        $this->berrikusiZenbakia = $berrikusiZenbakia;

        return $this;
    }

    public function getBerrikusiOharrak(): ?string
    {
        return $this->berrikusiOharrak;
    }

    public function setBerrikusiOharrak(?string $berrikusiOharrak): self
    {
        $this->berrikusiOharrak = $berrikusiOharrak;

        return $this;
    }

    public function getBerrikusi(): ?bool
    {
        return $this->berrikusi;
    }

    public function setBerrikusi(?bool $berrikusi): self
    {
        $this->berrikusi = $berrikusi;

        return $this;
    }
}
