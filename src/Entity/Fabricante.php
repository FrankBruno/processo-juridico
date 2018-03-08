<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
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
     * @ORM\Column(name="nome", type="string", length=255, nullable=false)
     * @var string
     */
    private $nome;

    /**
     * @ORM\Column(name="documento", type="string", length=18, nullable=true)
     * @var string
     */
    private $documento;

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
    public function getDocumento()
    {
        return $this->documento;
    }

    /**
     * @param string $documento
     */
    public function setDocumento(string $documento)
    {
        $this->documento = $documento;
    }
}