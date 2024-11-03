<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="/css/global.css" rel="stylesheet">
</head>
<body>

<script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>

<div class="d-flex flex-column justify-content-center align-items-center vh-100">
  <div class="text-center mb-4">
    <h1 class="fs-1">ADMIN LOGIN</h1>
  </div>

<!--is invalid serve per il campo rosso-->
  <form action="dashboard.php" method="GET" class="align-items-center g-3 mx-auto col-lg-2 d-flex flex-column">
  <div class="col-12 mb-4">
  <div class="input-group mb-1">
    <span class="input-group-text">
      <ion-icon name="person" style="font-size: 1.2rem;"></ion-icon>
    </span>
    <div class="form-floating is-invalid">
      <input type="text" class="form-control is-invalid" id="floatingInputGroup1" placeholder="Username">
      <label for="floatingInputGroup1">Username</label>
    </div>
  </div>
</div>

    <div class="col-12 mb-4">
  <div class="input-group mb-1">
    <span class="input-group-text">
      <ion-icon name="key" style="font-size: 1.3rem;"></ion-icon>
    </span>
    <div class="form-floating">
      <input type="text" class="form-control" id="floatingInputGroup1" placeholder="Username">
      <label for="floatingInputGroup1">Password</label>
    </div>
  </div>
</div>


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




</body>
</html>