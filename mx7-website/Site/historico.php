<?php

require_once "../Context/conexao.php";
session_start();
error_reporting(0);
if (!isset($_SESSION['email']) and !isset($_SESSION['senha'])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>MX7 - Histórico</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/png" href="../public/img/favicon.png" />
    <title> MX7 </title>

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
        <a href="#" class="navbar-brand">MX7 - Histórico</a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- links -->
        <div id="menu" class="collapse navbar-collapse">
            <!-- alinha a direita-->
            <ul class="navbar-nav ml-md-auto ">
                <li class="nav-item ">
                    <a class="nav-link" href="home.php">Home</a>
                </li>
                <li class="nav-item ">
                <li class="nav-item">
                    <a class="nav-link" href="cadastro_moto.php">Cadastrar moto</a>
                </li>
                <a class="nav-link" href="cadastro.php">Cadastrar cliente</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="status.php">Status</a>
                </li>
                <li class="nav-item active">
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
    <form name="historico" id="historico" method="post" action="historico.php">
        <br><br><br>
        <!-- Nome-->
        <div class="form-group">
            <legend>Adicionar histórico do cliente</legend>
            <div class="col-md-2">
                <input id="id" name="id" placeholder="id do cliente" class="form-control" type="number" min="1" required />
            </div>
            <div class="col-md-2">
                <input id="idmoto" name="idmoto" placeholder="id da moto" class="form-control" type="number" min="1" required />
            </div>

            <div class="col-md-3">
                <input id="service" name="service" placeholder="Serviço realizado" class="form-control" type="text" required />
            </div>
            <div class=" col-md-2"> <br>
                <button type="submit" class="btn btn-primary btn-block">Adicionar</button>
            </div>
        </div>
        <?php
        try {

            $sql = "SELECT id_moto, id_owner, service, date FROM maintenance
            ORDER BY id_moto ";

            $res = pg_exec($conexao, $sql);

            if (pg_num_rows($res) >= 0) { //se tiver resultado cria a tabela

                echo 'Histórico dos clientes' . '<br>';
                echo "<table border='3'style='width:%' padding='25%' >";
                echo "<tr>
               <td><center>Código do cliente</center></td>"
                    . "<td><center>Código da moto</center></td>"
                    . "<td><center>Serviço</center></td>"
                    . "<td><center>Data do serviço</center></td>"
                    . "</tr>"; // Fechamos o cabeçalho.
            }
            while ($linha = pg_fetch_array($res)) {

                echo "<tr>
               <td><center>$linha[0]</center></td>"
                    . "<td><center>$linha[1]</center></td>"
                    . "<td><center>$linha[2]</center></td>"
                    . "<td><center>$linha[3]</center></td>"
                    . "</tr>";
            }


            $sql_users2 = "SELECT users.id, users.name, motorcycle.id, motorcycle.model FROM users
            INNER JOIN motorcycle ON motorcycle.id_owner = users.id
            ORDER BY users.id";
            $resultMoto = pg_query($conexao, $sql_users2);

            if (pg_num_rows($resultMoto) > 0) {

                echo "<table border='3'style='width:30%' padding='35%' >";

                echo 'Clientes com suas motos cadastradas';
                echo "<tr>
                        <td><center>ID cliente</center></td>"
                    . "<td><center>Nome</center></td>"
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
                    . "</tr>";
            }
            $id = pg_escape_string($conexao, trim($_POST['id']));
            $idmoto = pg_escape_string($conexao, trim($_POST['idmoto']));
            $service = pg_escape_string($conexao, trim($_POST['service']));

            $sql = "INSERT INTO maintenance (id_owner, id_moto, service) VALUES ('$id','$idmoto','$service') ";

            $res = pg_exec($conexao, $sql);

            if ($res > 0) {
                echo '<script>alert("Serviço adicionado ao historico"); </script>';
                echo "<script>javascript:window.location='historico.php';</script>";
            }
        } catch (PDOException $e) {
            print $e->getMessage();
        }
        ?>
    </form>

    <br>

    <footer>
        <!-- JS -->
        <script src="../public/js/jquery.js"></script>
        <script src="../public/js/bootstrap.bundle.min.js"></script>
    </footer>

</body>

</html>