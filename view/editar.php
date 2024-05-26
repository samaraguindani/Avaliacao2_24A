<!DOCTYPE HTML>
<html>
    <?php include("../view/Head.php") ?>
    <title>Editar</title>

<body>
    <?php require_once("../controller/ControllerEditar.php");?>
    <hr>
    <a href="../view/index.php" class="btn btn-default">Inicio</a>
    <a href="../view/Cadastrar.php" class="btn btn-success">Cadastrar</a>
    <hr>
    <div class="row">
        <form method="post" action="../controller/ControllerEditar.php" id="form" name="form" return false;" class="col-10">
            <div class="form-group">
                <input class="form-control" type="text" id="nome" name="nome" value="<?php echo $editar->getNome(); ?>" required autofocus>
                <input class="form-control" type="text" id="cpf" name="cpf" value="<?php echo $editar->getCpf(); ?>" required>
                <input class="form-control" type="number" id="idade" name="idade" value="<?php echo $editar->getIdade(); ?>" required>
                <input class="form-control" type="checkbox" id="idade" name="idade" value="<?php echo $editar->getIdade(); ?>" required>
                <!-- <select name="flag">
                    <?php $c = $editar->getFlag();?>
                    <option value="<?php echo $editar->getFlag();?>"><?php echo  ($editar->getFlag()== 0)? "Desativado" :"Ativado" ?></option>
                    <option value="<?php echo ($c == 0)? "1" : "0" ?>"><?php echo ($editar->getFlag()!= 0)? "Desativado" :"Ativado" ?></option>
                </select> -->
            </div>
            <div class="form-group">
                <input type="hidden" name="id" value="<?php echo $editar->getNome();?>">
                <button type="submit" class="btn btn-success" id="editar" name="submit" value="editar">Editar</button>
            </div>
        </form>
    </div>
     
</body>

</html>
