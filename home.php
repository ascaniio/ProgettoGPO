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
</head>

<body>
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>


    <nav class="navbar custom-navbar">
        <div class="container-fluid">
            <div class="row w-100 align-items-center">
                <!-- Colonna sinistra con il logo -->
                <div class="col text-start ms-0">
                    <a class="navbar-brand">
                        <img src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="Logo" width="30" height="24">
                    </a>
                </div>

                <!-- Colonna centrale con il bottone -->
                <div class="col text-center">
                    <button class="btn btn-primary">Bottone al centro</button>
                </div>

                <!-- Colonna destra con il pulsante di login e l'icona -->
                <div class="col text-end me-0 d-flex justify-content-end align-items-center">
                    <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop">Accedi</button>
                </div>
            </div>
        </div>
    </nav>




    <!-- Modal di Accedi -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">

                    <!--Testo Accedi con la X-->
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <!-- Colonna sinistra vuota per la spaziatura -->
                            <div class="col-md-4"></div>

                            <!-- Colonna centrale con il titolo "Accedi" -->
                            <div class="col-md-4 text-center">
                                <h1 class="modal-title fs- modal-custom-title">ACCEDI</h1>
                            </div>

                            <!-- Colonna destra con il bottone di chiusura -->
                            <div class="col-md-4 text-end">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                        </div>
                    </div>

                    <br><br>

                    <!-- Form di login -->
                    <form action="home.php" method="GET" class="g-3 mx-auto col-lg-8 d-flex flex-column">

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
                                    <input type="password" class="form-control" id="password_login"
                                        name="password_login" placeholder="Password"
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
                                    <input class="form-check-input" type="checkbox" id="remember_login"
                                        name="remember_login">
                                    <label class="form-check-label" for="remember_login">Remember me</label>
                                </div>

                                <!-- Bottone di submit -->
                                <button type="submit" id="submit_login" name="submit_login"
                                    class="btn btn-primary btn-md">Accedi</button>
                            </div>
                        </div>
                    </form>

                    <!-- Link per passare al modale di registrazione -->
                    <div class="col-12 text-center mt-3">
                        <p class="mt-3">Non sei registrato? <a href="#" data-bs-toggle="modal"
                                data-bs-target="#staticBackdropRegistrati">Clicca qui</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal di Registrazione -->
    <div class="modal fade" id="staticBackdropRegistrati" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropRegistratiLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg"> <!-- Aggiunta la classe modal-lg -->
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <!-- Colonna sinistra vuota per la spaziatura -->
                            <div class="col-md-4"></div>

                            <!-- Colonna centrale con il titolo "Registrati" -->
                            <div class="col-md-4 text-center">
                                <h1 class="modal-title fs-3 modal-custom-title" id="staticBackdropRegistratiLabel">
                                    REGISTRATI</h1>
                            </div>

                            <!-- Colonna destra con il bottone di chiusura -->
                            <div class="col-md-4 text-end">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                        </div>
                    </div>

                    <br><br>

                    <!-- Form di registrazione -->
                    <form action="home.php" method="GET" class="g-3 mx-auto col-lg-12 d-flex flex-column">

                        <!-- Nome e Cognome -->
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="input-group mb-1">
                                    <span class="input-group-text">
                                        <ion-icon name="person-outline" style="font-size: 1.2rem;"></ion-icon>
                                    </span>

                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="nome_register" nome="nome_register"
                                            placeholder="Nome Cognome">
                                        <label for="nome_register">Nome</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-4">
                                <div class="input-group mb-1">
                                    <span class="input-group-text">
                                        <ion-icon name="person-outline" style="font-size: 1.2rem;"></ion-icon>
                                    </span>

                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="cognome_register"
                                            name="cognome_register" placeholder="Nome Cognome">
                                        <label for="cognome_register">Cognome</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Data nascita-->
                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <div class="input-group mb-1">
                                    <span class="input-group-text">
                                        <ion-icon name="calendar-outline" style="font-size: 1.2rem;"></ion-icon>
                                    </span>

                                    <?php
                                    $array_giorni = range(1, 31);

                                    $array_mesi = ["Gennaio", "Febbraio", "Marzo", "Aprile", "Maggio", "Giugno", "Luglio", "Agosto", "Settembre", "Ottobre", "Novembre", "Dicembre"];

                                    $array_anni = range(2024, 1920);
                                    ?>

                                    <!--Giorno-->
                                    <div class="form-floating">
                                        <select class="form-select" id="giorno_register" name="giorno_register"
                                            style="font-family: 'Arial', sans-serif; text-align: center; padding-top: 0.75rem; height: calc(2.25rem + 2px);">
                                            <option selected>Giorno</option>
                                            <?php
                                            foreach ($array_giorni as $i) {
                                                echo "<option value=\"$i\">" . $i . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <!--Mese-->
                                    <div class="form-floating">
                                        <select class="form-select" id="mese_register" name="mese_register"
                                            style="font-family: 'Arial', sans-serif; text-align: center; padding-top: 0.75rem; height: calc(2.25rem + 2px);">
                                            <option selected>Mese</option>
                                            <?php
                                            foreach ($array_mesi as $i) {
                                                echo "<option value=\"$i\">" . $i . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <!--Anno-->
                                    <div class="form-floating">
                                        <select class="form-select" id="anno_register" name="anno_register"
                                            style="font-family: 'Arial', sans-serif; text-align: center; padding-top: 0.75rem; height: calc(2.25rem + 2px);">
                                            <option selected>Anno</option>
                                            <?php
                                            foreach ($array_anni as $i) {
                                                echo "<option value=\"$i\">" . $i . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <!-- Username -->
                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <div class="input-group mb-1">
                                    <span class="input-group-text">
                                        <ion-icon name="at-outline" style="font-size: 1.4rem;"></ion-icon>
                                    </span>

                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="username_register"
                                            name="username_register" placeholder="Username">
                                        <label for="username_register">Username</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Email e Telefono-->
                        <div class="row">
                            <?php
                            foreach ($array_anni as $i) {$array_prefissi = [
                                "+1 Stati Uniti/Canada",
                                "+7 Russia/Kazakistan",
                                "+20 Egitto",
                                "+27 Sudafrica",
                                "+30 Grecia",
                                "+31 Paesi Bassi",
                                "+32 Belgio",
                                "+33 Francia",
                                "+34 Spagna",
                                "+36 Ungheria",
                                "+39 Italia",
                                "+40 Romania",
                                "+41 Svizzera",
                                "+43 Austria",
                                "+44 Regno Unito",
                                "+45 Danimarca",
                                "+46 Svezia",
                                "+47 Norvegia",
                                "+48 Polonia",
                                "+49 Germania",
                                "+51 Perù",
                                "+52 Messico",
                                "+53 Cuba",
                                "+54 Argentina",
                                "+55 Brasile",
                                "+56 Cile",
                                "+57 Colombia",
                                "+58 Venezuela",
                                "+60 Malesia",
                                "+61 Australia",
                                "+62 Indonesia",
                                "+63 Filippine",
                                "+64 Nuova Zelanda",
                                "+65 Singapore",
                                "+66 Thailandia",
                                "+81 Giappone",
                                "+82 Corea del Sud",
                                "+84 Vietnam",
                                "+86 Cina",
                                "+90 Turchia",
                                "+91 India",
                                "+92 Pakistan",
                                "+93 Afghanistan",
                                "+94 Sri Lanka",
                                "+95 Myanmar",
                                "+98 Iran",
                                "+211 Sud Sudan",
                                "+212 Marocco",
                                "+213 Algeria",
                                "+216 Tunisia",
                                "+218 Libia",
                                "+220 Gambia",
                                "+221 Senegal",
                                "+222 Mauritania",
                                "+223 Mali",
                                "+224 Guinea",
                                "+225 Costa d'Avorio",
                                "+226 Burkina Faso",
                                "+227 Niger",
                                "+228 Togo",
                                "+229 Benin",
                                "+230 Mauritius",
                                "+231 Liberia",
                                "+232 Sierra Leone",
                                "+233 Ghana",
                                "+234 Nigeria",
                                "+235 Ciad",
                                "+236 Repubblica Centrafricana",
                                "+237 Camerun",
                                "+238 Capo Verde",
                                "+239 Sao Tome e Principe",
                                "+240 Guinea Equatoriale",
                                "+241 Gabon",
                                "+242 Congo (Brazzaville)",
                                "+243 Congo (Kinshasa)",
                                "+244 Angola",
                                "+245 Guinea-Bissau",
                                "+246 Diego Garcia",
                                "+248 Seychelles",
                                "+249 Sudan",
                                "+250 Ruanda",
                                "+251 Etiopia",
                                "+252 Somalia",
                                "+253 Gibuti",
                                "+254 Kenya",
                                "+255 Tanzania",
                                "+256 Uganda",
                                "+257 Burundi",
                                "+258 Mozambico",
                                "+260 Zambia",
                                "+261 Madagascar",
                                "+262 Isola della Réunion",
                                "+263 Zimbabwe",
                                "+264 Namibia",
                                "+265 Malawi",
                                "+266 Lesotho",
                                "+267 Botswana",
                                "+268 Eswatini",
                                "+269 Comore",
                                "+290 Sant'Elena",
                                "+291 Eritrea",
                                "+297 Aruba",
                                "+298 Isole Fær Øer",
                                "+299 Groenlandia",
                                "+350 Gibilterra",
                                "+351 Portogallo",
                                "+352 Lussemburgo",
                                "+353 Irlanda",
                                "+354 Islanda",
                                "+355 Albania",
                                "+356 Malta",
                                "+357 Cipro",
                                "+358 Finlandia",
                                "+359 Bulgaria",
                                "+370 Lituania",
                                "+371 Lettonia",
                                "+372 Estonia",
                                "+373 Moldavia",
                                "+374 Armenia",
                                "+375 Bielorussia",
                                "+376 Andorra",
                                "+377 Monaco",
                                "+378 San Marino",
                                "+380 Ucraina",
                                "+381 Serbia",
                                "+382 Montenegro",
                                "+383 Kosovo",
                                "+385 Croazia",
                                "+386 Slovenia",
                                "+387 Bosnia",
                            ];

                            ?>

                            <div class="col-md-6 mb-4">
                                <div class="input-group mb-1">
                                    <span class="input-group-text">
                                        <ion-icon name="mail-outline" style="font-size: 1.2rem;"></ion-icon>
                                    </span>
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="email_register"
                                            name="email_register" placeholder="Email">
                                        <label for="email_register">Email</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-4">
                                <div class="input-group mb-1">
                                    <span class="input-group-text">
                                        <ion-icon name="call-outline" style="font-size: 1.2rem;"></ion-icon>
                                    </span>

                                    <div class="form-floating" style="flex-basis: 23%; max-width: 23%;">
                                        <select class="form-select" id="giorno_register" name="giorno_register"
                                            style="font-family: 'Arial', sans-serif; text-align: center; padding-top: 0.75rem; height: calc(2.25rem + 2px);">
                                            <option selected>-</option>
                                            <?php
                                            foreach ($array_prefissi as $i) {
                                                echo "<option value=\"$i\">" . $i . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-floating" style="flex-grow: 1;">
                                        <input type="text" class="form-control" id="telefono_register"
                                            name="telefono_register" placeholder="Telefono">
                                        <label for="telefono_register">Telefono</label>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <!-- Password e Conferma Password -->
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="input-group mb-1" style="position: relative;">
                                    <span class="input-group-text"
                                        style="border-top-left-radius: 0.375rem; border-bottom-left-radius: 0.375rem; border-right: 0;">
                                        <ion-icon name="key-outline" style="font-size: 1.3rem;"></ion-icon>
                                    </span>
                                    <div class="form-floating" style="flex-grow: 1;">
                                        <input type="password" class="form-control" id="password_register"
                                            name="password_register" placeholder="Password"
                                            style="border-top-left-radius: 0; border-bottom-left-radius: 0; border-top-right-radius: 0.375rem; border-bottom-right-radius: 0.375rem; padding-right: 2.5rem;">
                                        <label for="password_register">Password</label>
                                    </div>
                                    <ion-icon name="eye-outline" id="toggleEyeIconPassword"
                                        onclick="togglePasswordVisibility('password_register', 'toggleEyeIconPassword')"
                                        style="font-size: 1.3rem; position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer; pointer-events: auto;"></ion-icon>
                                </div>
                            </div>

                            <div class="col-md-6 mb-4">
                                <div class="input-group mb-1" style="position: relative;">
                                    <span class="input-group-text"
                                        style="border-top-left-radius: 0.375rem; border-bottom-left-radius: 0.375rem; border-right: 0;">
                                        <ion-icon name="key-outline" style="font-size: 1.3rem;"></ion-icon>
                                    </span>
                                    <div class="form-floating" style="flex-grow: 1;">
                                        <input type="password" class="form-control" id="passwordConf_register"
                                            name="passwordConf_register" placeholder="Conferma Password"
                                            style="border-top-left-radius: 0; border-bottom-left-radius: 0; border-top-right-radius: 0.375rem; border-bottom-right-radius: 0.375rem; padding-right: 2.5rem;">
                                        <label for="passwordConf_register">Conferma Password</label>
                                    </div>
                                    <ion-icon name="eye-outline" id="toggleEyeIconPasswordConf"
                                        onclick="togglePasswordVisibility('passwordConf_register', 'toggleEyeIconPasswordConf')"
                                        style="font-size: 1.3rem; position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer; pointer-events: auto;"></ion-icon>
                                </div>
                            </div>
                        </div>

                        <!-- Bottone di submit -->
                        <div class="col-12 text-center mb-4">
                            <button type="submit" class="btn btn-primary btn-md">Registrati</button>
                        </div>
                    </form>

                    <!-- Link per passare al modale di login -->
                    <div class="col-12 text-center mt-3">
                        <p class="mt-3">Già registrato? <a href="#" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop">Clicca qui</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>



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