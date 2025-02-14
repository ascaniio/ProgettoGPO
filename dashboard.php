<?php
include('functions.php');
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
    <link href="css/dashboard.css" rel="stylesheet">
    <!--<link href="css/dashboard.css" rel="stylesheet">-->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


</head>


<body>
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>

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
                <a href="#" class="nav-link active" data-target="home" style="display: flex; align-items: center;">
                    <ion-icon name="home-outline" class="nav-icon"
                        style="padding: 1px 2px; width: 22px; height: 22px; vertical-align: middle;"></ion-icon>
                    <span class="nav-text">Home</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link" data-target="analitiche" style="display: flex; align-items: center;">
                    <ion-icon name="bar-chart-outline" class="nav-icon"
                        style="padding: 1px 2px; width: 22px; height: 22px; vertical-align: middle;"></ion-icon>
                    <span class="nav-text">Analitiche</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link" data-target="tavoli" style="display: flex; align-items: center;">
                    <ion-icon name="restaurant-outline" class="nav-icon"
                        style="padding: 1px 2px; width: 22px; height: 22px; vertical-align: middle;"></ion-icon>
                    <span class="nav-text">Tavoli</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link" data-target="ordini" style="display: flex; align-items: center;">
                    <ion-icon name="receipt-outline" class="nav-icon"
                        style="padding: 1px 2px; width: 22px; height: 22px; vertical-align: middle;"></ion-icon>
                    <span class="nav-text">Ordini</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link" data-target="menu" style="display: flex; align-items: center;">
                    <ion-icon name="fast-food-outline" class="nav-icon"
                        style="padding: 1px 2px; width: 22px; height: 22px; vertical-align: middle;"></ion-icon>
                    <span class="nav-text">Menu</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link" data-target="personale" style="display: flex; align-items: center;">
                    <ion-icon name="people-outline" class="nav-icon"
                        style="padding: 1px 2px; width: 22px; height: 22px; vertical-align: middle;"></ion-icon>
                    <span class="nav-text">Personale</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link" data-target="gestione" style="display: flex; align-items: center;">
                    <ion-icon name="construct-outline" class="nav-icon"
                        style="padding: 1px 2px; width: 22px; height: 22px; vertical-align: middle;"></ion-icon>
                    <span class="nav-text">Gestione</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link" data-target="qr" style="display: flex; align-items: center;">
                    <ion-icon name="qr-code-outline" class="nav-icon"
                        style="padding: 1px 2px; width: 22px; height: 22px; vertical-align: middle;"></ion-icon>
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

    <!-- Modal per Impostazioni Account -->
    <div class="modal fade" id="settingsModal" tabindex="-1" aria-labelledby="settingsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- Header del Modal -->
                <div class="modal-header">
                    <h5 class="modal-title" id="settingsModalLabel">Impostazioni Account</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Chiudi"></button>
                </div>

                <!-- Corpo del Modal -->
                <div class="modal-body">
                    <form class="needs-validation" novalidate>

                        <!-- Sezione Foto Profilo + Username -->
                        <div class="d-flex align-items-center mb-4">
                            <!-- Foto Profilo -->
                            <div class="profile-picture-container d-flex align-items-center gap-3">
                                <div class="profile-picture" style="width: 80px; height: 80px;">
                                    <img id="profileImage" src="img/npp.jpg" alt="Foto Profilo" class="rounded-circle"
                                        style="width: 100%; height: 100%; object-fit: cover;">
                                </div>
                                <!-- Pulsanti per upload e rimozione -->
                                <div class="profile-buttons d-flex flex-column gap-1">
                                    <button type="button" class="btn btn-outline-primary btn-sm"
                                        onclick="uploadImage()">Carica</button>
                                    <button type="button" class="btn btn-outline-danger btn-sm" onclick="removeImage()">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                    <input type="file" id="uploadInput" accept=".jpg,.jpeg,.png" style="display: none;"
                                        onchange="previewProfileImage(event)">
                                </div>
                            </div>
                            <!-- Username accanto all'immagine -->
                            <div class="ms-3">
                                <label class="form-label fw-bold">Username</label>
                                <p class="mb-0 text-muted">username</p>
                            </div>
                        </div>

                        <!-- Campi Nome e Cognome (affiancati) -->
                        <div class="row mb-3">
                            <div class="col">
                                <label for="firstName" class="form-label">Nome</label>
                                <input type="text" class="form-control" id="firstName" placeholder="Nome" required>
                            </div>
                            <div class="col">
                                <label for="lastName" class="form-label">Cognome</label>
                                <input type="text" class="form-control" id="lastName" placeholder="Cognome" required>
                            </div>
                        </div>

                        <!-- Campi Email e Telefono (affiancati) -->
                        <div class="row mb-3">
                            <div class="col">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="emailProfilo" placeholder="Email" required>
                            </div>
                            <div class="col">
                                <label for="phone" class="form-label">Telefono</label>
                                <input type="tel" class="form-control" id="phone" placeholder="Telefono">
                            </div>
                        </div>

                        <!-- Campi Password e Conferma Password (affiancati) -->
                        <div class="row mb-3">
                            <div class="col">
                                <label for="password" class="form-label">Nuova Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Nuova Password">
                            </div>
                            <div class="col">
                                <label for="confirmPassword" class="form-label">Conferma Password</label>
                                <input type="password" class="form-control" id="confirmPassword"
                                    placeholder="Conferma Password">
                            </div>
                        </div>

                        <!-- Pulsante Salva modifiche -->
                        <button type="submit" class="btn btn-primary w-100 mt-3">Salva modifiche</button>
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
                    <!-- Formulato il form con il metodo POST -->
                    <form id="addForm" method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Inserisci username" required>
                        </div>
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Inserisci nome" required>
                        </div>
                        <div class="mb-3">
                            <label for="cognome" class="form-label">Cognome</label>
                            <input type="text" class="form-control" id="cognome" name="cognome" placeholder="Inserisci cognome" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Inserisci email" required>
                        </div>
                        <div class="mb-3">
                            <label for="ruolo" class="form-label">Ruolo</label>
                            <select class="form-select" id="ruolo" name="ruolo" required>
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

    <!-- Modal per Modificare Pizza -->
    <div class="modal fade" id="modificaPizzaModal" tabindex="-1" aria-labelledby="modificaPizzaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modificaPizzaModalLabel">Modifica Pizza</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="pizzaName" class="form-label">Nome Pizza</label>
                            <input type="text" class="form-control" id="pizzaName" value="Pizza Margherita">
                        </div>
                        <div class="mb-3">
                            <label for="pizzaDescription" class="form-label">Descrizione</label>
                            <textarea class="form-control" id="pizzaDescription">Una pizza semplice con pomodoro e mozzarella.</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="pizzaPrice" class="form-label">Prezzo</label>
                            <input type="text" class="form-control" id="pizzaPrice" value="€8">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                    <button type="button" class="btn btn-primary">Salva modifiche</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modale per Modificare Bibite -->
    <div class="modal fade" id="modificaBibiteModal" tabindex="-1" aria-labelledby="modificaBibiteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modificaBibiteModalLabel">Modifica Bibita</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="bibiteName" class="form-label">Nome Bibita</label>
                            <input type="text" class="form-control" id="bibiteName" value="Coca-Cola">
                        </div>
                        <div class="mb-3">
                            <label for="bibiteDescription" class="form-label">Descrizione</label>
                            <textarea class="form-control" id="bibiteDescription">Bibita gassata con cola e zucchero.</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="bibitePrice" class="form-label">Prezzo</label>
                            <input type="text" class="form-control" id="bibitePrice" value="€2">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                    <button type="button" class="btn btn-primary">Salva modifiche</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modale per Modificare Altra Categoria -->
    <div class="modal fade" id="modificaAltraCategoriaModal" tabindex="-1" aria-labelledby="modificaAltraCategoriaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modificaAltraCategoriaModalLabel">Modifica Altra Categoria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="categoriaName" class="form-label">Nome Categoria</label>
                            <input type="text" class="form-control" id="categoriaName" value="Patatine e Cotoletta">
                        </div>
                        <div class="mb-3">
                            <label for="categoriaDescription" class="form-label">Descrizione</label>
                            <textarea class="form-control" id="categoriaDescription">Piatti gustosi per un pranzo veloce.</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="categoriaPrice" class="form-label">Prezzo</label>
                            <input type="text" class="form-control" id="categoriaPrice" value="€10">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                    <button type="button" class="btn btn-primary">Salva modifiche</button>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>

    <!-- Main Content -->
    <div class="content">
        <!--Home-->
        <div id="home" class="content-section active">
            <h1 class="text-center">Benvenuto nella Dashboard</h1>
            <p class="text-center">Ciao, <?= htmlspecialchars($_SESSION["username_login"]); ?>!</p>
            <div class="carousel-container">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="2000">
                            <img class="d-block w-100" src="./img/offerta.jpg" alt="First slide">
                        </div>
                        <div class="carousel-item" data-bs-interval="2000">
                            <img class="d-block w-100" src="./img/offerta4.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item" data-bs-interval="2000">
                            <img class="d-block w-100" src="./img/offerta3.jpg" alt="Third slide">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
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

        <!-- Tavoli -->
        <div id="tavoli" class="content-section">
            <h1>Tables</h1>

            <style>
                .table-button {
                    width: 100px;
                    height: 100px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    text-align: center;
                    font-weight: bold;
                }
            </style>

            <div class="mb-3">
                <label for="numTables" class="form-label">Numero di Tavoli:</label>
                <input type="number" id="numTables" class="form-control" min="1" value="1">
            </div>
            <button class="btn btn-primary" onclick="generateTables()">Genera Tavoli</button>
            <div id="tablesContainer" class="mt-4 d-flex flex-wrap gap-2"></div>

            <script>
                function generateTables() {
                    let container = document.getElementById("tablesContainer");
                    let num = document.getElementById("numTables").value;
                    container.innerHTML = ""; // Pulisce il contenitore

                    for (let i = 0; i < num; i++) {
                        let button = document.createElement("button");
                        button.className = "btn btn-success table-button";
                        button.textContent = `Tavolo ${i+1}`;
                        button.onclick = function() {
                            alert(`Hai cliccato sul Tavolo ${i+1}`);
                        };
                        container.appendChild(button);
                    }
                }
            </script>

        </div>








        <!--Menù -->
        <div id="menu" class="content-section">
            <div class="d-flex justify-content-between align-items-center p-3">
                <!-- Sinistra: Titolo -->
                <h1 class="mb-0">Menu</h1>

                <!-- Centro: Searchbar con larghezza fissa -->
                <div class="mx-3 search-bar" style="width: 450px;">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Cerca..." aria-label="Search">
                        <button class="btn btn-primary" type="button">
                            <ion-icon name="search-outline"></ion-icon>
                        </button>
                    </div>
                </div>

                <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
                <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

                <!-- Destra: Select e bottone -->
                <div class="d-flex align-items-center">
                    <select class="form-select me-2" style="max-width: 112px;" aria-label="Default select example">
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
                            <img src="img/pizza_margherita.jpg" class="card-img-left" alt="Pizza Margherita"
                                style="width: 150px; height: 200px; object-fit: cover; border-radius: 10px;">

                            <div class="card-body d-flex flex-column">
                                <!-- Titolo con pulsante accanto -->
                                <div class="d-flex align-items-center mb-3">
                                    <h5 class="card-title mb-0">Pizza Margherita</h5>
                                    <button class="btn btn-outline-dark ms-2 p-1" data-bs-toggle="modal" data-bs-target="#ingredientiModal" style="font-size: 16px;">
                                        <i class="bi bi-info-circle" style="font-size: 18px;"></i>
                                    </button>
                                </div>

                                <p class="card-text">Un classico tutto italiano.</p>

                                <!-- Contenitore flessibile per i pulsanti -->
                                <div class="d-flex w-100 mt-auto">
                                    <button class="btn btn-primary flex-grow-1 me-2" data-bs-toggle="modal" data-bs-target="#modificaPizzaModal" style="min-width: 0;">Modifica</button>
                                    <button class="btn btn-danger flex-grow-1" data-bs-toggle="modal" data-bs-target="#deleteModal" style="min-width: 0;">Elimina</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal per Ingredienti -->
                    <div class="modal fade" id="ingredientiModal" tabindex="-1" aria-labelledby="ingredientiModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="ingredientiModalLabel">Ingredienti della Pizza Margherita</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <ul>
                                        <li>Pomodoro</li>
                                        <li>Mozzarella</li>
                                        <li>Basilico</li>
                                        <li>Olio d'oliva</li>
                                        <li>Sale</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>





                    <div class="col-md-4 mb-4">
                        <div class="card flex-row">
                            <img src="img/bibite.jpg" class="card-img-left" alt="Altra Categoria"
                                style="width: 150px; height: 200px; object-fit: cover; border-radius: 5px;">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">Bibita</h5>
                                <p class="card-text">Un'assaporazione dei migliori vini del triveneto.</p>

                                <!-- Contenitore flessibile per i pulsanti -->
                                <div class="d-flex w-100">
                                    <button class="btn btn-primary flex-grow-1 me-2" data-toggle="modal"
                                        style="min-width: 0;" data-bs-target="#modificaBibiteModal" data-bs-toggle="modal">Modifica</button>
                                    <button class="btn btn-danger flex-grow-1" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal" style="min-width: 0;">Elimina</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4">
                        <div class="card flex-row">
                            <img src="img/patatine_cotoletta.jpeg" class="card-img-left" alt="Altra Categoria"
                                style="width: 150px; height: 200px; object-fit: cover; border-radius: 5px;">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">Altra Categoria</h5>
                                <p class="card-text">Esplora altre sfiziosità del nostro menu.</p>

                                <!-- Contenitore flessibile per i pulsanti -->
                                <div class="d-flex w-100">
                                    <button class="btn btn-primary flex-grow-1 me-2" data-toggle="modal"
                                        style="min-width: 0;" data-bs-target="#modificaAltraCategoriaModal" data-bs-toggle="modal">Modifica</button>
                                    <button class="btn btn-danger flex-grow-1" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal" style="min-width: 0;">Elimina</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4">
                        <div class="card flex-row">
                            <img src="img/patatine_cotoletta.jpeg" class="card-img-left" alt="Altra Categoria"
                                style="width: 150px; height: 200px; object-fit: cover; border-radius: 5px;">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">Altra Categoria</h5>
                                <p class="card-text">Esplora altre sfiziosità del nostro menu.</p>

                                <!-- Contenitore flessibile per i pulsanti -->
                                <div class="d-flex w-100">
                                    <button class="btn btn-primary flex-grow-1 me-2" data-toggle="modal"
                                        style="min-width: 0;" data-bs-target="#modificaAltraCategoriaModal" data-bs-toggle="modal">Modifica</button>
                                    <button class="btn btn-danger flex-grow-1" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal" style="min-width: 0;">Elimina</button>
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
                <h1 class="mb-0">Personale</h1>

                <!-- Centro: Searchbar con larghezza fissa -->
                <div class="mx-3" style="width: 450px;">
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

                    <button class="btn btn-success" data-bs-toggle="modal"
                        data-bs-target="#addModal">Aggiungi</button>
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
                        // Chiama la funzione per stampare la tabella
                        print_personale_table();
                        ?>
                    </tbody>
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script>

                    </script>



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
    </div>




    <script src="./js/dashboard.js"></script>
    <script src="DataBase/db_utente.js"></script>
</body>


</html>