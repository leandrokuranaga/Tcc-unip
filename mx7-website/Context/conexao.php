<?php

try {
    $conexao = pg_connect("host=localhost port=5432 dbname=mx7 user=postgres password=leandro@123")
        or die('Could not connect: ' . pg_last_error());

    if (!$conexao) {
        echo "cannot connect to the server";
    }
} catch (PDOException $e) {
    print $e->getMessage();
}
