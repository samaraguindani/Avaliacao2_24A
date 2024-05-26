<!DOCTYPE HTML>
<html>
    <?php include("../view/Head.php") ?>
    <title>Cadastrar</title>

<body>
    <nav class="nav__container">
        <p class="nav__titulo">Cadastros</p>
        <a href="../view/Cadastrar.php" class="btn__nav">Cadastrar</a>
    </nav>
    
    <hr>
    
    <div class="row">
        <form method="post" action="../controller/ControllerCadastrar.php" id="form" name="form" class="col-10">
            <div class="form-group">
                <input class="form-control" type="text" id="nome" name="nome" placeholder="Nome" required autofocus>
                <input class="form-control" type="text" id="cpf" name="cpf" placeholder="CPF" required>
                <input class="form-control" type="date" id="idade" name="idade" placeholder="Idade" required>
                <input class="form-control" type="checkbox" id="ativo" name="ativo" checked>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success" id="cadastrar">Cadastrar</button>
            </div>
        </form>
    </div>
</body>

</html>
