<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Torneo Scacchi</title>
</head>
<body>
    <h1 style='margin-bottom: 30px';>Torneo Scacchi - Dashboard</h1>
    <a href="insertPlayerIndex.php"><button type="button" class="btn btn-primary btn-sm" style="margin-bottom: 20px;">Inserimento Giocatore</button></a>
    <a href="partite.php"><button type="button" class="btn btn-primary btn-sm" style="margin-bottom: 20px; margin-left: 10px;">Visualizza Tabellone Partite</button></a>
    <a href="cancellaDatiGirone.php"><button type="button" class="btn btn-primary btn-sm" style="background-color: red; margin-bottom: 20px; margin-left: 10px;">Pulisci Tabellone</button></a>

    <?php
        require_once("connection.php");

        // Recupera i giocatori dai gironi ordinati per punti
        $query = "SELECT * FROM giocatore ORDER BY punti DESC, girone";
        $result = mysqli_query($conn, $query);

        // Array associativo per raggruppare i giocatori per girone
        $giocatori_per_girone = array();
        while($row = mysqli_fetch_assoc($result)) {
            $girone = $row['girone'];
            $giocatori_per_girone[$girone][] = $row;
        }

        // Stampa le tabelle per i gironi
        for($i = 1; $i <= 8; $i++) {
            echo "<h2>Girone $i</h2>";
            echo "<table class='table'>";
            echo "<thead><tr><th>Nome</th><th>Cognome</th><th>Età</th><th>Nickname</th><th>Partite Vinte</th><th>Partite Perse</th><th>Patta</th><th>Pezzi guadagnati</th><th>Punti</th></tr></thead>";
            echo "<tbody>";
            if(isset($giocatori_per_girone[$i])) {
                foreach($giocatori_per_girone[$i] as $giocatore) {
                    echo "<tr>";
                    echo "<td>" . $giocatore['nome'] . "</td>";
                    echo "<td>" . $giocatore['cognome'] . "</td>";
                    echo "<td>" . $giocatore['eta'] . "</td>";
                    echo "<td>" . $giocatore['nickname'] . "</td>";
                    echo "<td>" . $giocatore['parVinte'] . "</td>";
                    echo "<td>" . $giocatore['parPerse'] . "</td>";
                    echo "<td>" . $giocatore['parPatte'] . "</td>";
                    echo "<td>" . $giocatore['vantPezzi'] . "</td>";
                    echo "<td>" . $giocatore['punti'] . "</td>";
                    echo "</tr>";
                }
            }
            echo "</tbody>";
            echo "</table>";
        }
    ?>
</body>
</html>
