<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Classificacao
 * @package App\Entity
 * @ORM\Entity()
 * @ORM\Table(name="classificacao", schema="processo_juridico")
 */
class Classificacao
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(name="id", type="integer", length=11, nullable=false)
     * @var int $id
     */
    private $id;

    /**
     * @ORM\Column(name="nome", type="string", length=80, nullable=false)
     * @var string
     */
    private $nome;

    /**
     * @ORM\Column(name="provisao", type="decimal", precision=7, scale=2)
     * @var float
     */
    private $provisao;

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
    public function setId(int $id): void
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
    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    /**
     * @return float
     */
    public function getProvisao(): ? float
    {
        return $this->provisao;
    }

    /**
     * @param float $provisao
     */
    public function setProvisao(float $provisao): void
    {
        $this->provisao = $provisao;
    }

    public function __toString()
    {
        return (string)"$this->nome ($this->provisao)";
    }
}