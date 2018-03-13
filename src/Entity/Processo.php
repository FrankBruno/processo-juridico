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
     * @ORM\Column(name="numero", type="string", length=50, nullable=false)
     * @var string
     */
    private $numero;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Comarca\Vara")
     * @ORM\JoinColumn(name="vara_id", referencedColumnName="id", nullable=false)
     * @var Vara
     */
    private $vara;

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
     * @ORM\ManyToOne(targetEntity="App\Entity\Situacao")
     * @ORM\JoinColumn(name="situacao_id", referencedColumnName="id", nullable=false)
     * @var Situacao
     */
    private $situacao;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Pessoa")
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


    private $enviadoNuvem = false;


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
    public function getNumero(): ? string
    {
        return $this->numero;
    }

    /**
     * @param string $numero
     */
    public function setNumero(string $numero): void
    {
        $this->numero = $numero;
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
     * @return string
     */
    public function __toString()
    {
        return (string)$this->numero;
    }
}