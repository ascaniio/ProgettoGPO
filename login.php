<?php
session_start();

// Controllo se l'utente è già loggato
if (isset($_SESSION["username_login"]) && $_SESSION["username_login"] === "username") {
    header("Location: dashboard.php");
    exit();
}

// Controllo delle credenziali fornite dall'utente
if (isset($_POST["submit_login"])) {
    $username = $_POST["username_login"];
    $password = $_POST["password_login"];

    // Se le credenziali sono corrette
    if ($username === "username" && $password === "password") {
        $_SESSION["username_login"] = $username; // Salvo l'username nella sessione
        header("Location: dashboard.php"); // Reindirizzo alla dashboard
        exit();
    } else {
        $error_message = "Credenziali non valide. Riprova."; // Messaggio di errore
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trova Lavoro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/global.css">
    <style>
        .bold-title {
            font-weight: 700;
        }

        input:focus,
        .form-control:focus {
            outline: none;
            /* Rimuove l'ombra blu */
            box-shadow: none;
            /* Rimuove eventuali ombre */
        }
    </style>
</head>

<body>
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>

    <div class="d-flex justify-content-center align-items-center vh-100">
        <!-- Contenitore bianco con l'ombra -->
        <div class="bg-white p-5 rounded shadow-lg" style="width: 100%; max-width: 400px;">
            <!-- Titolo centrato in alto -->
            <div class="text-center mb-4">
                <h2 class="bold-title">LOGIN</h2>
            </div>
            <!-- Form -->
            <form action="" method="POST" class="g-3">
                <!-- Username -->
                <div class="col-12 mb-4">
                    <div class="input-group mb-1">
                        <span class="input-group-text">
                            <ion-icon name="person-outline" style="font-size: 1.2rem;"></ion-icon>
                        </span>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="username_login" name="username_login"
                                placeholder="Username">
                            <label for="username_login">Username</label>
                        </div>
                    </div>
                </div>

                <!-- Password -->
                <div class="col-12 mb-4">
                    <div class="input-group mb-1" style="position: relative;">
                        <span class="input-group-text"
                            style="border-top-left-radius: 0.375rem; border-bottom-left-radius: 0.375rem; border-right: 0;">
                            <ion-icon name="key-outline" style="font-size: 1.2rem;"></ion-icon>
                        </span>
                        <div class="form-floating" style="flex-grow: 1;">
                            <input type="password" class="form-control" id="password_login" name="password_login"
                                placeholder="Password"
                                style="border-top-left-radius: 0; border-bottom-left-radius: 0; border-top-right-radius: 0.375rem; border-bottom-right-radius: 0.375rem; padding-right: 2.5rem;">
                            <label for="password_login">Password</label>
                        </div>
                        <!-- Icona occhio per mostrare/nascondere password -->
                        <ion-icon name="eye-outline" id="toggleEyeIconLogin"
                            onclick="togglePasswordVisibility('password_login', 'toggleEyeIconLogin')"
                            style="font-size: 1.3rem; position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer; pointer-events: auto;"></ion-icon>
                    </div>
                </div>

                <!-- Remember me e bottone di submit -->
                <div class="col-12 mb-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Remember me -->
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="remember_login" name="remember_login">
                            <label class="form-check-label" for="remember_login">Remember me</label>
                        </div>
                        <!-- Bottone di submit -->
                        <button type="submit" id="submit_login" name="submit_login" class="btn btn-primary btn-md">
                            Accedi
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php
    if (isset($_POST["submit"])) {

        $_SESSION["username_login"] = $_POST["username_login"];

        $_SESSION["password_login"] = $_POST["password_login"];

        header("Location: dashboard.php");

    }

    ?>

    <script>
        function togglePasswordVisibility(passwordId, iconId) {
            const passwordField = document.getElementById(passwordId);
            const eyeIcon = document.getElementById(iconId);

            if (passwordField.type === "password") {
                passwordField.type = "text";
                eyeIcon.setAttribute("name", "eye-off-outline");
            } else {
                passwordField.type = "password";
                eyeIcon.setAttribute("name", "eye-outline");
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>