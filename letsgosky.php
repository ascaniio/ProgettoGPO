<?php
// Parametri di connessione
$host = "database-1.cjw0a4a6epjg.us-east-1.rds.amazonaws.com"; // Endpoint del database
$username = "briganterosso"; // Nome utente master
$password = "briganterosso2025"; // Sostituisci con la tua password
$database = ""; // Nome del database (inserisci se disponibile, oppure specifica un database successivamente)
$port = 3306; // Porta predefinita di MySQL

// Creazione della connessione
$conn = new mysqli($host, $username, $password, $database, $port);

// Verifica della connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
} else {
    echo "Connessione riuscita!";
}

// Chiudi la connessione
$conn->close();
?> 