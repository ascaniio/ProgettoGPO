<?php include 'bootstrap.inc'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CDN di Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/css.css">
    <!-- CDN di Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- CDN di React -->
    <script src="https://unpkg.com/react@17/umd/react.development.js" crossorigin></script>
    <!-- CDN di ReactDOM -->
    <script src="https://unpkg.com/react-dom@17/umd/react-dom.development.js" crossorigin></script>
    <!-- Collegamento al file JavaScript con il tuo codice React -->
    <script defer src="app.js"></script>

    <style>
      body {
          background-image: url('img/background.jpg');
          background-size: cover;
          background-attachment: fixed;
          background-position: center;
      }
    </style>
</head>
<body>
    
    <nav class="navbar fixed-top" style="background-color: #e3f2fd;">
        <div class="container-fluid">
            <a class="navbar-brand">Navbar</a>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <div class="container mt-5 pt-5">
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <!-- Immagine 400x600 all'interno della card -->
                    <img src="img/tuo-nome-immagine.jpg" class="img-fluid w-100 rounded-start" alt="Immagine della card">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content" style="height: 200vh;">
        <!-- Contenuto della tua pagina -->
    </div>

    <?php include_bootstrapJS(); ?>
</body>
</html>
