<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Uf
 * @package App\Entity
 * @ORM\Entity()
 * @ORM\Table(name="uf", schema="processo_juridico")
 */
class Uf
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(name="id", type="integer", length=11, nullable=false)
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(name="sigla", type="string", length=2, nullable=false)
     * @var string
     */
    private $sigla;

    /**
     * @ORM\Column(name="nome", type="string", length=50, nullable=false)
     * @var string
     */
    private $nome;

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
    public function getSigla(): ? string
    {
        return $this->sigla;
    }

    /**
     * @param string $sigla
     */
    public function setSigla(string $sigla)
    {
        $this->sigla = $sigla;
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
     * @return string
     */
    public function __toString()
    {
        return (string)$this->sigla . ' - ' . $this->nome;
    }
}