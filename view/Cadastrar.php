<!DOCTYPE HTML>
<html>
    <?php include("../view/Head.php") ?>
    <title>Cadastrar</title>

<body>
    <nav class="nav__container">
        <p class="nav__titulo">Cadastros</p>
        <a href="../view/index.php" class="btn__nav">Inicio</a>
    </nav>
    
    <hr>
    
    <form method="post" action="../controller/ControllerCadastrar.php" id="form" name="form">
        <div class="form__container">
            <label for="nome">Nome:</label>
            <input class="form-control" type="text" id="nome" name="nome" placeholder="Nome" required autofocus>

            <label for="nome">CPF:</label>
            <input class="form-control" type="text" id="cpf" name="cpf" placeholder="CPF" required>

            <label for="nome">Idade:</label>
            <input class="form-control" type="date" id="idade" name="idade" placeholder="Idade" required>

            <input class="form-control" type="checkbox" id="ativo" name="ativo" checked>
        </div>
        <div class="form__btn">
            <button type="submit" class="btn btn-success" id="cadastrar">Cadastrar</button>
        </div>
    </form>
</body>

</html>
