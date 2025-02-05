<?php
include('functionDb.php');  // Inclusione del file delle funzioni

$db = new Database();
$conn = $db->connesione(); // Connessione al database

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Eseguiamo le azioni in base al pulsante premuto

    if (isset($_GET['query'])) {
        // Esegui la query (ad esempio, SELECT)
        $result = $db->query("SELECT * FROM utenti"); // Cambia con il nome della tua tabella
        $db->stampa($result); // Stampa i risultati della query
    }

    if (isset($_GET['carica'])) {
        // Inserisci dati nel database (ad esempio, aggiungi un utente)
        $nuovoUtente = [
            'nome' => 'Mario',
            'email' => 'mario@example.com'
        ];
        $db->carica('utenti', $nuovoUtente); // Cambia 'utenti' con il nome della tua tabella
    }

    if (isset($_GET['connessione'])) {
        // Connetti al database
        echo "Connessione riuscita.<br>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funzioni Database</title>
</head>
<body>
    <h2>Gestione Database</h2>

    <!-- Pulsante per connettersi al database -->
    <form action="index.php" method="get">
        <button type="submit" name="connessione">Connetti al Database</button>
    </form>

    <!-- Pulsante per eseguire una query (ad esempio SELECT) -->
    <form action="index.php" method="get">
        <button type="submit" name="query">Esegui Query</button>
    </form>

    <!-- Pulsante per caricare nuovi dati (ad esempio un nuovo utente) -->
    <form action="index.php" method="get">
        <button type="submit" name="carica">Carica Nuovo Utente</button>
    </form>

    <br>

    <!-- Form per inserire un id e fare altre operazioni -->
    <form action="index.php" method="get">
        <label for="id">ID</label>
        <input type="number" name="id">
        <button type="submit">Cerca per ID</button>
    </form>

</body>
</html>



