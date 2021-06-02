<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;


/**
 * @ORM\Entity(repositoryClass="App\Repository\ProtokoloakRepository")
 * @ORM\Table(name="protokoloak", indexes={
 *     @ORM\Index(columns={"artxiboa", "saila", "signatura", "eskribaua", "data", "laburpena", "datuak", "oharrak", "bilatzaileak"}, flags={"fulltext"}),
 *     @ORM\Index(columns={"artxiboa"}, flags={"fulltext"}),
 *     @ORM\Index(columns={"saila"}, flags={"fulltext"}),
 *     @ORM\Index(columns={"signatura"}, flags={"fulltext"}),
 *     @ORM\Index(columns={"eskribaua"}, flags={"fulltext"}),
 *     @ORM\Index(columns={"data"}, flags={"fulltext"}),
 *     @ORM\Index(columns={"laburpena"}, flags={"fulltext"}),
 *     @ORM\Index(columns={"datuak"}, flags={"fulltext"}),
 *     @ORM\Index(columns={"oharrak"}, flags={"fulltext"}),
 *     @ORM\Index(columns={"bilatzaileak"}, flags={"fulltext"})
 * })
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
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $berrikusi;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $berrikusiArtxiboa;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $berrikusiSaila;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $berrikusiSignatura;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $berrikusiEskribaua;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $berrikusiData;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $berrikusiLaburpena;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $berrikusiDatuak;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $berrikusiOharrak;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $berrikusiBilatzaileak;

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

    public function getBerrikusi(): ?bool
    {
        return $this->berrikusi;
    }

    public function setBerrikusi(?bool $berrikusi): self
    {
        $this->berrikusi = $berrikusi;

        return $this;
    }

    public function getBerrikusiArtxiboa(): ?string
    {
        return $this->berrikusiArtxiboa;
    }

    public function setBerrikusiArtxiboa(?string $berrikusiArtxiboa): self
    {
        $this->berrikusiArtxiboa = $berrikusiArtxiboa;

        return $this;
    }

    public function getBerrikusiSaila(): ?string
    {
        return $this->berrikusiSaila;
    }

    public function setBerrikusiSaila(?string $berrikusiSaila): self
    {
        $this->berrikusiSaila = $berrikusiSaila;

        return $this;
    }

    public function getBerrikusiSignatura(): ?string
    {
        return $this->berrikusiSignatura;
    }

    public function setBerrikusiSignatura(?string $berrikusiSignatura): self
    {
        $this->berrikusiSignatura = $berrikusiSignatura;

        return $this;
    }

    public function getBerrikusiEskribaua(): ?string
    {
        return $this->berrikusiEskribaua;
    }

    public function setBerrikusiEskribaua(?string $berrikusiEskribaua): self
    {
        $this->berrikusiEskribaua = $berrikusiEskribaua;

        return $this;
    }

    public function getBerrikusiData(): ?string
    {
        return $this->berrikusiData;
    }

    public function setBerrikusiData(?string $berrikusiData): self
    {
        $this->berrikusiData = $berrikusiData;

        return $this;
    }

    public function getBerrikusiLaburpena(): ?string
    {
        return $this->berrikusiLaburpena;
    }

    public function setBerrikusiLaburpena(?string $berrikusiLaburpena): self
    {
        $this->berrikusiLaburpena = $berrikusiLaburpena;

        return $this;
    }

    public function getBerrikusiDatuak(): ?string
    {
        return $this->berrikusiDatuak;
    }

    public function setBerrikusiDatuak(?string $berrikusiDatuak): self
    {
        $this->berrikusiDatuak = $berrikusiDatuak;

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

    public function getBerrikusiBilatzaileak(): ?string
    {
        return $this->berrikusiBilatzaileak;
    }

    public function setBerrikusiBilatzaileak(?string $berrikusiBilatzaileak): self
    {
        $this->berrikusiBilatzaileak = $berrikusiBilatzaileak;

        return $this;
    }
}
