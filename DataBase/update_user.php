<?php
// Configurazione del database
$host = "aws-0-eu-central-1.pooler.supabase.com";
$port = "6543";
$dbname = "postgres";
$user = "postgres.jfshzxaoiazolfzuzism";
$password = "a4FWImTD4BR9z1vQ";

// Connessione al database
$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$conn) {
    die("Connessione fallita: " . pg_last_error());
}

// Ottieni i dati dall'input JSON
$data = json_decode(file_get_contents('php://input'), true);

// Prepara la query di aggiornamento
$query = "UPDATE personale SET nome = $1, cognome = $2, email = $3, ruolo = $4 WHERE username = $5";
$params = array($data['nome'], $data['cognome'], $data['email'], $data['ruolo'], $data['username']);

$result = pg_query_params($conn, $query, $params);

if ($result) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => pg_last_error($conn)]);
}

// Chiudi la connessione
pg_close($conn);
?>
