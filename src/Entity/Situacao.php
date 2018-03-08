<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Situacao
 * @package App\Entity
 * @ORM\Entity()
 * @ORM\Table(name="situacao", schema="processo_juridico")
 */
class Situacao
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(name="id", type="integer", length=11, nullable=false)
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(name="nome", type="string", length=35, nullable=false)
     * @var string
     */
    private $nome;

    /**
     * @ORM\Column(name="descricao", type="string", length=120, nullable=false)
     * @var string
     */
    private $descricao;

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
     * @return string
     */
    public function getNome()
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
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @param string $descricao
     */
    public function setDescricao(string $descricao)
    {
        $this->descricao = $descricao;
    }

    public function __toString()
    {
        return $this->nome;
    }
}