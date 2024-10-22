<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-touch.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">

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

</head>
<body>

<nav class="navbar navbar-dark" style="background-color: #333333;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="icon/icon-32x32.png" alt="Logo" width="32" height="32" class="d-inline-block align-text-top">
      Bootstrap
    </a>
    <div class="d-flex">
      <a class="nav-link text-light" href="#">Login</a>
      <a class="nav-link text-light" href="#">Signup</a>
    </div>
  </div>
</nav>



    

<!-- Div dove React inietterà il contenuto -->
<div id="root"></div>


<!-- Bootstrap JavaScript e dipendenze (opzionale per componenti interattivi) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>