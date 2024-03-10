<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Torneo Scacchi</title>
</head>
<body>
    <div class="container">
        <h1>Tabellone Partite Torneo</h1>
        <a href="index.php"><button type="button" class="btn btn-primary btn-sm" style="margin-top: 10px;">Home Gironi</button></a>

        <?php
        require_once("connection.php");

        // Definisci il numero totale di gironi
        $num_gironi = 8;

        // Loop attraverso i gironi
        for ($girone = 1; $girone <= $num_gironi; $girone++) {
            echo "<div class='mt-4'>";
            echo "<h2>Partite per il girone $girone</h2>";

            // Seleziona tutti i giocatori del girone corrente
            $query = "SELECT * FROM giocatore WHERE girone = $girone";
            $result = mysqli_query($conn, $query);

            // Crea un array per i giocatori del girone corrente
            $giocatori_girone = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $giocatori_girone[] = $row;
            }

            // Genera le partite tra i giocatori del girone corrente
            $num_giocatori = count($giocatori_girone);
            for ($i = 0; $i < $num_giocatori - 1; $i++) {
                for ($j = $i + 1; $j < $num_giocatori; $j++) {
                    $giocatore1 = $giocatori_girone[$i];
                    $giocatore2 = $giocatori_girone[$j];
                    echo "<div class='card mb-2'>";
                    echo "<div class='card-body d-flex justify-content-between align-items-center'>";
                    echo "<h5 class='card-title'>" . $giocatore1['nome'] . " " . $giocatore1['cognome'] . " VS " . $giocatore2['nome'] . " " . $giocatore2['cognome'] . "</h5>";
                    echo "<form action='elabora_vantaggio.php' method='GET'>";
                    echo "<div class='input-group'>";
                    echo "<div class='btn-group' role='group' aria-label='Checkbox vantaggio'>";
                    echo "<input type='checkbox' id='vantaggio1' name='vittoria' value='1'><label for='vantaggio1'>1</label>";
                    echo "<input type='checkbox' id='vantaggioX' name='pareggio' value='X'><label for='vantaggioX'>X</label>";
                    echo "<input type='checkbox' id='vantaggio2' name='sconfitta' value='2'><label for='vantaggio2'>2</label>";
                    echo "<input type='hidden' name='giocatore1_id' value='" . $giocatore1['idGiocatore'] . "'>";
                    echo "<input type='hidden' name='giocatore2_id' value='" . $giocatore2['idGiocatore'] . "'>";    
                    echo "<button type='submit' class='btn btn-primary btn-sm' style='margin-top: 10px; margin-left: 40px'>Aggiorna Risultato</button>";
                    echo "</div>";
                    echo "</form>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
            }
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>
