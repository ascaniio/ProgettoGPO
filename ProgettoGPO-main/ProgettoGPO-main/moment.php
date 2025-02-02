 <!-- Modal -->
 <div class="modal" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                    <ion-icon name="person" style="font-size: 1.2rem;"></ion-icon>
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
                                    <ion-icon name="key" style="font-size: 1.3rem;"></ion-icon>
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
                                <button type="submit" class="btn btn-primary btn-md">Accedi</button>
                            </div>
                        </div>
                        
                    </form>

                    <div class="col-12 text-center mt-3">
                        <p>Non sei registrato? <a href="register.php" class="text-decoration-none">Clicca qui</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
