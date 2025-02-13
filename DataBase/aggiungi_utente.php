<?php
// Configurazione database
$host = "aws-0-eu-central-1.pooler.supabase.com";
$port = "6543";
$dbname = "postgres";
$user = "postgres.jfshzxaoiazolfzuzism";
$password = "a4FWImTD4BR9z1vQ"; // Inserisci la password corretta

// Connessione al database
$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$conn) {
    die("Connessione fallita: " . pg_last_error());
}

// Controlla se il form è stato inviato
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = pg_escape_string($conn, $_POST["username"]);
    $nome = pg_escape_string($conn, $_POST["nome"]);
    $cognome = pg_escape_string($conn, $_POST["cognome"]);
    $email = pg_escape_string($conn, $_POST["email"]);
    $ruolo = pg_escape_string($conn, $_POST["ruolo"]);

    // Query per l'inserimento
    $query = "INSERT INTO personale (username, nome, cognome, email, ruolo) VALUES ('$username', '$nome', '$cognome', '$email', '$ruolo')";
    $result = pg_query($conn, $query);

    if ($result) {
        // Rispondi con un messaggio di successo
        echo "Salvato con successo!";
    } else {
        // Rispondi con un messaggio di errore
        echo "Errore nell'inserimento: " . pg_last_error($conn);
    }
}

pg_close($conn);
?>
