<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;


/**
 * @ORM\Entity(repositoryClass="App\Repository\ConsultasRepository")
 * @ORM\Table(name="consultas", indexes={
 *     @ORM\Index(columns={"izena", "helbidea", "gaia", "enpresa", "kontsulta"}, flags={"fulltext"}),
 *     @ORM\Index(columns={"izena"}, flags={"fulltext"}),
 *     @ORM\Index(columns={"helbidea"}, flags={"fulltext"}),
 *     @ORM\Index(columns={"gaia"}, flags={"fulltext"}),
 *     @ORM\Index(columns={"enpresa"}, flags={"fulltext"}),
 *     @ORM\Index(columns={"kontsulta"}, flags={"fulltext"})
 * })
 */
class Consultas
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
    private $izena;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $helbidea;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $gaia;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $enpresa;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $kontsulta;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $numdoc;

    /**
     * @ORM\Column(type="text", nullable=true)
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
    private $berrikusiIzena;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $berrikusiGaia;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $berrikusiKontsulta;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $berrikusiEnpresa;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $berrikusiHelbidea;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIzena(): ?string
    {
        return $this->izena;
    }

    public function setIzena(?string $izena): self
    {
        $this->izena = $izena;

        return $this;
    }

    public function getHelbidea(): ?string
    {
        return $this->helbidea;
    }

    public function setHelbidea(?string $helbidea): self
    {
        $this->helbidea = $helbidea;

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

    public function getEnpresa(): ?string
    {
        return $this->enpresa;
    }

    public function setEnpresa(?string $enpresa): self
    {
        $this->enpresa = $enpresa;

        return $this;
    }

    public function getKontsulta(): ?string
    {
        return $this->kontsulta;
    }

    public function setKontsulta(?string $kontsulta): self
    {
        $this->kontsulta = $kontsulta;

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

    public function getBerrikusiIzena(): ?string
    {
        return $this->berrikusiIzena;
    }

    public function setBerrikusiIzena(?string $berrikusiIzena): self
    {
        $this->berrikusiIzena = $berrikusiIzena;

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

    public function getBerrikusiKontsulta(): ?string
    {
        return $this->berrikusiKontsulta;
    }

    public function setBerrikusiKontsulta(?string $berrikusiKontsulta): self
    {
        $this->berrikusiKontsulta = $berrikusiKontsulta;

        return $this;
    }

    public function getBerrikusiEnpresa(): ?string
    {
        return $this->berrikusiEnpresa;
    }

    public function setBerrikusiEnpresa(?string $berrikusiEnpresa): self
    {
        $this->berrikusiEnpresa = $berrikusiEnpresa;

        return $this;
    }

    public function getBerrikusiHelbidea(): ?string
    {
        return $this->berrikusiHelbidea;
    }

    public function setBerrikusiHelbidea(?string $berrikusiHelbidea): self
    {
        $this->berrikusiHelbidea = $berrikusiHelbidea;

        return $this;
    }
}
