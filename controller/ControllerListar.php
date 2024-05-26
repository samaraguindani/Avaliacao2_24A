<?php
require_once("../model/Banco.php");
class listarController
{

    private $lista;

    public function __construct()
    {
        $this->lista = new Banco();
        $this->criarTabela();
    }

    private function criarTabela()
    {
        $row = $this->lista->getPessoa();
        foreach ($row as $value) {
            echo "<tr>";
            echo "<th>" . $value['nome'] . "</th>";
            echo "<td>" . $value['sobrenome'] . "</td>";
            echo "<td>" . $value['idade'] . "</td>";
            echo "<td>" . $value['cpf'] . "</td>";
            echo "<td>" . $value['flag'] = ($value['flag'] == "0") ? "Desativado" : "Ativado" . "</td>";
            echo "<td><a class='btn btn-warning' href='editar.php?id=" . $value['nome'] . "'>Editar</a><a class='btn btn-danger' href='../controller/ControllerDeletar.php?id=" . $value['nome'] . "'>Excluir</a></td>";
            echo "</tr>";
        }
    }
}
