<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Pessoa
 * @package App\Entity
 * @ORM\Entity()
 * @ORM\Table(name="pessoa", schema="processo_juridico")
 */
class Pessoa
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(name="id", type="integer", length=11, nullable=false)
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(name="nome", type="string", length=255, nullable=false)
     * @var string
     */
    private $nome;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TipoDocumento")
     * @ORM\JoinColumn(name="tipo_documento_id", referencedColumnName="id", nullable=false)
     * @var TipoDocumento
     */
    private $tipoDocumento;

    /**
     * @ORM\Column(type="string", length=18, nullable=true, unique=true)
     * @var string
     */
    private $documento;

    /**
     * @return int
     */
    public function getId(): ? int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getNome(): ? string
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     */
    public function setNome(string $nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return TipoDocumento
     */
    public function getTipoDocumento(): ? TipoDocumento
    {
        return $this->tipoDocumento;
    }

    /**
     * @param mixed $tipoDocumento
     */
    public function setTipoDocumento($tipoDocumento)
    {
        $this->tipoDocumento = $tipoDocumento;
    }

    /**
     * @return string
     */
    public function getDocumento(): ? string
    {
        return $this->documento;
    }

    /**
     * @param string $documento
     */
    public function setDocumento(string $documento)
    {
        $this->documento = $documento;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string)$this->documento . ' - ' . $this->nome;
    }
}