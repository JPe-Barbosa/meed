<?php
    session_start();
    unset($_SESSION['email']);
    unset($_SESSION['nome']);
    unset($_SESSION['sobrenome']);
    unset($_SESSION['telefone']);
    unset($_SESSION['pontos']);

    header('Location: index.php');
?>
