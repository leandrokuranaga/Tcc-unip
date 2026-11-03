<?php

require_once '../Context/conexao.php';
session_start();
error_reporting(0);
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

        <a href="#" class="navbar-brand">MX7 - Cadastro moto</a>

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
                <li class="nav-item active ">
                    <a class="nav-link" href="cadastro_moto.php">Cadastrar moto</a>
                </li>

                <li class="nav-item ">
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
    <form name="historico" id="historico" method="post" action="cadastro_moto.php">
        <br />
        <!-- Nome-->
        <div class="form-group">
            <legend>Adicionar Moto</legend>
            <div class="col-md-2">
                <input id="id" name="id" placeholder="id do cliente" class="form-control" type="number" min="1" required />
            </div>
            <div class="col-md-2">
                <input id="modelo" name="modelo" placeholder="Modelo" class="form-control" type="text" required />
            </div>

            <div class=" col-md-2"> <br>
                <button type="submit" class="btn btn-primary btn-block">Adicionar</button>
            </div>
        </div>

        <?php
        try {

            $id = pg_escape_string($conexao, trim($_POST['id']));
            $modelo = pg_escape_string($conexao, trim($_POST['modelo']));


            $sql = "INSERT INTO motorcycle (id_owner, model) VALUES ('$id','$modelo') ";

            $res = pg_exec($conexao, $sql);

            if ($res > 0) {
                echo '<script>alert("Moto adicionada para o cliente !"); </script>';
            }

            $sql_users = "SELECT id, name, email FROM users";

            $result = pg_query($conexao, $sql_users);

            echo 'Clientes cadastrados';

            if (pg_num_rows($result) > 0) { //se tiver resultado cria a tabela, porem se nao tiver cadastrado um serviço nao aparece o usuario
                echo "<table border='3'style='width:30%' padding='20%' >";
                echo "<tr>
                    <td><center>ID cliente</center></td>"
                    . "<td><center>Nome</center></td>"
                    . "<td><center>Email</center></td>"
                    . "</tr>"; // Fechamos o cabeçalho.
            }
            while ($fetch = pg_fetch_row($result)) {

                echo "<tr>
                        <td><center>$fetch[0]</center></td>"
                    . "<td><center>$fetch[1]</center></td>"
                    . "<td><center>$fetch[2]</center></td>"
                    . "</tr>";
            }

            $sql_moto = "SELECT id, id_owner, model FROM motorcycle
            ORDER BY id_owner";

            $moto = pg_query($conexao, $sql_moto);

            if (pg_num_rows($moto) > 0) { //se tiver resultado cria a tabela, porem se nao tiver cadastrado um serviço nao aparece o usuario

                echo "<table border='3'style='width:25%' padding='100%' ; >";
                echo 'Motos cadastradas';
                echo "<tr>
                      <td><center>Codigo moto</center></td>"
                    . "<td><center>Codigo cliente </center></td>"
                    . "<td><center>Modelo</center></td>"
                    . "</tr>"; // Fechamos o cabeçalho.
            }

            while ($fetch = pg_fetch_row($moto)) {

                echo "<tr>
                      <td><center>$fetch[0]</center></td>"
                    . "<td><center>$fetch[1]</center></td>"
                    . "<td><center>$fetch[2]</center></td>"
                    . "</tr>";
            }
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        ?>
        <br />

        <footer>
            <!-- JS -->
            <script src="../public/js/jquery.js"></script>
            <script src="../public/js/bootstrap.bundle.min.js"></script>
        </footer>

</body>

</html>