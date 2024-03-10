<?php
require_once("connection.php");

$puntiVittoria = 3;
$puntiPareggio = 1;
$puntiSconfitta = 0;

if (isset($_GET['vittoria'], $_GET['giocatore1_id'], $_GET['giocatore2_id'])) {
    $vittoria = $_GET['vittoria'];
    $giocatore1_id = $_GET['giocatore1_id'];
    $giocatore2_id = $_GET['giocatore2_id'];

    //query da sostituire per aggiunta game vinti: "UPDATE giocatore SET parVinte = 1, punti = punti + 3 WHERE idGiocatore = 1"

    if ($vittoria == 1) {
        $query = "UPDATE giocatore SET parVinte = 1, punti = punti + $puntiVittoria WHERE idGiocatore = $giocatore1_id";
        mysqli_query($conn, $query);
        $query = "UPDATE giocatore SET parPerse = 1 WHERE idGiocatore = $giocatore2_id";
        mysqli_query($conn, $query);
        header("location: partite.php");
    } elseif ($vittoria == 'X') {
        $query = "UPDATE giocatore SET parPatte = 1, punti = punti + $puntiPareggio WHERE idGiocatore IN ($giocatore1_id, $giocatore2_id)";
        mysqli_query($conn, $query);
        header("location: partite.php");
    } else {
        $query = "UPDATE giocatore SET parVinte = 1, punti = punti + $puntiVittoria WHERE idGiocatore = $giocatore2_id";
        mysqli_query($conn, $query);
        $query = "UPDATE giocatore SET parPerse = 1 WHERE idGiocatore = $giocatore1_id";
        mysqli_query($conn, $query);
        header("location: partite.php");
    }
}
?>
