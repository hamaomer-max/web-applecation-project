<?php include "init.php";in(1); ?>

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

<nav class="navbar navbar-expand-lg bg-body-tertiary m-3 rounded-4" style="background:linear-gradient(purple,black);">
<a class="navbar-brand" href="#"><img src="./photo/car.png" width="40" class="ms-2"></a>
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
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
  <li class="list-group-item m-2 rounded-2"><a href="uploed_post2.php" class="text-decoration-none text-dark"> UPLOAD YOUR POST</a></li>
  <li class="list-group-item m-2 rounded-2"><a href="owner_post2.php" class="text-decoration-none text-dark">VEIW YOUR POST</a></li>
</ul>
</div>
</div>

<div class="col-lg-8 col-sm m-auto p-3 rounded-4 " style="background:linear-gradient(purple,black);">
<div class=" m-1 row justify-content-center">
<?php

if (isset($_GET['delete'])) {
    $post_id = $database->secure($_GET['delete']);

    $deleted = $uploed->delete("`post_id` = '$post_id' AND `userid` = '$session->userid'");

    if ($deleted) {
        header("location:owner_post2.php");
    }else {
        header("location:owner_post2.php?NotFound");
    }
}

$allpost = Uploed::get_all(" `userid` = $session->userid");
foreach ($allpost as $post) { ?>
<div class="card m-2 rounded-4" style="width: 18rem;">
  <img src="./photo/<?php echo $post->filename; ?>" class="card-img-top rounded-4">
  <div class="card-body">
    <h5 class="card-title"><?php echo $post->title; ?></h5>
    <p class="card-text"><?php echo $post->detail; ?></p>
    <span class="btn btn-dark" style="    position: absolute;right: 0;top: 0;margin-top: 50%;margin-right: 5px;"><?php echo $post->price; ?> </span>
    <a href="#" class="btn btn-primary border-0" style="background:linear-gradient(purple,black);">Home</a>
    <a href="?delete=<?php echo $post->post_id; ?>" class="btn btn-warning border-0">Delete</a>
  </div>
</div>
<?php } ?>
</div>
</div>

</body>
</html>