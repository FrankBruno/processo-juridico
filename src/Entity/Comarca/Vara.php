<?php

namespace App\Entity\Comarca;

use App\Entity\Comarca;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Vara
 * @package App\Entity
 * @ORM\Entity()
 * @ORM\Table(name="comarca_vara", schema="processo_juridico")
 */
class Vara
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Comarca", inversedBy="varas")
     * @ORM\JoinColumn(name="comarca_id", referencedColumnName="id", nullable=false)
     * @var Comarca $comarca
     */
    private $comarca;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function __toString()
    {
        return (string)$this->getComarca() . ' - ' . $this->nome;
    }

    /**
     * @return Comarca
     */
    public function getComarca()
    {
        return $this->comarca;
    }

    /**
     * @param mixed $comarca
     */
    public function setComarca($comarca)
    {
        $this->comarca = $comarca;
    }
}