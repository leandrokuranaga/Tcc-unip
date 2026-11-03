<?php

session_start();

unset($_SESSION['email']);
unset($_SESSION['senha']);

session_destroy();
echo "<script>javascript:window.location='index.php';</script>";
