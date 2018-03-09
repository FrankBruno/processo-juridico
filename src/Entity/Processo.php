<?php

namespace App\Entity;

use App\Entity\Comarca\Vara;
use Doctrine\Common\Collections\ArrayCollection as Motivos;
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
     * @ORM\Column(name="numero", type="integer", length=11, nullable=false)
     * @var int
     */
    private $numero;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Motivo")
     * @ORM\JoinTable(
     *     name="processo_motivo",
     *     joinColumns={
     *          @ORM\JoinColumn(name="processo_id", referencedColumnName="id")
     *     },
     *     inverseJoinColumns={
     *          @ORM\JoinColumn(name="motivo_id", referencedColumnName="id")
     *     }
     * )
     * @var Motivos
     */
    private $motivos;

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


    private $requerentes;

    /**
     * @return int
     */
    public function getId():? int
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
    public function getNumero():? int
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
    public function getVara():? Vara
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
    public function getSituacao():? Situacao
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
     * @return string
     */
    public function __toString()
    {
        return (string)$this->numero;
    }
}