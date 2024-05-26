<!DOCTYPE HTML>
<html>
    <?php include("../view/Head.php") ?>
    <title>Cadastrar</title>

<body>
    <hr>
    <a href="../view/index.php" class="btn btn-default">Inicio</a>
    <a href="../view/Cadastrar.php" class="btn btn-success">Cadastrar</a>
    <hr>
    <div class="row">
        <form method="post" action="../controller/ControllerCadastrar.php" id="form" name="form" class="col-10">
            <div class="form-group">
                <input class="form-control" type="text" id="nome" name="nome" placeholder="Nome" required autofocus>
                <input class="form-control" type="text" id="cpf" name="cpf" placeholder="CPF" required>
                <input class="form-control" type="number" id="idade" name="idade" placeholder="Idade" required>
                <input class="form-control" type="checkbox" id="ativo" name="ativo" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success" id="cadastrar">Cadastrar</button>
            </div>
        </form>
    </div>

    
</body>

</html>
