<?php
// Configurazione del database
$host = "aws-0-eu-central-1.pooler.supabase.com";
$port = "6543";
$dbname = "postgres";
$user = "postgres.jfshzxaoiazolfzuzism";
$password = "a4FWImTD4BR9z1vQ";

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$conn) {
    die(json_encode(["success" => false, "message" => "Connessione fallita: " . pg_last_error()]));
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'];

    if (!empty($username)) {
        $query = "DELETE FROM personale WHERE username = $1";
        $result = pg_query_params($conn, $query, array($username));

        if ($result) {
            echo json_encode(["success" => true, "message" => "Utente eliminato con successo"]);
        } else {
            echo json_encode(["success" => false, "message" => "Errore durante l'eliminazione: " . pg_last_error($conn)]);
        }
    } else {
        echo json_encode(["success" => false, "message" => "Username non valido"]);
    }
}

pg_close($conn);
?>
