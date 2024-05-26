<!DOCTYPE HTML>
<html>
<?php include("../view/head.php") ?>

<body>
    <?php include("../view/menu.php") ?>
    <div class="row">
        <form method="post" action="../controller/ControllerCadastro.php" id="form" name="form" class="col-10">
            <div class="form-group">
                <input class="form-control" type="text" id="nome" name="nome" placeholder="Nome" required autofocus>
                <input class="form-control" type="text" id="sobrenome" name="sobrenome" placeholder="Sobrenome" required>
                <input class="form-control" type="text" id="cpf" name="cpf" placeholder="CPF" required>
                <input class="form-control" type="number" id="idade" name="idade" placeholder="Idade" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success" id="cadastrar">Cadastrar</button>
            </div>
        </form>
    </div>

    
</body>

</html>
