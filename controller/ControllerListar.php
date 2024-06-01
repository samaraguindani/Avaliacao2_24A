<?php
require_once("../model/CRUD.php");

class listarController {
    private $lista;

    public function __construct() {
        $this->lista = new CRUD();
        $this->criarTabela();
    }

    private function criarTabela() {
        $row = $this->lista->getPessoa();
        foreach ($row as $value) {
            echo "<tr>";
                echo "<td>" . $value['nome'] . "</td>";
                echo "<td>" . $this->calcularIdade($value['idade']) . " anos".  "</td>";
                echo "<td>" . $this->formatarCPF($value['cpf']) . "</td>";
                echo "<td>" . (($value['ativo'] == 1) ? "<input type='checkbox' checked disabled>" : "<input type='checkbox' disabled>") . "</td>";
                echo "<td><a class='btn__acao' href='Editar.php?id=" . $value['id'] . "'>Editar</a><a class='btn__acao' href='../controller/ControllerDeletar.php?id=" . $value['id'] . "'> | Excluir</a></td>";
            echo "</tr>";
        }
    }

    private function formatarCPF($cpf) {
        $cpf = preg_replace('/[^0-9]/', '', $cpf);
        return preg_replace('/(\d{3})(\d{3})(\d{3})(\d{2})/', '\1.\2.\3-\4', $cpf);
    }

    private function calcularIdade($data_nascimento) {
        $data_nascimento = new DateTime($data_nascimento);
        $hoje = new DateTime();
        $idade = $hoje->diff($data_nascimento)->y;
        return $idade;
    }
}
?>
