<?php
session_start();
require_once '../Context/conexao.php';
error_reporting(0);

try {

    $adm = pg_escape_string($conexao, trim($_POST['adm']));
    $name = pg_escape_string($conexao, trim($_POST['name']));
    $email = pg_escape_string($conexao, trim($_POST['email']));
    $senha = pg_escape_string($conexao, trim(md5($_POST['senha'])));
    
    $sql = "INSERT INTO users(name, email, password, admin) VALUES('$name','$email','$senha','$adm' )";
    $sql1 = "INSERT INTO users(name, email, password) VALUES('$name','$email','$senha' )";
    $res = pg_exec($conexao, $sql);
    $res1 = pg_exec($conexao, $sql1);

    if($res >= 0){
            echo '<script>alert("Usuario criado"); </script>';
            echo "<script>javascript:window.location='../Site/home.php';</script>";    
       }
    
} catch (PDOException $e) {
    print $e->getMessage();
}
?>