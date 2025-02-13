<?php
// Funzione per ottenere e stampare gli utenti
function print_personale_table()
{
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

    // Query per ottenere gli utenti
    $query = "SELECT * FROM personale";
    $result = pg_query($conn, $query);

    if ($result) {
        while ($row = pg_fetch_assoc($result)) {
            echo "<tr id='row_" . htmlspecialchars($row['username']) . "'>";
            echo "<td>" . htmlspecialchars($row['username']) . "</td>";
            echo "<td>" . htmlspecialchars($row['nome']) . "</td>";
            echo "<td>" . htmlspecialchars($row['cognome']) . "</td>";
            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
            echo "<td>" . htmlspecialchars($row['ruolo']) . "</td>";
            echo "<td>
                <button class='btn btn-primary btn-sm editButton' data-bs-toggle='modal' data-bs-target='#editModal' data-username='" . htmlspecialchars($row['username']) . "'>
                    <ion-icon name='brush'></ion-icon>
                </button>
                <button class='btn btn-danger btn-sm deleteButton' data-bs-toggle='modal' data-bs-target='#deleteModal' 
                    data-username='" . htmlspecialchars($row['username']) . "'>
                    <ion-icon name='trash'></ion-icon>
                </button>
              </td>";
            echo "</tr>";
        }
    } else {
        echo "Errore nell'esecuzione della query: " . pg_last_error($conn);
    }

    pg_close($conn);
}


?>
