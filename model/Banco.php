<?php

//require_once("../init.php");

class Banco {

    protected $sqlite;

    public function __construct() {
        $this->conexao();
    }

    private function conexao() {
        $this->sqlite = new SQLite3('../SQLITEDB.db');
    }

    public function setPessoa($nome, $sobrenome, $cpf, $idade) {
        $stmt = $this->sqlite->prepare("INSERT INTO pessoa (`nome`, `sobrenome`, `cpf`, `idade`,`flag`) VALUES (:nome,:sobrenome,:cpf,:idade,:flag)");
       
        $stmt->bindValue(':nome', $nome, SQLITE3_TEXT);
        $stmt->bindValue(':sobrenome', $sobrenome, SQLITE3_TEXT);
        $stmt->bindValue(':cpf', $cpf, SQLITE3_INTEGER);
        $stmt->bindValue(':idade', $idade, SQLITE3_INTEGER);
        $stmt->bindValue(':flag', 1, SQLITE3_INTEGER);

        if ($stmt->execute() == TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function getPessoa() {
        $result = $this->sqlite->query("SELECT * FROM pessoa");
        $array = array();
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $array[] = $row;
        }
        return $array;
    }

    public function deletePessoa($id) {
        if ($this->sqlite->query("DELETE FROM `pessoa` WHERE `nome` = '" . $id . "';") == TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function pesquisaPessoa($id) {
        $result = $this->sqlite->query("SELECT * FROM pessoa WHERE nome='$id'");
        return $result->fetchArray(SQLITE3_ASSOC);
    }

    public function updatePessoa($nome, $sobrenome, $cpf, $idade, $flag, $id) {
        $stmt = $this->sqlite->prepare("UPDATE `pessoa` SET `nome` = :nome, `sobrenome`=:sobrenome, `idade`=:idade, `cpf`=:cpf,`flag`=:flag  WHERE `nome` = :id");
        $stmt->bindValue(':nome', $nome, SQLITE3_TEXT);
        $stmt->bindValue(':sobrenome', $sobrenome, SQLITE3_TEXT);
        $stmt->bindValue(':cpf', $cpf, SQLITE3_INTEGER);
        $stmt->bindValue(':idade', $idade, SQLITE3_INTEGER);
        $stmt->bindValue(':flag', $flag, SQLITE3_INTEGER);
        $stmt->bindValue(':id', $id, SQLITE3_TEXT);
        if ($stmt->execute() == TRUE) {
            return true;
        } else {
            return false;
        }
    }

}

?>
