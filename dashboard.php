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

        /* Aggiunte e modifiche */
        .nav-icon {
            font-size: 20px;
            vertical-align: middle;
        }

     

        .nav-text {
            margin-left: 5px;
        }

        /* Sidebar base styles */
        .sidebar {
            transition: width 0.5s ease;
            width: 280px;
            /* Cambia la larghezza della sidebar normale qui */
            position: relative;
        }

        .sidebar-collapsed {
            width: 80px;
            /* Larghezza quando la sidebar è collassata */
        }

        /* Nascondi testo quando collassata */
        .sidebar-collapsed .nav-text,
        .sidebar-collapsed .sidebar-title,
        .sidebar-collapsed .profile-name {
            display: none;
        }

        /* Immagine del ristorante */
        .restaurant-logo {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }

        /* Profilo utente */
        .user-profile-pic {
            width: 32px;
            height: 32px;
            border-radius: 50%;
        }

        .profile-name {
            font-size: 16px;
            margin-left: 4px;
        }

        /* Bottone di toggle */
        .toggle-sidebar {
            transition: all 0.5s ease;
        }

        .sidebar-title {
            margin-left: 4px;
        }

        /* Stile dell'HR */
        hr {
            border: 0;
            border-top: 0px solid #dee2e6;
            margin: 0rem 0;
        }

        .dropdown-divider {
            margin: 0.25rem 0;
        }
    </style>

</head>

<body>
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>


    <!-- Sidebar -->
    <div class="d-flex flex-column flex-shrink-0 p-3 sidebar" id="mainSidebar">
        <div class="d-flex justify-content-between align-items-center mb-3 mb-md-0">
            <a href="#" class="d-flex align-items-center link-dark text-decoration-none">
            <img src="img/npp.jpg" alt="" class="sidebar-logo rounded-circle me-2 restaurant-logo">    
            <strong class="sidebar-title"><span class="fs-4">Pizzeria</span></strong>
            </a>
            <button class="btn btn-outline-secondary btn-sm toggle-sidebar" id="toggleSidebar"
                aria-label="Toggle sidebar">
                <ion-icon name="chevron-back-outline" style="font-size: 20px;"></ion-icon>
            </button>
        </div>
        <hr class="mt-0 mb-3">
        <ul class="nav nav-pills flex-column mb-auto" id="sidebarNav">
            <li class="nav-item">
                <a href="#" class="nav-link active" data-target="home">
                    <ion-icon name="home-outline" class="nav-icon"></ion-icon>
                    <span class="nav-text">Home</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link" data-target="analytics">
                    <ion-icon name="bar-chart-outline" class="nav-icon"></ion-icon>
                    <span class="nav-text">Analytics</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link" data-target="tables">
                    <ion-icon name="restaurant-outline" class="nav-icon"></ion-icon>
                    <span class="nav-text">Tavoli</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link" data-target="orders">
                    <ion-icon name="receipt-outline" class="nav-icon"></ion-icon>
                    <span class="nav-text">Ordini</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link" data-target="menu">
                    <ion-icon name="fast-food-outline" class="nav-icon"></ion-icon>
                    <span class="nav-text">Menù</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link" data-target="customers">
                    <ion-icon name="people-outline" class="nav-icon"></ion-icon>
                    <span class="nav-text">Personale</span>
                </a>
            </li>
        </ul>
        <hr class="mt-0 mb-3">
        <div class="dropdown mt-auto">
            <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle"
                id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="img/npp.jpg" alt="" class="rounded-circle me-2 user-profile-pic">
                <strong class="profile-name">dapinovittorioveneto</strong>
            </a>
            <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                <li>
                    <a class="dropdown-item" href="#" data-bs-toggle="modal"
                        data-bs-target="#settingsModal">Settings</a>
                </li>
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li>
                    <hr class="dropdown-divider mt-0 mb-1">
                </li>
                <li><a class="dropdown-item" href="logout.php">Sign Out</a></li>
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
                    <form>
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
                                placeholder="Inserisci la tua password">
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


    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>
    <!-- Main Content -->
    <div class="content">
        <div id="home" class="content-section active">
            <h1 class="text-center">Benvenuto nella Dashboard</h1>
            <p class="text-center">Ciao, <?= htmlspecialchars($_SESSION["username_login"]); ?>!</p>
            <div class="text-center">
                <a href="logout.php" class="btn btn-danger">Logout</a>
            </div>
        </div>
        <div id="home" class="content-section">
            <h1>Dashboard</h1>
            <p>Contenuto della dashboard...</p>
        </div>
        <div id="analytics" class="content-section">
            <h1>Analytics</h1>
            <p>Contenuto delle analisi...</p>
        </div>
        <div id="orders" class="content-section">
            <h1>Orders</h1>
            <p>Contenuto degli ordini...</p>
        </div>
        <div id="tables" class="content-section">
            <h1>Tables</h1>
            <p>Contenuto dei tavoli...</p>
        </div>
        <div id="menu" class="content-section">
            <h1>Menù</h1>
            <p>Contenuto del menù...</p>
        </div>
        <div id="customers" class="content-section">
            <h1>Customers</h1>
            <p>Contenuto dei clienti...</p>
        </div>
    </div>

    <script>
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
            this.querySelector('ion-icon').name = sidebar.classList.contains('sidebar-collapsed')
                ? 'chevron-forward-outline'
                : 'chevron-back-outline';
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