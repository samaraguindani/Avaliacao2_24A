<?php

require_once("../model/CRUD.php");

class Pessoa extends CRUD {

    private $nome;
    private $cpf;
    private $idade;
    private $ativo;

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function getIdade() {
        return $this->idade;
    }

    public function setIdade($idade) {
        $this->idade = $idade;
    }

    public function isAtivo() {
        return $this->ativo;
    }

    public function setAtivo($ativo) {
        $this->ativo = $ativo;
    }

    public function incluir() {
        return $this->setPessoa($this->getNome(), $this->getCpf(), $this->getIdade(), $this->isAtivo());
    }
}

?>
