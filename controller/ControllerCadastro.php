<?php
require_once("../model/Pessoa.php");
class cadastroController{

    private $cadastro;

    public function __construct(){
        $this->cadastro = new Pessoa();
        $this->incluir();
    }

    private function incluir(){
        $this->cadastro->setNome($_POST['nome']);
        $this->cadastro->setSobrenome($_POST['sobrenome']);
        $this->cadastro->setIdade($_POST['idade']);
        $this->cadastro->setCpf($_POST['cpf']);
        $result = $this->cadastro->incluir();
        if($result >= 1){
            echo "<script>alert('Registro incluído com sucesso!');document.location='../view/cadastro.php'</script>";
        }else{
            echo "<script>alert('Erro ao gravar registro!, verifique se a pessoa não está duplicada');history.back()</script>";
        }
    }
}
new cadastroController();
