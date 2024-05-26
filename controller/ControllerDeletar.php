<?php

require_once("../model/CRUD.php");

class ControllerDeletar {
    private $deleta;

    public function __construct($id){
        $this->deleta = new CRUD();
        if($this->deleta->deletePessoa($id)== TRUE){
            echo "<script>alert('Pessoa deletado com sucesso!');document.location='../view/index.php'</script>";
        }else{
            echo "<script>alert('Erro ao deletar pessoa!');history.back()</script>";
        }
    }
}
new ControllerDeletar($_GET['id']);
?>
