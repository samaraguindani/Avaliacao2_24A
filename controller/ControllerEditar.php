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
        $this->ativo = $row['ativo'] == 1 ? 1 : 0;
    }

    public function editarFormulario($id, $nome, $cpf, $idade, $ativo) {
        if (!$this->validaCPF($cpf)) {
            echo "<script>alert('CPF inválido!');history.back()</script>";
            return;
        }

        if (!$this->validaIdade($idade)) {
            echo "<script>alert('A idade deve ser maior que 14 anos!');history.back()</script>";
            return; 
        }
        
        if ($this->editar->updatePessoa($id, $nome, $cpf, $idade, $ativo) == TRUE) {
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

    function validaCPF($cpf) {
        $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
        
        if (strlen($cpf) != 11) {
            return false;
        }

        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }
        return true;
    }

    function validaIdade($dataNascimento) {
        $dataNascimento = new DateTime($dataNascimento);
        $dataAtual = new DateTime();
        $idade = $dataAtual->diff($dataNascimento)->y;

        return $idade >= 14;
    }

}

$id = filter_input(INPUT_GET, 'id');
$editar = new ControllerEditar($id);
if (isset($_POST['submit'])) {
    $editar->editarFormulario($_POST['id'], $_POST['nome'], $_POST['cpf'], $_POST['idade'], $_POST['ativo']);
}
?>
