<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Usuario
 * @package App\Entity
 * @ORM\Entity(repositoryClass="App\Repository\UsuarioRepository")
 * @ORM\Table(name="usuario", schema="processo_juridico")
 */
class Usuario
{

    const ADMIN = 1;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(name="id", type="integer", length=11, nullable=false)
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(name="login", type="string", length=200, nullable=false)
     * @var string
     */
    private $login;

    /**
     * @ORM\Column(name="senha", type="string", length=25, nullable=false)
     * @var string
     */
    private $senha;

    /**
     * @ORM\Column(name="nome", type="string", length=200, nullable=false)
     * @var string
     */
    private $nome;

    /**
     * @ORM\Column(name="ativo", type="boolean", nullable=false)
     * @var bool
     */
    private $ativo = true;

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
    public function getLogin(): ? string
    {
        return $this->login;
    }

    /**
     * @param string $login
     */
    public function setLogin(string $login)
    {
        $this->login = $login;
    }

    /**
     * @return string
     */
    public function getSenha(): ? string
    {
        return $this->senha;
    }

    /**
     * @param string $senha
     */
    public function setSenha(string $senha)
    {
        $this->senha = $senha;
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
     * @return bool
     */
    public function isAtivo(): ? bool
    {
        return $this->ativo;
    }

    /**
     * @param bool $ativo
     */
    public function setAtivo(bool $ativo)
    {
        $this->ativo = $ativo;
    }

    public function __toString()
    {
        return (string)$this->nome;
    }
}