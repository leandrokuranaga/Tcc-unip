<?php

require_once '../Context/conexao.php';
session_start();
if (!isset($_SESSION['email']) and !isset($_SESSION['senha'])) {
    header("Location: index.php");
    exit;
}

error_reporting(0);
?>
<!DOCTYPE html>
<html>

<head>
    <title>MX7 - Página Inicial</title>

    <meta charset="utf-8">

    <!-- CSS -->
    <link href="../public/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../public/css/style.css">
    <link rel="shortcut icon" type="image/png" href="../public/img/favicon.png" />

</head>

<body class="fundo">
    <div class="container">
        <nav class="navbar navbar-expand-lg fixed-top bg-danger navbar-dark">
            <a href="#" class="navbar-brand">MX7 - Home</a>

            <button class="navbar-toggler" data-toggle="collapse" data-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- links -->
            <div id="menu" class="collapse navbar-collapse">
                <!-- alinha a direita-->
                <ul class="navbar-nav ml-md-auto ">
                    <li class="nav-item active">
                        <a class="nav-link" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
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
        <!-- teste do Gabriel -->
        <div class="content">
            <br><br><br><br>
            <?php
            try {
                $sql_users = "SELECT id, name, email FROM users";

                $result = pg_query($conexao, $sql_users);

                echo 'Clientes cadastrados';

                if (pg_num_rows($result) > 0) { //se tiver resultado cria a tabela, porem se nao tiver cadastrado um serviço nao aparece o usuario
                    echo "<table border='3'style='width:75%' padding='35%' >";
                    echo "<tr>
                           <td>ID cliente</td>"
                        . "<td>Nome</td>"
                        . "<td>Email </td>"
                        . "</tr>"; // Fechamos o cabeçalho.
                }

                while ($fetch = pg_fetch_row($result)) {

                    echo "<tr>
                           <td> $fetch[0] </td>"
                        . "<td>$fetch[1] </td>"
                        . "<td>$fetch[2] </td>"
                        . "</tr>";
                }
            } catch (PDOException $e) { }
            ?>

            <?php
            $sql_users2 = "SELECT users.id, users.name, users.email, motorcycle.id, motorcycle.model FROM users
                            INNER JOIN motorcycle ON motorcycle.id_owner = users.id
                            ORDER BY users.id";

            $resultMoto = pg_query($conexao, $sql_users2);

            if (pg_num_rows($resultMoto) > 0) {

                echo "<table border='3'style='width:75%' padding='35%' >";

                echo 'Clientes com suas motos cadastradas';
                echo "<tr>
                       <td><center>ID cliente</center></td>"
                    . "<td><center>Nome</center></td>"
                    . "<td><center>Email</center></td>"
                    . "<td><center>Código moto</center></td>"
                    . "<td><center>Moto</center></td>"
                    . "</tr>";
            }
            while ($fetch = pg_fetch_row($resultMoto)) {

                echo "<tr>
                       <td><center>$fetch[0]</center></td>"
                    . "<td><center>$fetch[1]</center></td>"
                    . "<td><center>$fetch[2]</center></td>"
                    . "<td><center>$fetch[3]</center></td>"
                    . "<td><center>$fetch[4]</center></td>"
                    . "</tr>";
            }

            ?>
        </div>
    </div>
    <footer>
        <!-- JS -->
        <script src="../public/js/jquery.js"></script>
        <script src="../public/js/bootstrap.bundle.min.js"></script>
    </footer>

</body>

</html>