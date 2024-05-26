<?php
require_once("../model/CRUD.php");
class listarController{

    private $lista;

    public function __construct()
    {
        $this->lista = new CRUD();
        $this->criarTabela();
    }

    private function criarTabela()
    {
        $row = $this->lista->getPessoa();
        foreach ($row as $value) {
            echo "<tr>";
                echo "<th>" . $value['nome'] . "</th>";
                echo "<td>" . $value['idade'] . "</td>";
                echo "<td>" . $value['cpf'] . "</td>";
                echo "<td>" . (($value['ativo'] == "1") ? "<input type='checkbox' checked disabled>" : "<input type='checkbox' disabled>") . "</td>";
                echo "<td><a class='btn__acao' href='Editar.php?id=" . $value['id'] . "'>Editar</a><a class='btn__acao' href='../controller/ControllerDeletar.php?id=" . $value['id'] . "'>Excluir</a></td>";
            echo "</tr>";
        }
    }
}
