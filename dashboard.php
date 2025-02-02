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
    <!--<link href="css/dashboard.css" rel="stylesheet">-->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* Stili esistenti */
        body {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 280px;
            flex-shrink: 0;
            background-color: #f8f9fa;
            transition: width 0.3s ease;
        }

        .sidebar-collapsed {
            width: 80px;
        }

        .content {
            flex-grow: 1;
            padding: 20px;
        }

        .content-section {
            display: none;
        }

        .content-section.active {
            display: block;
        }

        .sidebar-logo {
            height: 35px;
            width: 35px;
            margin-right: 8px;
        }

        .sidebar-collapsed .sidebar-logo {
            display: none;
        }

        .profile-picture-container {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .profile-picture {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            overflow: hidden;
            border: 2px solid #ddd;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #fff;
        }

        .profile-picture img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .profile-buttons {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .profile-buttons .btn {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100px;
        }

        .modal-content {
            border: none;
            padding: 20px;
            border-radius: 0.5rem;
        }

        .icon-padding {
            padding: 2px 4px;
            width: 20px;
            height: 20px;
            vertical-align: middle;
        }

        .nav-link.active {
            display: flex;
            align-items: center;
        }

        .nav-link.active ion-icon {
            padding: 2px 4px;
            width: 20px;
            height: 20px;
            vertical-align: middle;
        }

        .nav-link.active span {
            margin-left: 5px;
        }

        /* Modifica: Distanza ridotta tra icona e testo */
        .nav-icon {
            font-size: 20px;
            vertical-align: middle;
            margin-right: 4px;
            /* Ridotto da 8px a 4px */
        }

        .nav-text {
            margin-left: 3px;
            /* Ridotto da 5px a 3px */
        }

        /* Sidebar base styles */
        .sidebar {
            transition: width 0.5s ease;
            width: 280px;
            position: relative;
        }

        .sidebar-collapsed {
            width: 90px;
        }

        .sidebar-collapsed .nav-text,
        .sidebar-collapsed .sidebar-title,
        .sidebar-collapsed .profile-name {
            display: none;
        }

        /* Immagine del ristorante */
        .restaurant-logo {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }

        /* Profilo utente */
        .user-profile-pic {
            width: 32px;
            height: 32px;
            border-radius: 50%;
        }

        .profile-name {
            font-size: 18px;
            margin-left: 10px;
        }

        .toggle-sidebar {
            transition: all 0.5s ease;
        }

        .sidebar-title {
            margin-left: 4px;
        }

        hr {
            border: 0;
            border-top: 0px solid #dee2e6;
            margin: 0rem 0;
        }

        .dropdown-divider {
            margin: 0.25rem 0;
        }

        .sidebar .nav-link span {
            margin-left: 3px;
            /* Ridotto da 10px a 3px */
            transition: opacity 0.3s ease;
        }

        .sidebar-collapsed .nav-link span {
            opacity: 0;
        }

        .sidebar .nav-icon {
            margin-right: 4px;
            /* Applicato margine ridotto */
        }

        .sidebar-collapsed .nav-icon {
            margin-right: 0;
        }

        .dropdown-toggle::after {
            display: none !important;
        }

        /* Sidebar espansa (stile predefinito) */
        .profile-picture-container {
            display: flex;
            align-items: center;
            /* Allinea immagine e nome utente affiancati */
            gap: 20px;
            /* Distanza tra immagine e nome */
            margin-top: 0;
            /* Nessun margine aggiuntivo */
        }

        .dropdown-item {
            display: flex;
            align-items: center;
            gap: 8px;
            /* Spazio tra icona e testo */
        }

        .dropdown-icon {
            width: 18px;
            height: 18px;
            flex-shrink: 0;
            /* Evita il ridimensionamento */
        }


        .user-profile-pic {
            width: 40px;
            /* Dimensione costante dell'immagine */
            height: 40px;
            border-radius: 50%;
            /* Forma circolare */
            overflow: hidden;
            border: 0px solid #ddd;
            /* Bordo attorno all'immagine */
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #fff;
        }

        .profile-name {
            font-size: 17px;
            /* Dimensione del testo del nome */
            white-space: nowrap;
            /* Evita che il testo vada a capo */
        }

        /* Sidebar collassata */
        .sidebar-collapsed .profile-picture-container {
            flex-direction: column;
            /* Dispone immagine e nome in colonna */
            justify-content: center;
            /* Centra contenuto verticalmente */
            align-items: center;
            /* Centra contenuto orizzontalmente */
            gap: 5px;
            /* Spaziatura ridotta tra immagine e testo */
            margin-top: 15px;
            /* Margine per allineare con i bottoni sopra */
        }

        .sidebar-collapsed .user-profile-pic {
            width: 40px;
            /* Dimensione dell'immagine invariata */
            height: 40px;
        }

        .sidebar-collapsed .profile-name {
            display: none;
            /* Nasconde il nome utente */
        }

        /* Regole generali per compatibilità */
        .sidebar {
            transition: width 0.3s ease;
        }

        .profile-name-style {
            padding-left: 8px;
        }

        /* Stile di base per l'icona */
        .sidebar-icon {
            font-size: 30px;
            color: black;
            padding-top: 6px;
            padding-left: 5px;
            /* Imposta il colore di base dell'icona */
        }

        /* Rimuove il bordo e rende il pulsante trasparente */
        .btn.toggle-sidebar {
            border: none;
            background: transparent;
            padding-left: 4px;
            outline: none;
            cursor: pointer;


        }

        /* Aggiunge lo sfondo al passaggio con il mouse */
        .btn.toggle-sidebar:hover {

            /* Colore di sfondo al passaggio */
            border-radius: 50%;
            /* Mantieni l'aspetto circolare */
        }

        /* Allinea il pulsante con le icone quando la sidebar è chiusa */
        .sidebar-closed .btn.toggle-sidebar {
            border: none;
            background: transparent;
            padding-left: 4px;
            outline: none;
            cursor: pointer;


        }


        .justify-content-between.align-items-start {
            display: flex;
            /* Mantiene gli elementi sulla stessa riga */
            align-items: center;
            /* Allinea verticalmente */
        }

        .toggle-sidebar {
            white-space: nowrap;
            /* Previene che il contenuto vada a capo */
        }

        .sidebar-closed .justify-content-between.align-items-start {
            display: none;
            /* Mantiene gli elementi sulla stessa riga */
            align-items: none;
            /* Allinea verticalmente */
        }

        .sidebar-closed .toggle-sidebar {
            white-space: none;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 280px;
            height: 100vh;
            overflow-y: auto;
            background-color: #f8f9fa;
            transition: width 0.3s ease;
            z-index: 1000;
        }

        .sidebar-collapsed {
            width: 80px;
        }

        .content {
            margin-left: 280px;
            flex-grow: 1;
            padding: 20px;
            transition: margin-left 0.3s ease;
            /* Per un'animazione fluida */
        }

        /* Quando la sidebar è collassata, il contenuto si adatta */
        .sidebar-collapsed~.content {
            margin-left: 80px;
        }
    </style>


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

                        <div class="profile-picture-container" style="display: flex; align-items: center; gap: 10px;">
                            <!-- Immagine profilo con cerchio -->
                            <div class="profile-picture">
                                <img id="profileImage" src="img/npp.jpg" alt="Default Profile Picture">
                            </div>
                            <!-- Pulsanti per upload e rimuovi -->
                            <div class="profile-buttons" style="display: flex; flex-direction: column; gap: 5px;">
                                <button type="button" class="btn btn-outline-primary btn-sm"
                                    onclick="uploadImage()">Upload</button>
                                <button type="button" class="btn btn-outline-danger btn-sm" onclick="removeImage()">
                                    <i class="bi bi-trash"></i>
                                </button>
                                <!-- Input nascosto per caricamento immagine -->
                                <input type="file" id="uploadInput" accept=".jpg,.jpeg,.png" style="display: none;"
                                    onchange="previewProfileImage(event)">
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

            <script>
                // Empty data for demonstration purposes
                const emptyData = {
                    labels: ["January", "February", "March", "April", "May", "June", "July", "August", "Negri"],
                    values: [8, 4, 1, 0, 0, 2, 5, 1, 3]
                };

                // Populate Revenue Chart
                const revenueCtx = document.getElementById('revenueChart').getContext('2d');
                new Chart(revenueCtx, {
                    type: 'line',
                    data: {
                        labels: emptyData.labels,
                        datasets: [{
                            label: 'Daily Revenue',
                            data: emptyData.values,
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 2
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                        }
                    }
                });

                // Populate Popular Dishes Chart
                const dishesCtx = document.getElementById('popularDishesChart').getContext('2d');
                new Chart(dishesCtx, {
                    type: 'pie',
                    data: {
                        labels: ["Dish 1", "Dish 2", "Dish 3", "Dish 4"],
                        datasets: [{
                            label: 'Dishes Ordered',
                            data: [0, 0, 0, 0],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                        }
                    }
                });
            </script>
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

<style>
    .grid-container {
        display: grid;
        gap: 10px;
        justify-content: center;
    }

    .table-button {
        background-color: #007bff;
        color: white;
        border: none;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1rem;
        font-weight: bold;
        border-radius: 8px;
        cursor: pointer;
        aspect-ratio: 1 / 1; /* Mantiene i bottoni quadrati */
    }

    .table-button:hover {
        background-color: #0056b3;
    }
</style>

<script>
    function generaTavoli(numeroTavoli) {
        const container = document.getElementById("tavoli-container");
        container.innerHTML = ""; // Svuota il contenitore prima di generare nuovi tavoli

        // Ottiene la larghezza disponibile del contenitore
        const containerWidth = container.parentElement.clientWidth; 
        const maxColumns = 8; // Numero massimo di colonne
        const minColumns = 2; // Numero minimo di colonne

        // Trova il numero ottimale di colonne (più vicino a una disposizione quadrata)
        let columns = Math.floor(Math.sqrt(numeroTavoli)); 
        columns = Math.min(Math.max(columns, minColumns), maxColumns); // Mantiene il numero entro i limiti

        // Calcola la dimensione ottimale dei bottoni in base alla larghezza disponibile
        const buttonSize = Math.floor(containerWidth / columns) - 10; // -10px per il gap

        // Imposta la griglia dinamica
        container.style.gridTemplateColumns = `repeat(${columns}, 1fr)`;

        // Crea i bottoni
        for (let i = 0; i < numeroTavoli; i++) {
            const button = document.createElement("button");
            button.className = "table-button";
            button.style.width = `${buttonSize}px`;
            button.style.height = `${buttonSize}px`; // Mantiene il bottone quadrato
            button.textContent = `Tavolo ${i + 1}`;

            container.appendChild(button);
        }
    }

    // Esempio: genera 16 tavoli
    window.addEventListener("resize", () => generaTavoli(16)); // Aggiorna la disposizione quando si ridimensiona la finestra
    generaTavoli(100); // Inizializza
</script>


        <!--Menù -->
        <div id="menu" class="content-section">
            <div class="d-flex justify-content-between align-items-center p-3">
                <!-- Sinistra: Titolo -->
                <h1 class="mb-0">Menu</h1>

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
                            <img src="img/pizza_margherita.jpg" class="card-img-left" alt="Altra Categoria"
                                style="width: 150px; height: 200px; object-fit: cover; border-radius: 5px;">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">Altra Categoria</h5>
                                <p class="card-text">Esplora altre opzioni del nostro menu.</p>

                                <!-- Contenitore flessibile per i pulsanti -->
                                <div class="d-flex w-100">
                                    <button class="btn btn-primary flex-grow-1 me-2" data-toggle="modal"
                                        data-target="#modificaAltraCategoriaModalLabel"
                                        style="min-width: 0;">Modifica</button>
                                    <button class="btn btn-danger flex-grow-1" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal" style="min-width: 0;">Elimina</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4">
                        <div class="card flex-row">
                            <img src="img/bibite.jpg" class="card-img-left" alt="Altra Categoria"
                                style="width: 150px; height: 200px; object-fit: cover; border-radius: 5px;">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">Altra Categoria</h5>
                                <p class="card-text">Esplora altre opzioni del nostro menu.</p>

                                <!-- Contenitore flessibile per i pulsanti -->
                                <div class="d-flex w-100">
                                    <button class="btn btn-primary flex-grow-1 me-2" data-toggle="modal"
                                        data-target="#modificaAltraCategoriaModalLabel"
                                        style="min-width: 0;">Modifica</button>
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
                                <p class="card-text">Esplora altre opzioni del nostro menu.</p>

                                <!-- Contenitore flessibile per i pulsanti -->
                                <div class="d-flex w-100">
                                    <button class="btn btn-primary flex-grow-1 me-2" data-toggle="modal"
                                        data-target="#modificaAltraCategoriaModalLabel"
                                        style="min-width: 0;">Modifica</button>
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
                                <p class="card-text">Esplora altre opzioni del nostro menu.</p>

                                <!-- Contenitore flessibile per i pulsanti -->
                                <div class="d-flex w-100">
                                    <button class="btn btn-primary flex-grow-1 me-2" data-toggle="modal"
                                        data-target="#modificaAltraCategoriaModalLabel"
                                        style="min-width: 0;">Modifica</button>
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
                                <p class="card-text">Esplora altre opzioni del nostro menu.</p>

                                <!-- Contenitore flessibile per i pulsanti -->
                                <div class="d-flex w-100">
                                    <button class="btn btn-primary flex-grow-1 me-2" data-toggle="modal"
                                        data-target="#modificaAltraCategoriaModalLabel"
                                        style="min-width: 0;">Modifica</button>
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
                                <p class="card-text">Esplora altre opzioni del nostro menu.</p>

                                <!-- Contenitore flessibile per i pulsanti -->
                                <div class="d-flex w-100">
                                    <button class="btn btn-primary flex-grow-1 me-2" data-toggle="modal"
                                        data-target="#modificaAltraCategoriaModalLabel"
                                        style="min-width: 0;">Modifica</button>
                                    <button class="btn btn-danger flex-grow-1" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal" style="min-width: 0;">Elimina</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4">
                        <div class="card flex-row">
                            <img src="img/pizza_margherita.jpg" class="card-img-left" alt="Altra Categoria"
                                style="width: 150px; height: 200px; object-fit: cover; border-radius: 5px;">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">Altra Categoria</h5>
                                <p class="card-text">Esplora altre opzioni del nostro menu.</p>

                                <!-- Contenitore flessibile per i pulsanti -->
                                <div class="d-flex w-100">
                                    <button class="btn btn-primary flex-grow-1 me-2" data-toggle="modal"
                                        data-target="#modificaAltraCategoriaModalLabel"
                                        style="min-width: 0;">Modifica</button>
                                    <button class="btn btn-danger flex-grow-1" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal" style="min-width: 0;">Elimina</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4">
                        <div class="card flex-row">
                            <img src="img/bibite.jpg" class="card-img-left" alt="Altra Categoria"
                                style="width: 150px; height: 200px; object-fit: cover; border-radius: 5px;">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">Altra Categoria</h5>
                                <p class="card-text">Esplora altre opzioni del nostro menu.</p>

                                <!-- Contenitore flessibile per i pulsanti -->
                                <div class="d-flex w-100">
                                    <button class="btn btn-primary flex-grow-1 me-2" data-toggle="modal"
                                        data-target="#modificaAltraCategoriaModalLabel"
                                        style="min-width: 0;">Modifica</button>
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
                                <p class="card-text">Esplora altre opzioni del nostro menu.</p>

                                <!-- Contenitore flessibile per i pulsanti -->
                                <div class="d-flex w-100">
                                    <button class="btn btn-primary flex-grow-1 me-2" data-toggle="modal"
                                        data-target="#modificaAltraCategoriaModalLabel"
                                        style="min-width: 0;">Modifica</button>
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
                <h1 class="mb-0">Menu</h1>

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
        <div id="qr" class="content-section">
            <h1>Qr Code Generator</h1>
            <p>Contenuto dei tavoli...</p>

        </div>
    </div>




    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const navLinks = document.querySelectorAll("#sidebarNav .nav-link");
            const activePage = localStorage.getItem("activePage") || "home"; // Default: Home

            function updateActivePage(target) {
                // Rimuove la classe active da tutti i link
                navLinks.forEach(link => link.classList.remove("active"));

                // Attiva il link corretto
                const activeLink = document.querySelector(`[data-target="${target}"]`);
                if (activeLink) {
                    activeLink.classList.add("active");
                }

                // Mostra il contenuto corrispondente e nasconde gli altri
                document.querySelectorAll(".content-section").forEach(section => {
                    section.style.display = section.id === target ? "block" : "none";
                });

                // Salva la pagina attiva
                localStorage.setItem("activePage", target);
            }

            // Inizializza la pagina attiva al caricamento
            updateActivePage(activePage);

            // Aggiunge il listener per cambiare la scheda
            navLinks.forEach(link => {
                link.addEventListener("click", function (event) {
                    event.preventDefault(); // Evita il comportamento predefinito

                    const target = this.getAttribute("data-target");
                    updateActivePage(target);
                });
            });
        });



        // Funzione per aprire il selettore di file
        function uploadImage() {
            const uploadInput = document.getElementById('uploadInput');
            uploadInput.click();
        }

        // Funzione per aggiornare l'immagine del profilo
        function previewProfileImage(event) {
            const input = event.target;
            const profileImage = document.getElementById('profileImage');

            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    profileImage.src = e.target.result;
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        document.getElementById('toggleSidebar').addEventListener('click', function () {
            const sidebar = document.getElementById('mainSidebar');
            sidebar.classList.toggle('sidebar-collapsed');

            // Cambia l'icona del pulsante
            this.querySelector('ion-icon').name = sidebar.classList.contains('sidebar-collapsed') ?
                'chevron-forward-outline' :
                'chevron-back-outline';
        });

        // Funzione per reimpostare l'immagine predefinita
        function removeImage() {
            const profileImage = document.getElementById('profileImage');
            profileImage.src = 'img/npp.jpg'; // Percorso dell'immagine di default
        }

        // Prevenzione del comportamento predefinito (se usi un form)
        document.querySelector('form').addEventListener('submit', function (e) {
            e.preventDefault(); // Previene il ricaricamento della pagina
        });





        // JavaScript per la gestione della navigazione
        const links = document.querySelectorAll('#sidebarNav .nav-link');
        const sections = document.querySelectorAll('.content-section');

        links.forEach(link => {
            link.addEventListener('click', function (e) {
                e.preventDefault();

                // Rimuove la classe active dai link e dalle sezioni
                links.forEach(l => l.classList.remove('active'));
                sections.forEach(section => section.classList.remove('active'));

                // Aggiunge la classe active al link e alla sezione corrispondente
                this.classList.add('active');
                const targetId = this.getAttribute('data-target');
                document.getElementById(targetId).classList.add('active');
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>