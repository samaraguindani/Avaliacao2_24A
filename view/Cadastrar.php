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
            <label for="nome" class="form__input">Nome:</label>
            <input class="form__input" type="text" id="nome" name="nome" placeholder="Nome" required autofocus>

            <label for="nome" class="form__input">CPF:</label>
            <input class="form__input" type="number" id="cpf" name="cpf" placeholder="CPF" required>

            <label for="nome" class="form__input">Idade:</label>
            <input class="form__input" type="date" id="idade" name="idade" placeholder="Idade" required>

            <div class="div__ativo">
                <label for="ativo" class="ativo__form">Ativo:</label>
                <input class="check" type="checkbox" id="ativo" name="ativo" checked>
            </div>

        </div>
        <div class="form__btn">
            <button type="submit" class="btn__form" id="cadastrar">Cadastrar</button>
        </div>
    </form>
</body>

</html>
