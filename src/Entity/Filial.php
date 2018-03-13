<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Filial
 * @package App\Entity
 * @ORM\Entity()
 * @ORM\Table(name="filial", schema="processo_juridico")
 */
class Filial
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(name="id", type="integer", length=11, nullable=false)
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(name="numero", type="smallint", nullable=false)
     * @var string
     */
    private $numero;

    /**
     * @ORM\Column(name="cnpj", type="string", length=18, nullable=true)
     * @var string
     */
    private $cnpj;

    /**
     * @ORM\Column(name="descricao", type="string", length=255, nullable=true)
     * @var string
     */
    private $descricao;

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
    public function setNumero(string $numero)
    {
        $this->numero = $numero;
    }

    /**
     * @return string
     */
    public function getCnpj(): ? string
    {
        return $this->cnpj;
    }

    /**
     * @param string $cnpj
     */
    public function setCnpj(string $cnpj)
    {
        $this->cnpj = $cnpj;
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

    public function __toString()
    {
        return (string)$this->numero . ' - ' . $this->cnpj;
    }
}