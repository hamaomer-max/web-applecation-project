<?php include "init.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body class="bg-white">
    
<?php if ($session->get_logged_in()) { ?>
    
<nav class="navbar navbar-expand-lg bg-body-tertiary m-3 rounded-4" style="background:linear-gradient(purple,black);">
<a class="navbar-brand" href="#"><img src="./photo/car.png" width="40" class="ms-2"></a>
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <?php if ($session->rule == 2) {
          echo 
          '
          <li class="nav-item m-1">
    
          <a href="index.php" class="btn btn-dark text-white">Welcome Admin</a>

          </li>
          ';
        } ?>
        <a class="btn btn-light m-1" aria-current="page" href="index.php">Home</a>
      </div>
    </div>
    <div class="my-2 my-lg-0">
        <a href="ui.php" class="btn btn-danger w-100">Logout</a>
      </div>
  </div>
</nav>

<div class="row m-5 justify-content-center">
  <div class="col-lg-3 col-sm m-1 p-4 rounded-4" style="background:linear-gradient(purple,black);">
  <ul class="list-group">
  <li class="list-group-item m-2 rounded-2"><a href="uploed_post.php" class="text-decoration-none text-dark"> UPLOAD YOUR POST</a></li>
  <li class="list-group-item m-2 rounded-2"><a href="owner_post.php" class="text-decoration-none text-dark">VEIW YOUR POST</a></li>
  <?php if($session->rule == 2){ ?>
  <li class="list-group-item m-2 rounded-2"><a href="allpost.php" class="text-decoration-none text-dark">VEIW ALL POST</a></li>
  <li class="list-group-item m-2 rounded-2"><a href="adduser.php" class="text-decoration-none text-dark">ADD USER</a></li>
  <li class="list-group-item m-2 rounded-2"><a href="view_all_user.php" class="text-decoration-none text-dark">VEIW USER</a></li>
  <?php } ?>
</ul>
</div>
</div>

<?php } ?>
</body>
</html>