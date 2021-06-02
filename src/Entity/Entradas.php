<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;


/**
 * @ORM\Entity(repositoryClass="App\Repository\EntradasRepository")
 * @ORM\Table(name="entradas", indexes={
 *     @ORM\Index(columns={"data", "igorlea", "deskribapena", "signatura"}, flags={"fulltext"}),
 *     @ORM\Index(columns={"data"}, flags={"fulltext"}),
 *     @ORM\Index(columns={"igorlea"}, flags={"fulltext"}),
 *     @ORM\Index(columns={"deskribapena"}, flags={"fulltext"}),
 *     @ORM\Index(columns={"signatura"}, flags={"fulltext"})
 * })
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
    private $berrikusiData;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $berrikusiIgorlea;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $berrikusiDeskribapena;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $berrikusiSignatura;

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

    public function getBerrikusiIgorlea(): ?string
    {
        return $this->berrikusiIgorlea;
    }

    public function setBerrikusiIgorlea(?string $berrikusiIgorlea): self
    {
        $this->berrikusiIgorlea = $berrikusiIgorlea;

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

    public function getBerrikusiSignatura(): ?string
    {
        return $this->berrikusiSignatura;
    }

    public function setBerrikusiSignatura(?string $berrikusiSignatura): self
    {
        $this->berrikusiSignatura = $berrikusiSignatura;

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
