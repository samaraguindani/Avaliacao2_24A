<?php
require_once("../model/CRUD.php");

class ControllerDeletar {
    private $deleta;

    public function __construct($id){
        $this->deleta = new CRUD();
        if($this->deleta->deletePessoa($id) == TRUE){
            echo "<script>alert('Pessoa deletada com sucesso!');document.location='../view/index.php'</script>";
        } else {
            echo "<script>alert('Erro ao deletar pessoa!');history.back()</script>";
        }
    }
}

if (isset($_GET['id'])) {
    if (isset($_GET['confirm']) && $_GET['confirm'] == 'yes') {
        new ControllerDeletar($_GET['id']);
    } else {
        $id = $_GET['id'];
        echo "
        <script>
            if (confirm('Você tem certeza que deseja deletar esta pessoa?')) {
                window.location.href = 'ControllerDeletar.php?id=$id&confirm=yes';
            } else {
                history.back();
            }
        </script>";
    }
} else {
    echo "<script>alert('ID inválido!');history.back()</script>";
}
?>
