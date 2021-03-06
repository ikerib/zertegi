<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;


/**
 * @ORM\Entity(repositoryClass="App\Repository\AnarbeRepository")
 * @ORM\Table(name="anarbe", indexes={
 *     @ORM\Index(columns={"expediente", "fecha", "clasificacion", "signatura", "observaciones"}, flags={"fulltext"}),
 *     @ORM\Index(columns={"expediente"}, flags={"fulltext"}),
 *     @ORM\Index(columns={"fecha"}, flags={"fulltext"}),
 *     @ORM\Index(columns={"clasificacion"}, flags={"fulltext"}),
 *     @ORM\Index(columns={"signatura"}, flags={"fulltext"}),
 *     @ORM\Index(columns={"observaciones"}, flags={"fulltext"})
 * })
 */
class Anarbe
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $clasificacion;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $signatura;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $observaciones;

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
    private $berrikusi_clasificacion;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $berrikusi_expediente;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $berrikusi_observaciones;

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

    public function getNumdoc(): ?string
    {
        return $this->numdoc;
    }

    public function setNumdoc(?string $numdoc): self
    {
        $this->numdoc = $numdoc;

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

    public function getBerrikusiClasificacion(): ?string
    {
        return $this->berrikusi_clasificacion;
    }

    public function setBerrikusiClasificacion(?string $berrikusi_clasificacion): self
    {
        $this->berrikusi_clasificacion = $berrikusi_clasificacion;

        return $this;
    }

    public function getBerrikusiExpediente(): ?string
    {
        return $this->berrikusi_expediente;
    }

    public function setBerrikusiExpediente(?string $berrikusi_expediente): self
    {
        $this->berrikusi_expediente = $berrikusi_expediente;

        return $this;
    }

    public function getBerrikusiObservaciones(): ?string
    {
        return $this->berrikusi_observaciones;
    }

    public function setBerrikusiObservaciones(?string $berrikusi_observaciones): self
    {
        $this->berrikusi_observaciones = $berrikusi_observaciones;

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
