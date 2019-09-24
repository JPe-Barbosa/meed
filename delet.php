<?php
session_start();
include_once 'conexao.php';
    $sql = "DELETE FROM usuarios WHERE ID = :i";    

    $query = $conn->prepare($sql);

    $query->bindParam(':i', $_SESSION['id']);

    $query->execute();
    
    echo"<script>window.location='logout.php'</script>";
    //header('Location: index.php');
?>