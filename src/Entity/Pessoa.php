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
     * @ORM\Column(type="string", length=18, nullable=false, unique=true)
     * @var string
     */
    private $documento;

    /**
     * @ORM\Column(name="nome_tratamento", type="string", length=80, nullable=true)
     * @var string
     */
    private $nomeTratamento;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Processo", mappedBy="requerentes")
     * @ORM\JoinTable(name="processo_requerente", joinColumns={@ORM\JoinColumn(name="id", referencedColumnName="pessoa_id")})
     * @var Processo[]
     */
    private $processosRequerentes;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Processo", mappedBy="requeridos")
     * @ORM\JoinTable(name="processo_requerente", joinColumns={@ORM\JoinColumn(name="id", referencedColumnName="pessoa_id")})
     * @var Processo[]
     */
    private $processosRequeridos;

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
    public function getNomeTratamento(): ? string
    {
        return $this->nomeTratamento ?? '';
    }

    /**
     * @param string $nomeTratamento
     */
    public function setNomeTratamento(string $nomeTratamento = null)
    {
        $this->nomeTratamento = $nomeTratamento;
    }

    /**
     * @return Processo[]
     */
    public function getProcessosRequerentes()
    {
        return $this->processosRequerentes;
    }

    /**
     * @return Processo[]
     */
    public function getProcessosRequeridos()
    {
        return $this->processosRequeridos;
    }

    public function getNomeVisualizacao(): string
    {
        return $this->nomeTratamento ?? $this->nome;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string)$this->documento . ' - ' . ($this->nomeTratamento ?? $this->nome);
    }
}