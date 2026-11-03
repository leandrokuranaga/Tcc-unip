<?php

require_once '../Context/conexao.php';
session_start();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title> MX7 - Autenticação </title>

    <link rel="shortcut icon" type="image/png" href="../public/img/favicon.png" />
    <!-- Tag usada para colocar o ícone que fica ao lado do nome da página no navegador -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- TAg usada para acentuação na página HTML  -->
    <link href="../public/CSS/style.css" rel="stylesheet" type="text/css" media="screen" />
    <!-- Aqui chamamos o arquivo estilo.css da pasta "CSS"   -->
    <link rel="stylesheet" href="../public/css/estilo.css">
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/css/style.css">

</head>

<body class="fundo">
    <div class="container">
        <div class="login" align="center">
            <img cl src="../public/img/favicon.png" class="img-fluid" />
            <form action="../Context/login.php" name="FormularioCadastro" id="FormularioCadastro" method="post">
                <div class="form-group"></div>

                <br />
                <div class="form-login-headin">
                    <h2 class="title-login">Digite seu login</h2>

                    <div class="panel-body">
                        <form method="post">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"> <i class="glyphicon glyphicon-user" style="width: auto"></i>
                                    </span> <input id="email" type="email" class="form-control" name="email" placeholder="Usuário" required="" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"> <i class="glyphicon glyphicon-lock" style="width: auto"></i>
                                    </span> <input id="senha" type="password" class="form-control" name="senha" placeholder="Senha" required="" />
                                </div>
                            </div>
                            <!-- BOTAO-->
                            <div>
                                <input class="btn btn-lg btn-block btn-primary btn-entrar" type="submit" value="Entrar" />
                            </div>

                    </div>
                </div>
            </form>
        </div>
    </div>

    <footer>
        <!-- JS -->
        <script src="../public/js/jquery.js"></script>
        <script src="../public/js/bootstrap.bundle.min.js"></script>
    </footer>


</body>

</html>