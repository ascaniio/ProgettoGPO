<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trova Lavoro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/home.css">
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
        
        <!-- Colonna destra con il bottone -->
        <div class="col text-end me-0">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Login</button>
        </div>
        </div>
    </div>
    </nav>


    <!-- Modal di Accedi -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container-fluid">
                        <div class="row align-items-center">
                            <!-- Colonna sinistra vuota per la spaziatura -->
                            <div class="col-md-4"></div>

                            <!-- Colonna centrale con il titolo "Accedi" -->
                            <div class="col-md-4 text-center">
                                <h1 class="modal-title fs- modal-custom-title" id="staticBackdropLabel">ACCEDI</h1>
                            </div>

                            <!-- Colonna destra con il bottone di chiusura -->
                            <div class="col-md-4 text-end">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                <input type="text" class="form-control" id="floatingInputGroup1" placeholder="Username">
                                <label for="floatingInputGroup1">Username</label>
                            </div>
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="col-12 mb-4">
                        <div class="input-group mb-1">
                            <span class="input-group-text">
                                <ion-icon name="key-outline" style="font-size: 1.3rem;"></ion-icon>
                            </span>
                            <div class="form-floating">
                                <input type="password" class="form-control" id="floatingInputGroup2" placeholder="Password">
                                <label for="floatingInputGroup2">Password</label>
                            </div>
                        </div>
                    </div>

                    <!-- Remember me e bottone di submit -->
                    <div class="col-12 mb-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="inlineFormCheck">
                                <label class="form-check-label" for="inlineFormCheck">
                                    Remember me
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary btn-md">Submit</button>
                        </div>
                    </div>
                </form>

                <!-- Link per passare al modale di registrazione -->
                <div class="col-12 text-center mt-3">
                    <p class="mt-3">Non sei registrato? <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdropRegistrati">Clicca qui</a></p>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal di Registrazione -->
<div class="modal fade" id="staticBackdropRegistrati" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropRegistratiLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg"> <!-- Aggiunta la classe modal-lg -->
        <div class="modal-content">
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <!-- Colonna sinistra vuota per la spaziatura -->
                        <div class="col-md-4"></div>

                        <!-- Colonna centrale con il titolo "Registrati" -->
                        <div class="col-md-4 text-center">
                            <h1 class="modal-title fs-3 modal-custom-title" id="staticBackdropRegistratiLabel">REGISTRATI</h1>
                        </div>

                        <!-- Colonna destra con il bottone di chiusura -->
                        <div class="col-md-4 text-end">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                    <input type="text" class="form-control" id="floatingInputGroup1" placeholder="Nome Cognome">
                                    <label for="floatingInputGroup1">Nome</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="input-group mb-1">
                                <span class="input-group-text">
                                    <ion-icon name="person-outline" style="font-size: 1.2rem;"></ion-icon>
                                </span>
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingInputGroup1" placeholder="Nome Cognome">
                                    <label for="floatingInputGroup1">Cognome</label>
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
                                <select class="form-select" id="inputGroupSelect01" style="font-family: 'Arial', sans-serif; text-align: center; padding-top: 0.75rem; height: calc(2.25rem + 2px);">
                                    <option selected>Giorno</option>
                                    <?php
                                        foreach($array_giorni as $i){
                                            echo "<option value=\"$i\">".$i."</option>";
                                        }
                                    ?>
                                </select>
                            </div>

                            <!--Mese-->

                            <div class="form-floating">
                                <select class="form-select" id="inputGroupSelect01" style="font-family: 'Arial', sans-serif; text-align: center; padding-top: 0.75rem; height: calc(2.25rem + 2px);">
                                    <option selected>Mese</option>
                                    <?php
                                        foreach($array_mesi as $i){
                                            echo "<option value=\"$i\">".$i."</option>";
                                        }
                                    ?>
                                </select>
                            </div>

                            <!--Anno-->

                            <div class="form-floating">
                                <select class="form-select" id="inputGroupSelect01" style="font-family: 'Arial', sans-serif; text-align: center; padding-top: 0.75rem; height: calc(2.25rem + 2px);">
                                    <option selected>Anno</option>
                                    <?php
                                        foreach($array_anni as $i){
                                            echo "<option value=\"$i\">".$i."</option>";
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
                                    <input type="text" class="form-control" id="floatingInputGroup3" placeholder="Username">
                                    <label for="floatingInputGroup3">Username</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Email e Telefono-->
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="input-group mb-1">
                                <span class="input-group-text">
                                    <ion-icon name="mail-outline" style="font-size: 1.2rem;"></ion-icon>
                                </span>
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingInputGroup4" placeholder="Email">
                                    <label for="floatingInputGroup4">Email</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="input-group mb-1">
                                <span class="input-group-text">
                                    <ion-icon name="call-outline" style="font-size: 1.2rem;"></ion-icon>
                                </span>
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingInputGroup6" placeholder="Telefono">
                                    <label for="floatingInputGroup6">Telefono</label>
                                </div>
                            </div>
                        </div>
                    </div>

                

                    <!-- Password e Conferma Password -->
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="input-group mb-1">
                                <span class="input-group-text">
                                    <ion-icon name="key-outline" style="font-size: 1.3rem;"></ion-icon>
                                </span>
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="floatingInputGroup5" placeholder="Password">
                                    <label for="floatingInputGroup5">Password</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="input-group mb-1">
                                <span class="input-group-text">
                                    <ion-icon name="key-outline" style="font-size: 1.3rem;"></ion-icon>
                                </span>
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="floatingInputGroup5" placeholder="Password">
                                    <label for="floatingInputGroup5">Conferma Password</label>
                                </div>
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
                    <p class="mt-3">Già registrato? <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Clicca qui</a></p>
                </div>
            </div>
        </div>
    </div>
</div>


   
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>


