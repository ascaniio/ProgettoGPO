<?php
session_start();

// Se l'utente non è loggato, reindirizza al login
if (!isset($_SESSION["username_login"]) || $_SESSION["username_login"] !== "username") {
    header("Location: login.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
    <link rel="stylesheet" href="./css/dashboard.css">
</head>

<body>


    <!-- Sidebar -->
    <div class="d-flex flex-column flex-shrink-0 p-3 sidebar" id="mainSidebar">
        <div class="justify-content-between align-items-start mb-3 mb-md-0">
            <div class="profile-name-style">
                <a href="#" class="d-flex align-items-center link-dark text-decoration-none">
                    <img src="img/npp.jpg" alt="" class="sidebar-logo rounded-circle me-2 restaurant-logo">
                    <strong class="sidebar-title"><span class="fs-4">Pizzeria</span></strong>
                </a>
            </div>

            <button class="btn toggle-sidebar" id="toggleSidebar" aria-label="Toggle sidebar">
                <ion-icon name="chevron-back-outline" class="sidebar-icon"></ion-icon>
            </button>

        </div>
        <br>
        <ul class="nav nav-pills flex-column mb-auto" id="sidebarNav">
            <li class="nav-item">
                <a href="#" class="nav-link active" data-target="home">
                    <ion-icon name="home-outline" class="nav-icon"></ion-icon>
                    <span class="nav-text">Home</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link" data-target="analitiche">
                    <ion-icon name="bar-chart-outline" class="nav-icon"></ion-icon>
                    <span class="nav-text">Analitiche</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link" data-target="tavoli">
                    <ion-icon name="restaurant-outline" class="nav-icon"></ion-icon>
                    <span class="nav-text">Tavoli</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link" data-target="ordini">
                    <ion-icon name="receipt-outline" class="nav-icon"></ion-icon>
                    <span class="nav-text">Ordini</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link" data-target="menu">
                    <ion-icon name="fast-food-outline" class="nav-icon"></ion-icon>
                    <span class="nav-text">Menu</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link" data-target="personale">
                    <ion-icon name="people-outline" class="nav-icon"></ion-icon>
                    <span class="nav-text">Personale</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link" data-target="gestione">
                    <ion-icon name="construct-outline" class="nav-icon"></ion-icon>
                    <span class="nav-text">Gestione</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link" data-target="qr">
                    <ion-icon name="qr-code-outline" class="nav-icon"></ion-icon>
                    <span class="nav-text">QR Code</span>
                </a>
            </li>
        </ul>
        <div class="dropdown mt-auto profile-picture-container">
            <a href="#" class="d-flex align-items-center link-dark text-decoration-none" id="dropdownUser2"
                data-bs-toggle="dropdown" aria-expanded="false">
                <img src="img/npp.jpg" alt="" class="rounded-circle user-profile-pic">
                <strong class="profile-name">dapinotreviso</strong>
            </a>
            <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                <li>
                    <a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal"
                        data-bs-target="#settingsModal">
                        <ion-icon name="settings-outline" class="dropdown-icon"></ion-icon>
                        <span>Impostazioni</span>
                    </a>
                </li>
                <li>
                    <a class="dropdown-item d-flex align-items-center" href="mobile.php">
                        <ion-icon name="phone-portrait-outline" class="dropdown-icon"></ion-icon>
                        <span>Mobile</span>
                    </a>
                </li>
                <li>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <ion-icon name="person-outline" class="dropdown-icon"></ion-icon>
                        <span>Profilo</span>
                    </a>
                </li>
                <li>
                    <hr class="dropdown-divider mt-0 mb-1">
                </li>
                <li>
                    <a class="dropdown-item d-flex align-items-center" href="logout.php">
                        <ion-icon name="log-out-outline" class="dropdown-icon"></ion-icon>
                        <span>Esci</span>
                    </a>
                </li>
            </ul>
        </div>


    </div>

    <!-- Modal per Settings -->
    <div class="modal fade" id="settingsModal" tabindex="-1" aria-labelledby="settingsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <h5 class="text-center mt-3 mb-4" id="settingsModalLabel">Settings</h5>

                <div class="modal-body">
                    <!-- Contenuto del modal -->
                    <form class="needs-validation" novalidate>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username"
                                placeholder="Inserisci il tuo username" value="username" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Inserisci la tua email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password"
                                placeholder="Inserisci la tua password" required>
                        </div>

                        <div class="profile-picture-container">
                            <!-- Immagine profilo con cerchio -->
                            <div class="profile-picture">
                                <img id="profileImage" src="img/npp.jpg" alt="Default Profile Picture">
                            </div>
                            <!-- Pulsanti per upload e rimuovi -->
                            <div class="profile-buttons">
                                <button type="button" class="btn btn-outline-primary btn-sm" onclick="uploadImage()">
                                    Upload
                                </button>
                                <button type="button" class="btn btn-outline-danger btn-sm" onclick="removeImage()">
                                    <i class="bi bi-trash"></i>
                                </button>
                                <!-- Input nascosto per caricamento immagine -->
                                <input type="file" id="uploadInput" accept=".jpg,.jpeg,.png" onchange="previewProfileImage(event)">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mt-4 w-100">Salva modifiche</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal per Aggiungi -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <h5 class="text-center mt-3 mb-4" id="addModalLabel">Aggiungi Nuovo</h5>
                <div class="modal-body">
                    <!-- Contenuto del modal -->
                    <form>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" placeholder="Inserisci username">
                        </div>
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="nome" placeholder="Inserisci nome">
                        </div>
                        <div class="mb-3">
                            <label for="cognome" class="form-label">Cognome</label>
                            <input type="text" class="form-control" id="cognome" placeholder="Inserisci cognome">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Inserisci email">
                        </div>
                        <div class="mb-3">
                            <label for="ruolo" class="form-label">Ruolo</label>
                            <select class="form-select" id="ruolo">
                                <option value="Capo">Capo</option>
                                <option value="Dipendente">Dipendente</option>
                                <option value="Amministratore">Amministratore</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 mt-3">Salva</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal per la modifica del personale -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Modifica Personale</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm">
                        <div class="mb-3">
                            <label for="editUsername" class="form-label">Username</label>
                            <input type="text" class="form-control" id="editUsername" placeholder="Username" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="editNome" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="editNome" placeholder="Nome">
                        </div>
                        <div class="mb-3">
                            <label for="editCognome" class="form-label">Cognome</label>
                            <input type="text" class="form-control" id="editCognome" placeholder="Cognome">
                        </div>
                        <div class="mb-3">
                            <label for="editEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="editEmail" placeholder="Email">
                        </div>
                        <div class="mb-3">
                            <label for="editRuolo" class="form-label">Ruolo</label>
                            <select class="form-select" id="editRuolo">
                                <option selected>Capo</option>
                                <option>Dipendente</option>
                                <option>Manager</option>
                            </select>
                        </div>
                        <button type="button" class="btn btn-primary w-100" id="saveChanges">Salva Modifiche</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal per Conferma Eliminazione -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Conferma Eliminazione</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Sei sicuro di voler eliminare <span id="deleteUsername"></span>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                    <button type="button" class="btn btn-danger" id="confirmDelete">Elimina</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal per la modifica delle portate -->
    <!-- Modal per Modificare Pizza -->
    <div class="modal fade" id="modificaPizzaModal" tabindex="-1" role="dialog"
        aria-labelledby="modificaPizzaModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modificaPizzaModalLabel">Modifica Pizza</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="pizzaName">Nome Pizza</label>
                            <input type="text" class="form-control" id="pizzaName" value="Pizza Margherita">
                        </div>
                        <div class="form-group">
                            <label for="pizzaDescription">Descrizione</label>
                            <textarea class="form-control"
                                id="pizzaDescription">Una pizza semplice con pomodoro e mozzarella.</textarea>
                        </div>
                        <div class="form-group">
                            <label for="pizzaPrice">Prezzo</label>
                            <input type="text" class="form-control" id="pizzaPrice" value="€8">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
                    <button type="button" class="btn btn-primary">Salva modifiche</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modale per Modificare Bibite -->
    <div class="modal fade" id="modificaBibiteModal" tabindex="-1" role="dialog"
        aria-labelledby="modificaBibiteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modificaBibiteModalLabel">Modifica Bibita</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="bibiteName">Nome Bibita</label>
                            <input type="text" class="form-control" id="bibiteName" value="Coca-Cola">
                        </div>
                        <div class="form-group">
                            <label for="bibiteDescription">Descrizione</label>
                            <textarea class="form-control"
                                id="bibiteDescription">Bibita gassata con cola e zucchero.</textarea>
                        </div>
                        <div class="form-group">
                            <label for="bibitePrice">Prezzo</label>
                            <input type="text" class="form-control" id="bibitePrice" value="€2">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
                    <button type="button" class="btn btn-primary">Salva modifiche</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modale per Modificare Altra Categoria -->
    <div class="modal fade" id="modificaAltraCategoriaModal" tabindex="-1" role="dialog"
        aria-labelledby="modificaAltraCategoriaModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modificaAltraCategoriaModalLabel">Modifica Altra Categoria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="categoriaName">Nome Categoria</label>
                            <input type="text" class="form-control" id="categoriaName" value="Patatine e Cotoletta">
                        </div>
                        <div class="form-group">
                            <label for="categoriaDescription">Descrizione</label>
                            <textarea class="form-control"
                                id="categoriaDescription">Piatti gustosi per un pranzo veloce.</textarea>
                        </div>
                        <div class="form-group">
                            <label for="categoriaPrice">Prezzo</label>
                            <input type="text" class="form-control" id="categoriaPrice" value="€10">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
                    <button type="button" class="btn btn-primary">Salva modifiche</button>
                </div>
            </div>
        </div>
    </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>

    <!-- Main Content -->
    <div class="content">
        <!--Home-->
        <div id="home" class="content-section active">
            <h1 class="text-center">Benvenuto nella Dashboard</h1>
            <p class="text-center">Ciao, <?= htmlspecialchars($_SESSION["username_login"]); ?>!</p>
            <div class="text-center">
                <a href="logout.php" class="btn btn-danger">Logout</a>
            </div>
        </div>

        <!--Analitiche-->
        <div id="analitiche" class="content-section">

            <h1 class="text-center">Analytics Dashboard</h1>
            <div class="row mt-4">
                <div class="col-md-6">
                    <canvas id="revenueChart"></canvas>
                </div>
                <div class="col-md-6">
                    <canvas id="popularDishesChart"></canvas>
                </div>
            </div>

        </div>

        <!--Ordini-->
        <div id="ordini" class="content-section">
            <h1>Orders</h1>
            <p>Contenuto degli ordini...</p>
        </div>

        <!--Tavoli-->
        <div id="tavoli" class="content-section">
            <h1>Tables</h1>
            <br>
            <div class="container">
                <div id="tavoli-container" class="grid-container">
                    <!-- I bottoni verranno generati qui -->
                </div>
            </div>
        </div>



        <!--Menù -->
        <div id="menu" class="content-section">
            <div class="d-flex justify-content-between align-items-center p-3">
                <!-- Sinistra: Titolo -->
                <h1 class="mb-0">Menu</h1>

                <!-- Centro: Searchbar con larghezza fissa -->
                <div class="mx-3 fixed-search">
                    <div class="input-group">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon1">
                            <ion-icon name="search-outline"></ion-icon>
                        </button>
                        <input type="text" class="form-control" placeholder=""
                            aria-label="Example text with button addon" aria-describedby="button-addon1">
                    </div>
                </div>

                <!-- Destra: Select e bottone -->
                <div class="d-flex align-items-center">
                    <select class="form-select me-2 fixed-select" aria-label="Default select example">
                        <option value="1">Primi</option>
                        <option value="2">Secondi</option>
                        <option value="2">Contorni</option>
                        <option value="2">Bibite</option>
                        <option value="3">Dessert</option>
                    </select>
                    <button class="btn btn-success">Aggiungi</button>
                </div>
            </div>

            <div class="container my-4">
                <div class="row">
                    <!-- Card Orizzontale per Pizze -->
                    <div class="col-md-4 mb-4">
                        <div class="card flex-row">
                            <img src="img/pizza_margherita.jpg" class="card-img-left card-img-custom" alt="Altra Categoria">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">Altra Categoria</h5>
                                <p class="card-text">Esplora altre opzioni del nostro menu.</p>
                                <!-- Contenitore flessibile per i pulsanti -->
                                <div class="d-flex w-100">
                                    <button class="btn btn-primary flex-grow-1 me-2 btn-no-min" data-toggle="modal"
                                        data-target="#modificaAltraCategoriaModalLabel">Modifica</button>
                                    <button class="btn btn-danger flex-grow-1 btn-no-min" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal">Elimina</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card per Bibite -->
                    <div class="col-md-4 mb-4">
                        <div class="card flex-row">
                            <img src="img/bibite.jpg" class="card-img-left card-img-custom" alt="Altra Categoria">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">Altra Categoria</h5>
                                <p class="card-text">Esplora altre opzioni del nostro menu.</p>
                                <div class="d-flex w-100">
                                    <button class="btn btn-primary flex-grow-1 me-2 btn-no-min" data-toggle="modal"
                                        data-target="#modificaAltraCategoriaModalLabel">Modifica</button>
                                    <button class="btn btn-danger flex-grow-1 btn-no-min" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal">Elimina</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card per Patatine e Cotoletta -->
                    <div class="col-md-4 mb-4">
                        <div class="card flex-row">
                            <img src="img/patatine_cotoletta.jpeg" class="card-img-left card-img-custom" alt="Altra Categoria">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">Altra Categoria</h5>
                                <p class="card-text">Esplora altre opzioni del nostro menu.</p>
                                <div class="d-flex w-100">
                                    <button class="btn btn-primary flex-grow-1 me-2 btn-no-min" data-toggle="modal"
                                        data-target="#modificaAltraCategoriaModalLabel">Modifica</button>
                                    <button class="btn btn-danger flex-grow-1 btn-no-min" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal">Elimina</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card aggiuntive (ripeti la struttura per ogni elemento) -->
                    <div class="col-md-4 mb-4">
                        <div class="card flex-row">
                            <img src="img/patatine_cotoletta.jpeg" class="card-img-left card-img-custom" alt="Altra Categoria">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">Altra Categoria</h5>
                                <p class="card-text">Esplora altre opzioni del nostro menu.</p>
                                <div class="d-flex w-100">
                                    <button class="btn btn-primary flex-grow-1 me-2 btn-no-min" data-toggle="modal"
                                        data-target="#modificaAltraCategoriaModalLabel">Modifica</button>
                                    <button class="btn btn-danger flex-grow-1 btn-no-min" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal">Elimina</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4">
                        <div class="card flex-row">
                            <img src="img/pizza_margherita.jpg" class="card-img-left card-img-custom" alt="Altra Categoria">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">Altra Categoria</h5>
                                <p class="card-text">Esplora altre opzioni del nostro menu.</p>
                                <div class="d-flex w-100">
                                    <button class="btn btn-primary flex-grow-1 me-2 btn-no-min" data-toggle="modal"
                                        data-target="#modificaAltraCategoriaModalLabel">Modifica</button>
                                    <button class="btn btn-danger flex-grow-1 btn-no-min" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal">Elimina</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4">
                        <div class="card flex-row">
                            <img src="img/bibite.jpg" class="card-img-left card-img-custom" alt="Altra Categoria">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">Altra Categoria</h5>
                                <p class="card-text">Esplora altre opzioni del nostro menu.</p>
                                <div class="d-flex w-100">
                                    <button class="btn btn-primary flex-grow-1 me-2 btn-no-min" data-toggle="modal"
                                        data-target="#modificaAltraCategoriaModalLabel">Modifica</button>
                                    <button class="btn btn-danger flex-grow-1 btn-no-min" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal">Elimina</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4">
                        <div class="card flex-row">
                            <img src="img/patatine_cotoletta.jpeg" class="card-img-left card-img-custom" alt="Altra Categoria">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">Altra Categoria</h5>
                                <p class="card-text">Esplora altre opzioni del nostro menu.</p>
                                <div class="d-flex w-100">
                                    <button class="btn btn-primary flex-grow-1 me-2 btn-no-min" data-toggle="modal"
                                        data-target="#modificaAltraCategoriaModalLabel">Modifica</button>
                                    <button class="btn btn-danger flex-grow-1 btn-no-min" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal">Elimina</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!--Personale-->
        <div id="personale" class="content-section">
            <div class="d-flex justify-content-between align-items-center p-3">
                <!-- Sinistra: Titolo -->
                <h1 class="mb-0">Menu</h1>

                <!-- Centro: Searchbar con larghezza fissa -->
                <div class="mx-3 fixed-search">
                    <div class="input-group">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon1">
                            <ion-icon name="search-outline"></ion-icon>
                        </button>
                        <input type="text" class="form-control" placeholder=""
                            aria-label="Example text with button addon" aria-describedby="button-addon1">
                    </div>
                </div>

                <!-- Destra: Select e bottone -->
                <div class="d-flex align-items-center">

                    <button class="btn btn-success">Aggiungi</button>
                </div>
            </div>
            <div class="container my-5">
                <table class="table">
                    <thead>
                        <!-- Nuova riga per il pulsante sopra "Action" -->
                        <tr>
                            <th>Username</th>
                            <th>Nome</th>
                            <th>Cognome</th>
                            <th>Email</th>
                            <th>Ruolo</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //inserire il database
                        ?>
                        <tr>
                            <td>Billy</td>
                            <td>Bill</td>
                            <td>Gates</td>
                            <td>billygatto@gmail.com</td>
                            <td>Capo</td>
                            <td>
                                <button class="btn btn-primary btn-sm editButton" data-bs-toggle="modal"
                                    data-bs-target="#editModal">
                                    <ion-icon name="brush-outline"></ion-icon>
                                </button>
                                <button class="btn btn-danger btn-sm deleteButton" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal">
                                    <ion-icon name="trash-outline"></ion-icon>
                                </button>
                            </td>
                        </tr>

                        <tr>
                            <td>CR7</td>
                            <td>Cristiano</td>
                            <td>Ronaldo</td>
                            <td>cristianoronaldo@gmail.com</td>
                            <td>Capo</td>
                            <td>
                                <button class="btn btn-primary btn-sm editButton" data-bs-toggle="modal"
                                    data-bs-target="#editModal">
                                    <ion-icon name="brush"></ion-icon>
                                </button>
                                <button class="btn btn-danger btn-sm deleteButton" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal">
                                    <ion-icon name="trash"></ion-icon>
                                </button>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>

        <!--Gestione-->
        <div id="gestione" class="content-section">
            <h1>Gestione</h1>
            <p>Contenuto dei tavoli...</p>
        </div>

        <!--Qr Code-->
        <div id="qr" class="content-section" style="margin-top: 125px;">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow p-4">
                        <h1 class="text-center">QR Code Generator</h1>

                        <div class="mb-3">
                            <label for="qrText" class="form-label fw-bold">Inserire l'URL</label>
                            <input type="text" class="form-control" id="qrText" placeholder="URL">
                        </div>

                        <div id="imgBox">
                            <img src="" id="qrImage">
                        </div>

                        <input type="submit" class="btn btn-primary w-100" onclick="generaQR()" value="Genera QR Code" />

                    </div>
                </div>
            </div>
        </div>


        <script src="./js/dashboard.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>