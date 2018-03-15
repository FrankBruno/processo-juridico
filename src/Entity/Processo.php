<?php

namespace App\Entity;

use App\Entity\Comarca\Vara;
use Doctrine\Common\Collections\ArrayCollection as Motivos;
use Doctrine\Common\Collections\ArrayCollection as Requerentes;
use Doctrine\Common\Collections\ArrayCollection as Requeridos;
use Doctrine\ORM\Mapping as ORM;


/**
 * Class Processo
 * @package App\Entity
 * @ORM\Entity()
 * @ORM\Table(name="processo", schema="processo_juridico")
 */
class Processo
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(name="id", type="integer", length=11, nullable=false)
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(name="codigo", type="string", length=50, nullable=false, unique=true)
     * @var string
     */
    private $codigo;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Comarca\Vara")
     * @ORM\JoinColumn(name="vara_id", referencedColumnName="id", nullable=false)
     * @var Vara
     */
    private $vara;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Situacao")
     * @ORM\JoinColumn(name="situacao_id", referencedColumnName="id", nullable=false)
     * @var Situacao
     */
    private $situacao;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Motivo")
     * @ORM\JoinTable(
     *     name="processo_motivo",
     *     joinColumns={
     *          @ORM\JoinColumn(name="processo_id", referencedColumnName="id", nullable=false)
     *     },
     *     inverseJoinColumns={
     *          @ORM\JoinColumn(name="motivo_id", referencedColumnName="id", nullable=false)
     *     }
     * )
     * @var Motivos
     */
    private $motivos;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Pessoa", inversedBy="processosRequerentes")
     * @ORM\JoinTable(
     *     name="processo_requerente",
     *     joinColumns={
     *          @ORM\JoinColumn(name="processo_id", referencedColumnName="id", nullable=false)
     *     },
     *     inverseJoinColumns={
     *          @ORM\JoinColumn(name="pessoa_id", referencedColumnName="id", nullable=false)
     *     }
     * )
     * @var Requerentes
     */
    private $requerentes;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Pessoa")
     * @ORM\JoinTable(
     *     name="processo_requerido",
     *     joinColumns={
     *          @ORM\JoinColumn(name="processo_id", referencedColumnName="id", nullable=false)
     *     },
     *     inverseJoinColumns={
     *          @ORM\JoinColumn(name="pessoa_id", referencedColumnName="id", nullable=false)
     *     }
     * )
     * @var Requeridos
     */
    private $requeridos;


    private $usuarioCriacao;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Pessoa")
     * @ORM\JoinColumn(name="filial_id", referencedColumnName="id", nullable=true)
     * @var Pessoa
     */
    private $filial;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Fabricante")
     * @ORM\JoinColumn(name="fabricante_id", referencedColumnName="id", nullable=true)
     * @var Fabricante
     */
    private $fabricante;

    /**
     * @ORM\Column(name="valor_causa", type="decimal", precision=11, scale=2, nullable=false)
     * @var float
     */
    private $valorCausa;

    /**
     * @ORM\Column(name="valor_sentenca", type="decimal" ,precision=11, scale=2, nullable=true)
     * @var float
     */
    private $valorSentenca;

    /**
     * @ORM\Column(name="valor_acordo", type="decimal", precision=11, scale=2, nullable=true)
     * @var float
     */
    private $valorAcordo;

    /**
     * @ORM\Column(name="criado_em", type="date", nullable=false)
     * @var \DateTime
     */
    private $criadoEm;

    /**
     * @ORM\Column(name="ajuizado_em", type="date", nullable=true)
     * @var \DateTime
     */
    private $ajuizadoEm;

    /**
     * @ORM\Column(name="recebido_em", type="date", nullable=true)
     * @var \DateTime
     */
    private $recebidoEm;

    /**
     * @ORM\Column(name="arquivado_em", type="date", nullable=true)
     * @var \DateTime
     */
    private $arquivadoEm;

    /**
     * @var bool
     */
    private $enviadoNuvem = false;

    public function __construct()
    {
        $this->criadoEm = new \DateTime();
    }

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
    public function getCodigo(): ? string
    {
        return $this->codigo;
    }

    /**
     * @param string $codigo
     */
    public function setCodigo(string $codigo): void
    {
        $this->codigo = $codigo;
    }

    /**
     * @return mixed
     */
    public function getMotivos()
    {
        return $this->motivos;
    }

    /**
     * @param Motivos $motivos
     */
    public function setMotivos(Motivos $motivos)
    {
        $this->motivos = $motivos;
    }

    /**
     * @return Vara
     */
    public function getVara(): ? Vara
    {
        return $this->vara;
    }

    /**
     * @param Vara $vara
     */
    public function setVara(Vara $vara)
    {
        $this->vara = $vara;
    }

    /**
     * @return Situacao
     */
    public function getSituacao(): ? Situacao
    {
        return $this->situacao;
    }

    /**
     * @param Situacao $situacao
     */
    public function setSituacao(Situacao $situacao)
    {
        $this->situacao = $situacao;
    }

    /**
     * @return Motivos
     */
    public function getRequerentes()
    {
        return $this->requerentes;
    }

    /**
     * @return string
     */
    public function getListaRequerentes()
    {
        $lista = '';

        $this->requerentes->map(function(Pessoa $requerente) use (&$lista) {
            $lista .= $requerente->getDocumento() . ' - '. $requerente->getNomeVisualizacao() . ', ';
        });

        return trim($lista, ', ');
    }

    public function getListaRequeridos()
    {
        $lista = '';

        $this->requeridos->map(function(Pessoa $requerido) use (&$lista) {
            $lista .= $requerido->getDocumento() . ' - '. $requerido->getNomeVisualizacao() . ', ';
        });

        return trim($lista, ', ');
    }

    /**
     * @param Motivos $requerentes
     */
    public function setRequerentes(Requerentes $requerentes): void
    {
        $this->requerentes = $requerentes;
    }

    /**
     * @return Requerentes
     */
    public function getRequeridos()
    {
        return $this->requeridos;
    }

    /**
     * @param Requerentes $requeridos
     */
    public function setRequeridos(Requeridos $requeridos): void
    {
        $this->requeridos = $requeridos;
    }

    /**
     * @return Pessoa
     */
    public function getFilial(): ? Pessoa
    {
        return $this->filial;
    }

    public function getFilialVisualizacao()
    {
        return $this->filial ? $this->filial->getNomeVisualizacao() : '';
    }

    /**
     * @param Pessoa|null $filial
     */
    public function setFilial(Pessoa $filial = null)
    {
        $this->filial = $filial;
    }

    /**
     * @return Fabricante
     */
    public function getFabricante(): ? Fabricante
    {
        return $this->fabricante;
    }

    /**
     * @param Fabricante $fabricante
     */
    public function setFabricante(Fabricante $fabricante)
    {
        $this->fabricante = $fabricante;
    }

    /**
     * @return float
     */
    public function getValorCausa(): ? float
    {
        return $this->valorCausa;
    }

    /**
     * @param float $valorCausa
     */
    public function setValorCausa(float $valorCausa)
    {
        $this->valorCausa = $valorCausa;
    }

    /**
     * @return float
     */
    public function getValorSentenca(): ? float
    {
        return $this->valorSentenca;
    }

    /**
     * @param float $valorSentenca
     */
    public function setValorSentenca(float $valorSentenca)
    {
        $this->valorSentenca = $valorSentenca;
    }

    /**
     * @return float
     */
    public function getValorAcordo(): ? float
    {
        return $this->valorAcordo;
    }

    /**
     * @param float $valorAcordo
     */
    public function setValorAcordo(float $valorAcordo)
    {
        $this->valorAcordo = $valorAcordo;
    }

    /**
     * @return \DateTime
     */
    public function getCriadoEm(): ? \DateTime
    {
        return $this->criadoEm;
    }

    /**
     * @param \DateTime $criadoEm
     */
    public function setCriadoEm(\DateTime $criadoEm)
    {
        $this->criadoEm = $criadoEm;
    }

    /**
     * @return \DateTime
     */
    public function getAjuizadoEm(): ? \DateTime
    {
        return $this->ajuizadoEm;
    }

    /**
     * @param \DateTime $ajuizadoEm
     */
    public function setAjuizadoEm(\DateTime $ajuizadoEm)
    {
        $this->ajuizadoEm = $ajuizadoEm;
    }

    /**
     * @return \DateTime
     */
    public function getRecebidoEm(): ? \DateTime
    {
        return $this->recebidoEm;
    }

    /**
     * @param \DateTime $recebidoEm
     */
    public function setRecebidoEm(\DateTime $recebidoEm)
    {
        $this->recebidoEm = $recebidoEm;
    }

    /**
     * @return \DateTime
     */
    public function getArquivadoEm(): ? \DateTime
    {
        return $this->arquivadoEm;
    }

    /**
     * @param \DateTime $arquivadoEm
     */
    public function setArquivadoEm(\DateTime $arquivadoEm)
    {
        $this->arquivadoEm = $arquivadoEm;
    }

    /**
     * @return bool
     */
    public function isEnviadoNuvem(): ? bool
    {
        return $this->enviadoNuvem;
    }

    /**
     * @param bool $enviadoNuvem
     */
    public function setEnviadoNuvem(bool $enviadoNuvem)
    {
        $this->enviadoNuvem = $enviadoNuvem;
    }

    /**
     * @return Usuario
     */
    public function getUsuarioCriacao(): ? Usuario
    {
        return $this->usuarioCriacao;
    }

    /**
     * @param Usuario $usuarioCriacao
     */
    public function setUsuarioCriacao(Usuario $usuarioCriacao)
    {
        $this->usuarioCriacao = $usuarioCriacao;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string)$this->codigo;
    }
}