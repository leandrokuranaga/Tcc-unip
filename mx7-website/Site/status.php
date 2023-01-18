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
    <title>MX7 - Status</title>
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
        <a href="#" class="navbar-brand">MX7 - Status</a>
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
                <li class="nav-item">
                    <a class="nav-link" href="cadastro_moto.php">Cadastrar moto</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="cadastro.php">Cadastrar cliente</a>
                </li>
                <li class="nav-item active">
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
    <form name="status" id="status" method="post" action="status.php">
        <br><br><br>
        <!-- Nome-->
        <div class="component ">
            <div class="form-group">
                <legend> Buscar status da moto </legend>
                <div class="col-md-4">
                    <input id="Nome" name="name" placeholder="Nome do cliente" class="form-control" type="text" />
                </div>
                <div class="col-md-4"> <br>
                    <button type="submit" class="btn btn-primary btn-block">Pesquisar</button>
                </div>
                <form name="status" id="status" method="post" action="status.php">
            </div>
            <div class="Att">
                <legend> Atualizar status da moto </legend>
                <div class="col-md-4">
                    <input id="id" name="id" placeholder="Código da moto" class="form-control" type="number" min="1" />
                </div>
                <br>
                <div class="col-md-4">
                    <select required name='status'>
                        <option disabled="" selected="" style="display:none">Selecione </option>
                        <option value='0'>Manutenção</option>
                        <option value='1'>Pronto</option>
                    </select></td>
                </div>
                <div class=" col-md-2"> <br>
                    <button type="submit" class="btn btn-success btn-sm btn-block">Atualizar</button>
                </div>
            </div>
        </div>

        <?php
        try {
            $name = $_POST['name'];

            $sql = "SELECT users.name, motorcycle.model, motorcycle.id, motorcycle.status FROM users INNER JOIN motorcycle ON
                    users.id = motorcycle.id_owner WHERE name LIKE '%$name%' ";
            $res = pg_exec($conexao, $sql);

            if (pg_num_rows($res) >= 0) { //se tiver resultado cria a tabela

                echo 'Dados do cliente procurado :' . '<br>';
                echo "<table border='3'style='width:30%' padding='25%' >";
                echo "<tr>
                            <td><center>Nome</center></td>"
                    . "<td><center>Moto</center></td>"
                    . "<td><center>Código da moto</center></td>"
                    . "<td><center>Status</center></td>"
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

            $id = $_POST['id'];
            $status = $_POST['status'];

            $up = "UPDATE motorcycle SET status='$status' WHERE id ='$id'  ";

            $res = pg_exec($conexao, $up);

            if ($res > 1) {
                echo "<script>javascript:window.location='status.php';</script>";
            }
        } catch (PDOException $e) {
            print $e->getMessage();
        }
        ?>

        </div>
    </form>
    </form>

    <br>

    <footer>
        <!-- JS -->
        <script src="../public/js/jquery.js"></script>
        <script src="../public/js/bootstrap.bundle.min.js"></script>
    </footer>

</body>

</html>