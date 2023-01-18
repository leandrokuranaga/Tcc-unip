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
    <title>MX7 - Orçamento</title>
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
        <a href="#" class="navbar-brand">MX7 - Orçamento</a>
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
                <li class="nav-item">
                    <a class="nav-link" href="status.php">Status</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="historico.php">Histórico</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="orcamento.php">Orçamento</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Logout.php">Sair</a>
                </li>
            </ul>
        </div>

    </nav>
    <form name="status" id="status" method="post" action="orcamento.php">
        <br><br><br>
        <!-- Nome-->
        <div class="component">
            <div class="form-group">
                <legend>Adicionar Orçamento</legend>
                <div class="col-md-4">
                    <input id="id" name="id" placeholder="id do cliente" class="form-control" type="number" min="1" />
                </div>
                <div class="col-md-4">
                    <input id="idmoto" name="idmoto" placeholder="id da moto" class="form-control" type="number" min="1" />
                </div>
                <div class="col-md-4">
                    <input id="preco" name="preco" placeholder="Preço" class="form-control" type="number" step=".01" />
                </div>
                <div class="col-md-4">
                    <input id="item" name="item" placeholder="Item" class="form-control" type="text" />
                </div>
                <div class=" col-md-4"> <br>
                    <button type="submit" class="btn btn-primary btn-block">Adicionar</button>
                </div>
            </div>
            <div class="Att">
                <legend> Deletar Orçamento</legend>
                <br>
                <div class="col-md-4">
                    <?php
                    $status = $_POST['status'];
                    ?>

                    <select name='status'>
                        <option disabled="" selected="" style="display:none">Selecione o código da moto</option>

                        <?php
                        $users = "SELECT motorcycle.id FROM motorcycle
                           INNER JOIN users ON motorcycle.id_owner = users.id
                           ORDER BY motorcycle.id";

                        $result = pg_query($conexao, $users);

                        while ($row = pg_fetch_row($result)) {
                            ?>
                            <option value="<?php echo $row[0] ?>"><?php echo $row[0] ?></option>
                        <?php }

                        ?>
                    </select></td>
                    <div> <br>
                        <button type="submit" class="btn btn-primary btn-block">Deletar</button>
                    </div>
                </div>

                <br><br><br><br><br>
            </div>
            <div>
                <?php
                try {

                    $id = pg_escape_string($conexao, trim($_POST['id']));
                    $idmoto = pg_escape_string($conexao, trim($_POST['idmoto']));
                    $preco = pg_escape_string($conexao, trim($_POST['preco']));
                    $item = pg_escape_string($conexao, trim($_POST['item']));

                    $sql_users2 = "SELECT users.id, users.name, motorcycle.id, motorcycle.model FROM users
                           INNER JOIN motorcycle ON motorcycle.id_owner = users.id
                           ORDER BY users.name";

                    $resultMoto = pg_query($conexao, $sql_users2);

                    if (pg_num_rows($resultMoto) > 0) {

                        echo "<table border='3'style='width:60%' padding='35%' >";

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

                    $sql_users2 = "SELECT budget.id_users, budget.id_motorcycle, budget.component, budget.price FROM budget
                           ORDER BY budget.id_users";


                    $resultMoto = pg_query($conexao, $sql_users2);

                    if (pg_num_rows($resultMoto) > 0) {

                        echo "<table border='3'style='width:60%' padding='35%' >";

                        echo 'Tabela de orçamento';
                        echo "<tr>
                       <td><center>Código do cliente</center></td>"
                            . "<td><center>Código da moto</center></td>"
                            . "<td><center>Peça</center></td>"
                            . "<td><center>Preço</center></td>"
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

                    $sql = "INSERT INTO budget (id_users, id_motorcycle, price, component) VALUES ('$id','$idmoto','$preco','$item') ";

                    $res = pg_exec($conexao, $sql);

                    if ($res > 0) {
                        echo '<script>alert("Orçamento adicionado"); </script>';
                        echo "<script>javascript:window.location='orcamento.php';</script>";
                    }

                    $option = isset($_POST['status']) ? $_POST['status'] : false;

                    if ($option) {

                        $delete = "DELETE FROM budget WHERE id_motorcycle = '$option'";

                        $resultt = pg_query($delete);
                        $cmdtuple = pg_affected_rows($resultt);
                    }
                    if ($cmdtuple > 0) {
                        echo '<script>alert("Orçamento deletado"); </script>';;
                        echo "<script>javascript:window.location='orcamento.php';</script>";
                    }
                } catch (PDOException $e) {
                    print $e->getMessage();
                }
                ?>
            </div>
    </form>
    <br>

    <footer>
        <!-- JS -->
        <script src="../public/js/jquery.js"></script>
        <script src="../public/js/bootstrap.bundle.min.js"></script>
    </footer>

</body>

</html>