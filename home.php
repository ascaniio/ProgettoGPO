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
</head>
<body>




<nav class="navbar navbar-expand-lg" style="background-color: black; height: 80px;">
        <div class="container-fluid">
            <!-- Bottone Login a sinistra -->
            <a class="navbar-brand ms-auto" href="#">
                <img src="icon/icon-32x32.png" alt="Logo" width="40" height="40">
            </a>
            

            <!-- Barra di ricerca al centro -->
            <form class="d-flex mx-auto" role="search">
                <div class="input-group">
                    <input class="form-control" type="search" placeholder="Cerca" aria-label="Cerca">
                    <button class="btn btn-outline-primary" type="submit">Cerca</button>
                </div>
            </form>

            <!-- Logo a destra -->
            <button class="btn btn-primary me-auto" type="button">Login</button>
        </div>
    </nav>





</body>
</html>