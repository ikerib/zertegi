<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AmpRepository")
 * @ORM\Table(name="amp", indexes={
 *     @ORM\Index(columns={"expediente", "fecha", "clasificacion", "signatura", "observaciones"}, flags={"fulltext"}),
 *     @ORM\Index(columns={"expediente"}, flags={"fulltext"}),
 *     @ORM\Index(columns={"fecha"}, flags={"fulltext"}),
 *     @ORM\Index(columns={"clasificacion"}, flags={"fulltext"}),
 *     @ORM\Index(columns={"signatura"}, flags={"fulltext"}),
 *     @ORM\Index(columns={"observaciones"}, flags={"fulltext"})
 * })
 */
class Amp
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
    private $expediente;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fecha;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $numdoc;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $clasificacion;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $signatura;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $observaciones;

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
    private ?string $berrikusiClasificacion;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private ?string $berrikusiExpediente;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private ?string $berrikusiObservaciones;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getExpediente(): ?string
    {
        return $this->expediente;
    }

    public function setExpediente(?string $expediente): self
    {
        $this->expediente = $expediente;

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

    public function getClasificacion(): ?string
    {
        return $this->clasificacion;
    }

    public function setClasificacion(?string $clasificacion): self
    {
        $this->clasificacion = $clasificacion;

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

    public function getObservaciones(): ?string
    {
        return $this->observaciones;
    }

    public function setObservaciones(?string $observaciones): self
    {
        $this->observaciones = $observaciones;

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

    public function setCreated(\DateTimeInterface $created): self
    {
        $this->created = $created;

        return $this;
    }

    public function getUpdated(): ?\DateTimeInterface
    {
        return $this->updated;
    }

    public function setUpdated(\DateTimeInterface $updated): self
    {
        $this->updated = $updated;

        return $this;
    }

    public function getContentChangedBy(): ?string
    {
        return $this->contentChangedBy;
    }

    public function setContentChangedBy(?string $contentChangedBy): self
    {
        $this->contentChangedBy = $contentChangedBy;

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

    public function getBerrikusiClasificacion(): ?string
    {
        return $this->berrikusiClasificacion;
    }

    public function setBerrikusiClasificacion(?string $berrikusiClasificacion): self
    {
        $this->berrikusiClasificacion = $berrikusiClasificacion;

        return $this;
    }

    public function getBerrikusiExpediente(): ?string
    {
        return $this->berrikusiExpediente;
    }

    public function setBerrikusiExpediente(?string $berrikusiExpediente): self
    {
        $this->berrikusiExpediente = $berrikusiExpediente;

        return $this;
    }

    public function getBerrikusiObservaciones(): ?string
    {
        return $this->berrikusiObservaciones;
    }

    public function setBerrikusiObservaciones(?string $berrikusiObservaciones): self
    {
        $this->berrikusiObservaciones = $berrikusiObservaciones;

        return $this;
    }
}
