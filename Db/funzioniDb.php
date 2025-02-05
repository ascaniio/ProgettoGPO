<?php
class Database {
    private $host = "localhost";
    private $db_name = "capaci";
    private $username = "poldo";
    private $password = "aldomoro2025";
    private $conn;

    // 🔹 Funzione per connettersi al database
    public function connesione() {
        $this->conn = null;
        try {
            $this->conn = new PDO("pgsql:host=$this->host;dbname=$this->db_name", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connessione riuscita.<br>";
        } catch (PDOException $e) {
            die("Errore di connessione: " . $e->getMessage());
        }
        return $this->conn;
    }

    // 🔹 Funzione per eseguire una query SQL
    public function query($sql, $params = []) {
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Errore nella query: " . $e->getMessage());
        }
    }

    // 🔹 Funzione per stampare i risultati in una tabella HTML
    public function stampa($data) {
        if (empty($data)) {
            echo " Nessun dato trovato.<br>";
            return;
        }
        echo "<table border='1' cellpadding='5' cellspacing='0'>";
        echo "<tr>";
        foreach (array_keys($data[0]) as $colonna) {
            echo "<th>$colonna</th>";
        }
        echo "</tr>";
        foreach ($data as $riga) {
            echo "<tr>";
            foreach ($riga as $valore) {
                echo "<td>$valore</td>";
            }
            echo "</tr>";
        }
        echo "</table><br>";
    }

    // 🔹 Funzione per caricare (inserire) dati nel database
    public function carica($table, $data) {
        try {
            $columns = implode(", ", array_keys($data));
            $values = implode(", ", array_fill(0, count($data), "?"));
            $sql = "INSERT INTO $table ($columns) VALUES ($values)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(array_values($data));
            echo "Dati inseriti con successo in $table.<br>";
        } catch (PDOException $e) {
            die("Errore durante l'inserimento: " . $e->getMessage());
        }
    }
}
?>
