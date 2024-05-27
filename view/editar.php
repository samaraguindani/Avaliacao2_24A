<!DOCTYPE HTML>
<html>
    <?php include("../view/Head.php"); ?>
    <title>Editar</title>
    <body>
        <?php require_once("../controller/ControllerEditar.php"); ?>

        <nav class="nav__container">
            <p class="nav__titulo">Cadastros</p>
            <a href="../view/Cadastrar.php" class="btn__nav">Cadastrar</a>
            <a href="../view/index.php" class="btn__nav">Inicio</a>
        </nav>

        <hr>
        <form method="post" action="../controller/ControllerEditar.php?id=<?php echo $id; ?>" id="form" name="form">
            <div class="form__container">
                <label for="nome">Nome:</label>
                <input class="form-control" type="text" id="nome" name="nome" value="<?php echo $editar->getNome(); ?>" required autofocus>

                <label for="cpf">CPF:</label>
                <input class="form-control" type="text" id="cpf" name="cpf" value="<?php echo $editar->getCpf(); ?>" required>

                <label for="idade">Data de Nascimento:</label>
                <input class="form-control" type="date" id="idade" name="idade" value="<?php echo $editar->getIdade(); ?>" required>

                <label for="ativo">Ativo:</label>
                <input class="form-control" type="checkbox" id="ativo" name="ativo" <?php echo ($editar->getAtivo() == 1) ? "checked" : ""; ?>>
            </div>
            <div class="form__btn">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <button type="submit" class="btn btn-success" id="editar" name="submit" value="editar">Editar</button> 
            </div>
        </form>
    </body>
</html>
