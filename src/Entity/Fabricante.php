<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Class Fabricante
 * @package App\Entity
 * @ORM\Entity()
 * @ORM\Table(name="fabricante", schema="processo_juridico")
 */
class Fabricante
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(name="id", type="integer", length=11, nullable=false)
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(name="nome", type="string", length=80, nullable=false)
     * @var string
     */
    private $nome;

    /**
     * @ORM\Column(name="descricao", type="string", length=255, nullable=false)
     * @var string
     */
    private $descricao;

    /**
     * @return mixed
     */
    public function getId(): ? int
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
    public function getDescricao(): ? string
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

}