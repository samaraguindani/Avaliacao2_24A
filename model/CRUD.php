<?php

class CRUD {

    protected $sqlite;

    public function __construct() {
        $this->conexao();
    }

    private function conexao() {
        $this->sqlite = new SQLite3('../cadastroPessoa.db');
    }

    public function setPessoa($nome, $cpf, $idade, $ativo) {
        $stmt = $this->sqlite->prepare("INSERT INTO Pessoa (`nome`, `cpf`, `idade`,`ativo`) VALUES (:nome,:cpf,:idade,:ativo)");
       
        $stmt->bindValue(':nome', $nome, SQLITE3_TEXT);
        $stmt->bindValue(':cpf', $cpf, SQLITE3_TEXT);
        $stmt->bindValue(':idade', $idade, SQLITE3_TEXT);
        $stmt->bindValue(':ativo', 1, SQLITE3_INTEGER);

        if ($stmt->execute() == TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function getPessoa() {
        $result = $this->sqlite->query("SELECT * FROM Pessoa");
        $array = array();
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $array[] = $row;
        }
        return $array;
    }

    public function deletePessoa($id) {
        if ($this->sqlite->query("DELETE FROM `Pessoa` WHERE `id` = '" . $id . "';") == TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function pesquisaPessoa($id) {
        $result = $this->sqlite->query("SELECT * FROM Pessoa WHERE id='$id'");
        return $result->fetchArray(SQLITE3_ASSOC);
    }

    public function updatePessoa($id, $nome, $cpf, $idade, $ativo) {
        $stmt = $this->sqlite->prepare("UPDATE `Pessoa` SET `nome` = :nome, `idade`=:idade, `cpf`=:cpf,`ativo`=:ativo  WHERE `id` = :id");
        
        $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
        $stmt->bindValue(':nome', $nome, SQLITE3_TEXT);
        $stmt->bindValue(':cpf', $cpf, SQLITE3_TEXT);
        $stmt->bindValue(':idade', $idade, SQLITE3_TEXT);
        $stmt->bindValue(':ativo', $ativo, SQLITE3_INTEGER);
    
        $myfile = fopen("C:\Users\samil\OneDrive\Documentos\log4.txt", "w+") or die("Unable to open file!");
        fwrite($myfile, $ativo);
        fwrite($myfile, "novo: ");
        fwrite($myfile, $ativo == "on");
        fclose($myfile);
        
        if ($stmt->execute() == TRUE) {
            return true;
        } else {
            return false;
        }
    }
}

?>
