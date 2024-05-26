<?php

require_once("../model/Banco.php");

class Pessoa extends Banco {

    private $nome;
    private $sobrenome;
    private $cpf;
    private $idade;
    private $flag;

//Metodos Set
    public function setNome($string) {
        $this->nome = $string;
    }

    public function setSobrenome($string) {
        $this->sobrenome = $string;
    }

    public function setIdade($string) {
        $this->idade = $string;
    }

    public function setCpf($string) {
        $this->cpf = $string;
    }

    public function setFlag($string) {
        $this->flag = $string;
    }

//Metodos Get
    public function getNome() {
        return $this->nome;
    }

    public function getSobrenome() {
        return $this->sobrenome;
    }

    public function getIdade() {
        return $this->idade;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function getFlag() {
        return $this->flag;
    }

    public function incluir() {
        return $this->setPessoa($this->getNome(), $this->getSobrenome(), $this->getCpf(), $this->getIdade());
    }

}

?>
