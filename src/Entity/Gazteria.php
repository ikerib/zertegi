<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;


/**
 * @ORM\Entity(repositoryClass="App\Repository\GazteriaRepository")
 * @ORM\Table(name="gazteria", indexes={
 *     @ORM\Index(columns={"espedientea", "data", "sailkapena", "signatura", "oharrak"}, flags={"fulltext"}),
 *     @ORM\Index(columns={"espedientea"}, flags={"fulltext"}),
 *     @ORM\Index(columns={"data"}, flags={"fulltext"}),
 *     @ORM\Index(columns={"sailkapena"}, flags={"fulltext"}),
 *     @ORM\Index(columns={"signatura"}, flags={"fulltext"}),
 *     @ORM\Index(columns={"oharrak"}, flags={"fulltext"})
 * })
 */
class Gazteria
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
    private $data;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sailkapena;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $signatura;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $oharrak;

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
     * @ORM\Column(type="text", nullable=true)
     */
    private $berrikusiData;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $berrikusiSailkapena;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $berrikusiEspedientea;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $berrikusiSignatura;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $berrikusiOharrak;

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

    public function getData(): ?string
    {
        return $this->data;
    }

    public function setData(?string $data): self
    {
        $this->data = $data;

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

    public function getOharrak(): ?string
    {
        return $this->oharrak;
    }

    public function setOharrak(?string $oharrak): self
    {
        $this->oharrak = $oharrak;

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

    public function getBerrikusiData(): ?string
    {
        return $this->berrikusiData;
    }

    public function setBerrikusiData(?string $berrikusiData): self
    {
        $this->berrikusiData = $berrikusiData;

        return $this;
    }

    public function getBerrikusiSailkapena(): ?string
    {
        return $this->berrikusiSailkapena;
    }

    public function setBerrikusiSailkapena(?string $berrikusiSailkapena): self
    {
        $this->berrikusiSailkapena = $berrikusiSailkapena;

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

    public function getBerrikusiOharrak(): ?string
    {
        return $this->berrikusiOharrak;
    }

    public function setBerrikusiOharrak(?string $berrikusiOharrak): self
    {
        $this->berrikusiOharrak = $berrikusiOharrak;

        return $this;
    }
}
