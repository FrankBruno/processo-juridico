<?php

namespace App\Entity;

use App\Entity\Comarca\Vara;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Comarca
 * @package App\Entity
 * @ORM\Entity()
 * @ORM\Table(name="comarca", schema="processo_juridico")
 */
class Comarca
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(name="id", type="integer", length=11, nullable=false)
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(name="nome", type="string", length=120, nullable=false)
     * @var string
     */
    private $nome;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Uf", cascade={"persist"})
     * @ORM\JoinColumn(name="uf_id", referencedColumnName="id", nullable=false)
     * @var Uf
     */
    private $uf;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Comarca\Vara", mappedBy="comarca", cascade={"persist","remove"}, orphanRemoval=true)
     * @var Vara[]
     */
    private $varas;

    /**
     * Comarca constructor.
     */
    public function __construct()
    {
        $this->varas = new ArrayCollection();
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
     * @return Uf
     */
    public function getUf(): ? Uf
    {
        return $this->uf;
    }

    /**
     * @param Uf $uf
     */
    public function setUf(Uf $uf)
    {
        $this->uf = $uf;
    }

    /**
     * @return ArrayCollection|Vara[]
     */
    public function getVaras()
    {
        return $this->varas ?: 'sdf asd';
    }

    /**
     * @param ArrayCollection|Vara[] $varas
     */
    public function setVaras(ArrayCollection $varas)
    {
        $this->varas = $varas;
    }

    public function __toString()
    {
        return (string)$this->nome . ' ('.$this->uf->getSigla() .')';
    }

    private function addVara(Vara $vara)
    {
        $this->varas->add($vara);
    }

    private function removeVara(Vara $vara)
    {
        $this->varas->remove($vara);
    }
}