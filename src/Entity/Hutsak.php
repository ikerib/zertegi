<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;


/**
 * @ORM\Entity(repositoryClass="App\Repository\HutsakRepository")
 * @ORM\Table(name="hutsak", indexes={
 *     @ORM\Index(columns={"zaharra", "berria"}, flags={"fulltext"}),
 *     @ORM\Index(columns={"zaharra"}, flags={"fulltext"}),
 *     @ORM\Index(columns={"berria"}, flags={"fulltext"})
 * })
 */
class Hutsak
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
    private $egoera;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $signatura;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $zaharra;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $berria;

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
    private $berrikusiEgoera;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $berrikusiSignatura;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $berrikusiZaharra;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $berrikusiBerria;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEgoera(): ?string
    {
        return $this->egoera;
    }

    public function setEgoera(?string $egoera): self
    {
        $this->egoera = $egoera;

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

    public function getZaharra(): ?string
    {
        return $this->zaharra;
    }

    public function setZaharra(?string $zaharra): self
    {
        $this->zaharra = $zaharra;

        return $this;
    }

    public function getBerria(): ?string
    {
        return $this->berria;
    }

    public function setBerria(?string $berria): self
    {
        $this->berria = $berria;

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

    public function getBerrikusiEgoera(): ?string
    {
        return $this->berrikusiEgoera;
    }

    public function setBerrikusiEgoera(?string $berrikusiEgoera): self
    {
        $this->berrikusiEgoera = $berrikusiEgoera;

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

    public function getBerrikusiZaharra(): ?string
    {
        return $this->berrikusiZaharra;
    }

    public function setBerrikusiZaharra(?string $berrikusiZaharra): self
    {
        $this->berrikusiZaharra = $berrikusiZaharra;

        return $this;
    }

    public function getBerrikusiBerria(): ?string
    {
        return $this->berrikusiBerria;
    }

    public function setBerrikusiBerria(?string $berrikusiBerria): self
    {
        $this->berrikusiBerria = $berrikusiBerria;

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
