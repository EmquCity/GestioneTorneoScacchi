<?php
    require_once("connection.php");

    $nome = $_GET['nome'];
    $cognome = $_GET['cognome'];
    $eta = $_GET['eta'];
    $nickname = $_GET['nickname'];
    $girone = $_GET['girone'];

    $query = "INSERT INTO giocatore (nome, cognome, eta, nickname, girone) VALUES ('$nome', '$cognome', $eta, '$nickname', $girone)";
    $result = mysqli_query($conn, $query);

    header("location: index.php");
?>