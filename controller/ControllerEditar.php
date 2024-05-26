<?php

require_once("../model/CRUD.php");

class ControllerEditar {

    private $editar;
    private $nome;
    private $cpf;
    private $idade;
    private $ativo;

    public function __construct($id) {
        $this->editar = new CRUD();
        $this->criarFormulario($id);
    }

    private function criarFormulario($id) {
        $row = $this->editar->pesquisaPessoa($id);
        $this->nome = $row['nome'] ?? ' ';
        $this->cpf = $row['cpf'] ?? ' ';
        $this->idade = $row['idade'] ?? ' ';
        $this->flag = $row['ativo'] ?? ' ';
    }

    public function editarFormulario($id, $nome, $cpf, $idade, $flag) {
        if ($this->editar->updatePessoa($id, $nome, $cpf, $idade, $flag) == TRUE) {
            echo "<script>alert('Pessoa editada com sucesso!');document.location='../view/index.php'</script>";
        } else {
            echo "<script>alert('Erro ao editar!');history.back()</script>";
        }
    }

    public function getNome() {
        return $this->nome;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function getIdade() {
        return $this->idade;
    }

    public function getAtivo() {
        return $this->ativo;
    }

}

$id = filter_input(INPUT_GET, 'id');
$editar = new ControllerEditar($id);
if (isset($_POST['submit'])) {
    $editar->editarFormulario($_POST['id'], $_POST['nome'], $_POST['cpf'], $_POST['idade'], $_POST['ativo']);
}
