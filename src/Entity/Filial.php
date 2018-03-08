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
     * @ORM\Column(name="numero", type="integer", length=20, nullable=false)
     * @var int
     */
    private $numero;

    /**
     * @ORM\Column(name="descricao", type="string", length=200, nullable=false)
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
        return $this->numero . '-' . $this->descricao;
    }
}