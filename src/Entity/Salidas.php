<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;


/**
 * @ORM\Entity(repositoryClass="App\Repository\SalidasRepository")
 * @ORM\Table(name="salidas", indexes={
 *     @ORM\Index(columns={"espedientea", "signatura", "eskatzailea", "irteera", "sarrera"}, flags={"fulltext"}),
 *     @ORM\Index(columns={"espedientea"}, flags={"fulltext"}),
 *     @ORM\Index(columns={"signatura"}, flags={"fulltext"}),
 *     @ORM\Index(columns={"eskatzailea"}, flags={"fulltext"}),
 *     @ORM\Index(columns={"irteera"}, flags={"fulltext"}),
 *     @ORM\Index(columns={"sarrera"}, flags={"fulltext"})
 * })
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
     * @ORM\Column(type="text", nullable=true)
     */
    private $berrikusiEspedientea;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $berrikusiSignatura;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $berrikusiEskatzailea;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $berrikusiIrteera;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $berrikusiSarrera;

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

    public function getBerrikusiEspedientea(): ?string
    {
        return $this->berrikusiEspedientea;
    }

    public function setBerrikusiEspedientea(?string $berrikusiEspedientea): self
    {
        $this->berrikusiEspedientea = $berrikusiEspedientea;

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

    public function getBerrikusiEskatzailea(): ?string
    {
        return $this->berrikusiEskatzailea;
    }

    public function setBerrikusiEskatzailea(?string $berrikusiEskatzailea): self
    {
        $this->berrikusiEskatzailea = $berrikusiEskatzailea;

        return $this;
    }

    public function getBerrikusiIrteera(): ?string
    {
        return $this->berrikusiIrteera;
    }

    public function setBerrikusiIrteera(?string $berrikusiIrteera): self
    {
        $this->berrikusiIrteera = $berrikusiIrteera;

        return $this;
    }

    public function getBerrikusiSarrera(): ?string
    {
        return $this->berrikusiSarrera;
    }

    public function setBerrikusiSarrera(?string $berrikusiSarrera): self
    {
        $this->berrikusiSarrera = $berrikusiSarrera;

        return $this;
    }

}
