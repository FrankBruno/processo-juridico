<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
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
     * @ORM\Column(name="nome", type="string", length=80, nullable=false)
     * @var string
     */
    private $nome;

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
    public function getSigla()
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
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }
}