<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class TipoDocumento
 * @package App\Entity
 * @ORM\Entity
 * @ORM\Table(name="tipo_documento", schema="processo_juridico")
 */
class TipoDocumento
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(name="id", type="integer", length=1, nullable=false)
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(name="nome", type="string", length=5, nullable=false)
     * @var string
     */
    private $nome;

    /**
     * @return int
     */
    public function getId():? int
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
    public function getNome():? string
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
        return (string)$this->nome;
    }
}