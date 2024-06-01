<?php require_once ("../controller/ControllerListar.php"); ?>
<!DOCTYPE html>
<html lang="pt-br">
<?php include ("../view/Head.php"); ?>

<body>
    <nav class="nav__container">
        <p class="nav__titulo">Cadastros</p>
        <a href="../view/Cadastrar.php" class="btn__nav">Cadastrar</a>
    </nav>
    
    <hr>

    <p class="paragrafo">Dados de Pessoas</p>

    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Idade</th>
                <th>CPF</th>
                <th>Ativo1</th>
                <th>Ativo</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php new listarController(); ?>

        </tbody>
    </table>
</body>

</html>