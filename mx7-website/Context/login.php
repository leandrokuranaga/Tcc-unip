<?php
require_once '../Context/conexao.php';
error_reporting(0);
try {

    session_start();

    $email =  $_POST['email'];
    $senha = md5($_POST['senha']);
    $query = "SELECT * FROM users WHERE email = '$email' AND password= '$senha' AND admin='true'";

    $result = pg_query($conexao, $query);
    $verificar = pg_num_rows($result);

    if ($verificar == 1) {
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;
        echo "<script>javascript:window.location='../Site/home.php';</script>";
    } else {
        if ($verificar == 0) {
            echo '<script>alert("Usuario e/ou Senha invalidos"); </script>';
            echo "<script>javascript:window.location='../Site/index.php';</script>";
        }
    }
} catch (PDOException  $e) {

    print $e->getMessage();
}
