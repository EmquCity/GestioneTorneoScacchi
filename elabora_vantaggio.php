<?php
    require_once("connection.php");

    $puntiVittoria = 3;
    $puntiPareggio = 1;
    $puntiSconfitta = 0;

    if(isset($_GET['vittoria'], $_GET['giocatore1_id'], $_GET['giocatore2_id'], $_GET['vantaggioPz1'])) {
        $vittoria = $_GET['vittoria'];
        $giocatore1_id = $_GET['giocatore1_id'];
        $giocatore2_id = $_GET['giocatore2_id'];
        $vantaggioPz1 = $_GET['vantaggioPz1'];
        $vantaggioPz2 = $_GET['vantaggioPz2'];

        if ($vittoria == 1) {
            $query = "UPDATE giocatore SET parVinte = parVinte + 1, punti = punti + $puntiVittoria, vantPezzi = vantPezzi + $vantaggioPz1 WHERE idGiocatore = $giocatore1_id;";
            mysqli_query($conn, $query);
            $query = "UPDATE giocatore SET parPerse = parPerse + 1, vantPezzi = vantPezzi + $vantaggioPz2 WHERE idGiocatore = $giocatore2_id";
            mysqli_query($conn, $query);
            header("location: partite.php");
        } elseif ($vittoria == 'X') {
            $query = "UPDATE giocatore SET parPatte =  parPatte + 1, punti = punti + $puntiPareggio, vantPezzi = vantPezzi + $vantaggioPz1 WHERE idGiocatore = $giocatore1_id;";
            mysqli_query($conn, $query);
            $query = "UPDATE giocatore SET parPatte = parPatte + 1, punti = punti + $puntiPareggio, vantPezzi = vantPezzi + $vantaggioPz2 WHERE idGiocatore = $giocatore2_id;";
            mysqli_query($conn, $query);
            header("location: partite.php");
        } elseif($vittoria == 2) {
            $query = "UPDATE giocatore SET parVinte = parVinte + 1, punti = punti + $puntiVittoria, vantPezzi = vantPezzi + $vantaggioPz1 WHERE idGiocatore = $giocatore2_id";
            mysqli_query($conn, $query);
            $query = "UPDATE giocatore SET parPerse = parPerse + 1, vantPezzi = vantPezzi + $vantaggioPz2 WHERE idGiocatore = $giocatore1_id";
            mysqli_query($conn, $query);
            header("location: partite.php");
        }
    }else{
        echo"frocio";
    }
?>
