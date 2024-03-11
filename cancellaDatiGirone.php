<?php
    require_once("connection.php");

    for($i = 1; $i<=5; $i++){
        $query = "UPDATE giocatore SET parVinte = 0, parPerse = 0, parPatte = 0, vantPezzi = 0, punti = 0 WHERE idGiocatore = $i;";
        $result = mysqli_query($conn, $query);
    }

    header("location: index.php");
?>