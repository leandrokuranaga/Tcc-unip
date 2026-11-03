<?php

require_once '../Context/conexao.php';
session_start();
if (!isset($_SESSION['email']) and !isset($_SESSION['senha'])) {
    header("Location: index.php");
    exit;
}
?>

<!doctype html>
<html>

<head>
    <title>MX7 - Cadastro</title>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title> MX7 </title>

    <link rel="shortcut icon" type="image/png" href="../public/img/favicon.png" />
    <!-- Tag usada para colocar o ícone que fica ao lado do nome da página no navegador -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- TAg usada para acentuação na página HTML  -->
    <link href="../public/CSS/style.css" rel="stylesheet" type="text/css" media="screen" />
    <!-- Aqui chamamos o arquivo estilo.css da pasta "CSS"   -->
    <link rel="stylesheet" href="../public/css/estilo.css">
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <!-- CSS -->
    <link href="../public/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../public/css/style.css">

</head>

<body class="fundo">

    <nav class="navbar navbar-expand-lg fixed-top bg-danger navbar-dark">
        <a href="#" class="navbar-brand">MX7 - Cadastro</a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- links -->
        <div id="menu" class="collapse navbar-collapse">
            <!-- alinha a direita-->
            <ul class="navbar-nav ml-md-auto ">
                <li class="nav-item">
                    <a class="nav-link" href="home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cadastro_moto.php">Cadastrar moto</a>
                </li>
                <li class="nav-item active ">
                    <a class="nav-link" href="cadastro.php">Cadastrar cliente</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="status.php">Status</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="historico.php">Histórico</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="orcamento.php">Orçamento</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Logout.php">Sair</a>
                </li>
            </ul>
        </div>

    </nav>
    <br /><br /><br />

    <form action="../Context/gravar.php" method="POST">
        <fieldset id="fieldset">
            <legend> Cadastro de cliente </legend>
            <div class="col-md-2">
                <input id="cadastro_nome" name="name" placeholder="Coloque o nome do cliente" class="form-control" type="text" required />
            </div>
            <div class="col-md-2">
                <input id="cadastro_email" name="email" placeholder="Coloque o email do cliente" class="form-control" type="email" required />
            </div>
            <div class="col-md-2">
                <input id="senha" name="senha" placeholder="Senha Provisória" minlength="6" class="form-control" type="password" required />
                <p>Necessário 6 caracteres para a senha</p>
            </div>
            <div>
                <input type="checkbox" name="adm" value="1">Deseja que este seja administrador?<br>
            </div>
            <div class=" col-md-2"> <br>
                <button type="submit" class="btn btn-primary btn-block">Cadastrar</button>
            </div>
        </fieldset>
    </form>
    <?php
    try {
        if (!empty($_POST["adm"])) {
            $sql = "";
        }
    } catch (PDOException $e) { }
    ?>
    <footer>
        <!-- JS -->
        <script src="../public/js/jquery.js"></script>
        <script src="../public/js/bootstrap.bundle.min.js"></script>
    </footer>

</body>

</html>