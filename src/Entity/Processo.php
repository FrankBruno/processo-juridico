<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
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
     * @ORM\Column(name="numero", type="integer", length=11, nullable=false)
     * @var int
     */
    private $numero;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Motivo")
     * @ORM\JoinColumn(name="motivo_id", referencedColumnName="id", nullable=false)
     * @var Motivo
     */
    private $motivo;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Comarca")
     * @ORM\JoinColumn(name="comarca_id", referencedColumnName="id", nullable=false)
     * @var Comarca
     */
    private $comarca;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Situacao")
     * @ORM\JoinColumn(name="situacao_id", referencedColumnName="id", nullable=false)
     * @var Situacao
     */
    private $situacao;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Filial")
     * @ORM\JoinColumn(name="filial_id", referencedColumnName="id", nullable=true)
     * @var Filial
     */
    private $filial;

    /**
     * @var
     */
    private $fabricante;

    /**
     * @var
     */
    private $valorCausa;

    /**
     * @var
     */
    private $valorSentenca;

    /**
     * @var
     */
    private $valorAcordo;

    /**
     * @var
     */
    private $ajuizadoEm;

    /**
     * @var
     */
    private $arquivadoEm;

    /**
     * @var
     */
    private $recebidoEm;

    /**
     * @ORM\Column(name="enviado_nuvem", type="boolean", nullable=true)
     * @var bool
     */
    private $enviadoNuvem = false;

    /**
     * @var Requerente[]
     * @ORM\ManyToMany(targetEntity="App\Entity\Requerente", inversedBy="processos")
     * @ORM\JoinTable(name="processo_requerente")
     */
    private $requerentes;

    public function __construct()
    {
        $this->requerentes =  new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
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
     * @return int
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param int $numero
     */
    public function setNumero(int $numero)
    {
        $this->numero = $numero;
    }

    /**
     * @return mixed
     */
    public function getMotivo()
    {
        return $this->motivo;
    }

    /**
     * @param mixed $motivo
     */
    public function setMotivo($motivo)
    {
        $this->motivo = $motivo;
    }

    /**
     * @return Comarca
     */
    public function getComarca()
    {
        return $this->comarca;
    }

    /**
     * @param Comarca $comarca
     */
    public function setComarca(Comarca $comarca)
    {
        $this->comarca = $comarca;
    }

    /**
     * @return Situacao
     */
    public function getSituacao()
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
     * @return Filial
     */
    public function getFilial()
    {
        return $this->filial;
    }

    /**
     * @param Filial $filial
     */
    public function setFilial(Filial $filial)
    {
        $this->filial = $filial;
    }

    /**
     * @return mixed
     */
    public function getEnviadoNuvem()
    {
        return $this->enviadoNuvem;
    }

    /**
     * @param mixed $enviadoNuvem
     */
    public function setEnviadoNuvem($enviadoNuvem)
    {
        $this->enviadoNuvem = $enviadoNuvem;
    }

    /**
     * @return Requerente[]|ArrayCollection
     */
    public function getRequerentes()
    {
        return $this->requerentes;
    }

    /**
     * @param Requerente[]|ArrayCollection $requerentes
     */
    public function setRequerentes($requerentes)
    {
        $this->requerentes = $requerentes;
    }

    public function __toString()
    {
        return (string) $this->numero;
    }
}