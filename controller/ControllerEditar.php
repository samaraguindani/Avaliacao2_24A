<?php

require_once("../model/banco.php");

class editarController {

    private $editar;
    private $nome;
    private $sobrenome;
    private $cpf;
    private $idade;
    private $flag;

    public function __construct($id) {
        $this->editar = new Banco();
        $this->criarFormulario($id);
    }

    private function criarFormulario($id) {
        $row = $this->editar->pesquisaPessoa($id);
        $this->nome = $row['nome'] ?? ' ';
        $this->sobrenome = $row['sobrenome'] ?? ' ';
        $this->cpf = $row['cpf'] ?? ' ';
        $this->idade = $row['idade'] ?? ' ';
        $this->flag = $row['flag'] ?? ' ';
    }

    public function editarFormulario($nome, $sobrenome, $cpf, $idade, $flag, $id) {
        if ($this->editar->updatePessoa($nome, $sobrenome, $cpf, $idade,$flag, $id) == TRUE) {
            echo "<script>alert('Registro incluído com sucesso!');document.location='../view/index.php'</script>";
        } else {
            echo "<script>alert('Erro ao gravar registro!');history.back()</script>";
        }
    }

    public function getNome() {
        return $this->nome;
    }

    public function getSobrenome() {
        return $this->sobrenome;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function getIdade() {
        return $this->idade;
    }

    public function getFlag() {
        return $this->flag;
    }

}

$id = filter_input(INPUT_GET, 'id');
$editar = new editarController($id);
if (isset($_POST['submit'])) {
    $editar->editarFormulario($_POST['nome'], $_POST['sobrenome'], $_POST['cpf'], $_POST['idade'], $_POST['flag'], $_POST['id']);
}
