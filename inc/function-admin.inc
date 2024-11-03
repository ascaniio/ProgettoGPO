<?php 

function createCard($nome, $attivita, $tipologia, $indirizzo, $citta, $provincia, $email, $cellulare, $sitoWeb) {
    return '
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h4 class="card-title">' . htmlspecialchars($nome) . '</h4>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card\'s content.</p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <h6 class="card-text">Attivita: ' . htmlspecialchars($attivita) . '</h6>
                <h6 class="card-text">Tipologia: ' . htmlspecialchars($tipologia) . '</h6>
            </li>
            <li class="list-group-item">
                <h6 class="card-text">Indirizzo: ' . htmlspecialchars($indirizzo) . '</h6>
                <h6 class="card-text">Citta: ' . htmlspecialchars($citta) . '</h6>
                <h6 class="card-text">Provincia: ' . htmlspecialchars($provincia) . '</h6>
            </li>
            <li class="list-group-item">
                <h6 class="card-text">Email: ' . htmlspecialchars($email) . '</h6>
                <h6 class="card-text">Cellulare: ' . htmlspecialchars($cellulare) . '</h6>
                <h6 class="card-text">Sito Web: <a href="' . htmlspecialchars($sitoWeb) . '" target="_blank">' . htmlspecialchars($sitoWeb) . '</a></h6>
            </li>
        </ul>
        <div class="card-body">
            <a href="#" class="btn btn-primary">Approva</a>
            <a href="#" class="btn btn-danger">Elimina</a>
        </div>
    </div>';
}


?>