
<?php
require '../vendor/autoload.php';
//$projectUrl = 'https://zwbptclllcjpfgewhmmb.supabase.co'; // Sostituisci con il tuo URL Supabase
//$apiKey = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6Inp3YnB0Y2xsbGNqcGZnZXdobW1iIiwicm9sZSI6ImFub24iLCJpYXQiOjE3Mzg0MDg5MDQsImV4cCI6MjA1Mzk4NDkwNH0.rNIV6oiI69Ag-UGYt3SuOLSb7mtdE-OtTOwHt2ydoRY'; // Sostituisci con la tua chiave API

use vendor\supabase;

// Impostazioni
$projectUrl = 'https://zwbptclllcjpfgewhmmb.supabase.co'; 
$apiKey = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6Inp3YnB0Y2xsbGNqcGZnZXdobW1iIiwicm9sZSI6ImFub24iLCJpYXQiOjE3Mzg0MDg5MDQsImV4cCI6MjA1Mzk4NDkwNH0.rNIV6oiI69Ag-UGYt3SuOLSb7mtdE-OtTOwHt2ydoRY'; // Sostituisci con la tua chiave API

try {
    // Inizializza il client
    $supabase = new SupabaseClient($projectUrl, $apiKey);

    // Recupera i dati da una tabella
    $table = 'menu_items'; // Sostituisci con il nome della tua tabella
    $response = $supabase->from($table)->select('*')->execute();

    // Controlla se la risposta è corretta
    if ($response['status_code'] === 200) {
        // Se la risposta è corretta, visualizza i dati
        echo "<pre>";
        echo "Dati recuperati dalla tabella '$table':\n";
        echo json_encode($response['data'], JSON_PRETTY_PRINT);
        echo "</pre>";
    } else {
        // Se la risposta non è corretta, mostra il messaggio di errore
        echo "Errore: " . $response['status_code'] . " - " . $response['message'];
    }
} catch (Exception $e) {
    // Gestisce eventuali eccezioni
    echo "Errore nell'interazione con Supabase: " . $e->getMessage();
}
?>
