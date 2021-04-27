<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;


/**
 * @ORM\Entity(repositoryClass="App\Repository\EuskeraRepository")
 * @ORM\Table(name="euskera", indexes={@ORM\Index(columns={"espedientea", "data", "sailkapena", "oharrak"}, flags={"fulltext"})})
 */
class Euskera
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
     * @ORM\Column(type="string", nullable=true)
     */
    private $sailkapena;

    /**
     * @ORM\Column(type="string", nullable=true)
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
}
