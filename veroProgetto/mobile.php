<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .navbar .row {
            margin: 0 auto;
            max-width: 600px;
        }

        .profile-picture-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .btn-lg {
            font-size: 1.5rem;
        }

        .btn-wide {
            width: 90%;
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
    </style>
</head>

<body>
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid d-flex justify-content-center">
            <div class="row w-100 align-items-center text-center">
                <div class="col-5 d-flex justify-content-center">
                    <button class="btn btn-primary btn-lg btn-wide">Ordini</button>
                </div>
                <div class="col-2 d-flex justify-content-center">
                    <div class="dropdown profile-picture-container">
                        <a href="#" class="d-flex align-items-center link-dark text-decoration-none" id="dropdownUser2"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="img/npp.jpg" alt="" class="rounded-circle user-profile-pic" width="55"
                                height="55">
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
                                <a class="dropdown-item d-flex align-items-center" href="dashboard.php">
                                    <ion-icon name="desktop-outline" class="dropdown-icon"></ion-icon>
                                    <span>Desktop</span>
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

                <div class="col-5 d-flex justify-content-center">
                    <button class="btn btn-primary btn-lg btn-wide">Tavoli</button>
                </div>
            </div>
        </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>