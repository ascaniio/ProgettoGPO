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
    <style>
        body {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 280px;
            flex-shrink: 0;
            background-color: #f8f9fa;
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
            /* Altezza massima */
            width: 35px;
            /* Mantiene proporzioni */
            margin-right: 8px;
        }

        .image-upload {
            position: relative;
            width: 75px;
            height: 75px;
            border-radius: 50%;
            overflow: hidden;
            background-color: #f0f0f0;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .image-upload input[type="file"] {
            display: none;
        }

        .image-upload img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .image-upload .icon-camera {
            font-size: 2rem;
            color: #6c757d;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="d-flex flex-column flex-shrink-0 p-3 sidebar">
        <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
            <img src="img/npp.jpg" alt="" class="sidebar-logo rounded-circle me-2">
            <strong><span class="fs-4">Da Pino</span></strong>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto" id="sidebarNav">
            <li class="nav-item">
                <a href="#" class="nav-link active" data-target="home">
                    <svg class="bi me-2" width="16" height="16">
                        <use xlink:href="#home"></use>
                    </svg>
                    Home
                </a>
            </li>
            <li>
                <a href="#" class="nav-link" data-target="dashboard">
                    <svg class="bi me-2" width="16" height="16">
                        <use xlink:href="#speedometer2"></use>
                    </svg>
                    Analytics
                </a>
            </li>
            <li>
                <a href="#" class="nav-link" data-target="orders">
                    <svg class="bi me-2" width="16" height="16">
                        <use xlink:href="#table"></use>
                    </svg>
                    Tavoli
                </a>
            </li>
            <li>
                <a href="#" class="nav-link" data-target="products">
                    <svg class="bi me-2" width="16" height="16">
                        <use xlink:href="#grid"></use>
                    </svg>
                    Ordini
                </a>
            </li>
            <li>
                <a href="#" class="nav-link" data-target="customers">
                    <svg class="bi me-2" width="16" height="16">
                        <use xlink:href="#people-circle"></use>
                    </svg>
                    Portate
                </a>
            </li>
            <li>
                <a href="#" class="nav-link" data-target="customers">
                    <svg class="bi me-2" width="16" height="16">
                        <use xlink:href="#people-circle"></use>
                    </svg>
                    Personale
                </a>
            </li>
        </ul>
        <hr>
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle"
                id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="img/npp.jpg" alt="" width="32" height="32" class="rounded-circle me-2">
                <strong>dapinovittorioveneto</strong>
            </a>
            <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                <li>
                    <!-- Bottone "Settings" che attiva il Modal -->
                    <a class="dropdown-item" href="#" data-bs-toggle="modal"
                        data-bs-target="#settingsModal">Settings</a>
                </li>
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="logout.php">Sign Out</a></li>
            </ul>
        </div>

        <!-- Modal per Settings -->
        <div class="modal fade" id="settingsModal" tabindex="-1" aria-labelledby="settingsModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="settingsModalLabel">Settings</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
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
                                <input type="email" class="form-control" id="email"
                                    placeholder="Inserisci la tua email">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password"
                                    placeholder="Inserisci la tua password">
                            </div>

                            <div class="mb-3">
                                <label for="imageInput" class="form-label">Upload an image</label>
                                <div class="image-upload" onclick="document.getElementById('imageInput').click()">
                                    <ion-icon name="camera-outline" class="icon-camera"></ion-icon>
                                    <img id="imagePreview" src="" alt="" style="display: none;">
                                    <input type="file" id="imageInput" accept=".jpg,.jpeg,.png"
                                        onchange="previewImage(event)">
                                </div>
                            </div>

                            <div class="form-floating" style="flex-grow: 1;">
                                <input type="password" class="form-control" id="password_login" name="password_login"
                                    placeholder="Password"
                                    style="border-top-left-radius: 0; border-bottom-left-radius: 0; border-top-right-radius: 0.375rem; border-bottom-right-radius: 0.375rem; padding-right: 2.5rem;">
                                <label for="password_login">Password</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Salva modifiche</button>
                        </form>
                    </div>
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
        <div id="dashboard" class="content-section">
            <h1>Dashboard</h1>
            <p>Contenuto della dashboard...</p>
        </div>
        <div id="orders" class="content-section">
            <h1>Orders</h1>
            <p>Contenuto degli ordini...</p>
        </div>
        <div id="products" class="content-section">
            <h1>Products</h1>
            <p>Contenuto dei prodotti...</p>
        </div>
        <div id="customers" class="content-section">
            <h1>Customers</h1>
            <p>Contenuto dei clienti...</p>
        </div>
    </div>

    <script>
        function previewImage(event) {
            const fileInput = event.target;
            const file = fileInput.files[0];
            const preview = document.getElementById('imagePreview');
            const icon = document.querySelector('.icon-camera');

            if (file && (file.type === 'image/jpeg' || file.type === 'image/png')) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                    icon.style.display = 'none';
                };
                reader.readAsDataURL(file);
            } else {
                alert('Please upload a valid JPG or PNG image.');
            }
        }

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