<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
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

    private $endereco;

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

    public function __toString()
    {
        return $this->nome;
    }
}