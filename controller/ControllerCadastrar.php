<?php
require_once("../model/Pessoa.php");

class ControllerCadastrar{

    private $cadastro;

    public function __construct(){
        $this->cadastro = new Pessoa();
        $this->incluir();
    }

    private function incluir(){
        $this->cadastro->setNome($_POST['nome']);
        $this->cadastro->setIdade($_POST['idade']);
        $this->cadastro->setCpf($_POST['cpf']);
        $this->cadastro->isAtivo($_POST['ativo']);
        $result = $this->cadastro->incluir();
        if($result >= 1){
            echo "<script>alert('Pessoa cadastrada com sucesso!');document.location='../view/Cadastrar.php'</script>";
        }else{
            echo "<script>alert('Erro ao cadastrar pessoa!');history.back()</script>";
        }
    }
}

new ControllerCadastrar();
