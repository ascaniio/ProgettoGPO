<?php include "../inc/function-admin.inc" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/admin-dashboard.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>
<body>
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>

    <div class="text-center mb-4">
    <h1 class="fs-2">RICHIESTE</h1>
  </div>


<?php 

$cardsData = [
    ["Nome Cognome 1", "Anima CluVB", "Tipologia 1", "Indirizzo 1", "Città 1", "Provincia 1", "email1@example.com", "1234567890", "https://www.sito1.com"],
    ["Nome Cognome 2", "Attività 2", "Tipologia 2", "Indirizzo 2", "Città 2", "Provincia 2", "email2@example.com", "1234567891", "https://www.sito2.com"],
    ["Nome Cognome 3", "Attività 3", "Tipologia 3", "Indirizzo 3", "Città 3", "Provincia 3", "email3@example.com", "1234567892", "https://www.sito3.com"],
    ["Nome Cognome 4", "Attività 4", "Tipologia 4", "Indirizzo 4", "Città 4", "Provincia 4", "email4@example.com", "1234567893", "https://www.sito4.com"],
    ["Nome Cognome 5", "Attività 5", "Tipologia 5", "Indirizzo 5", "Città 5", "Provincia 5", "email5@example.com", "1234567894", "https://www.sito5.com"],
];

?>





<div id="cardCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <?php
        // Dividere le card in gruppi da 5
        $chunks = array_chunk($cardsData, 5);
        foreach ($chunks as $index => $chunk) {
            echo '<div class="carousel-item' . ($index === 0 ? ' active' : '') . '">
                    <div class="d-flex justify-content-around">';
            foreach ($chunk as $data) {
                echo createCard(...$data);
            }
            echo '  </div>
                  </div>';
        }
        ?>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#cardCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#cardCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>


</body>
</html>