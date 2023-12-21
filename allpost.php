<?php include "nav.php";in(2); ?>

<div class="col-lg-8 col-sm m-auto rounded-4 text-white" style="background:linear-gradient(purple,black);">
<div class=" m-1 row justify-content-center">
<?php

if (isset($_GET['delete'])) {
  $post_id = $database->secure($_GET['delete']);

  $deleted = $uploed->delete("`post_id` = '$post_id'");

  if ($deleted) {
      header("location:allpost.php");
  }else {
      header("location:allpost.php?NotFound");
  }
}


$allpost = Uploed::get_all(0);
foreach ($allpost as $post) { ?>
<div class="card m-2 rounded-4" style="width: 18rem;">
  <img src="./photo/<?php echo $post->filename; ?>" class="card-img-top rounded-4">
  <div class="card-body">
    <h5 class="card-title"><?php echo $post->title; ?></h5>
    <p class="card-text"><?php echo $post->detail; ?></p>
    <span class="btn btn-dark" style="    position: absolute;right: 0;top: 0;margin-top: 50%;margin-right: 5px;"><?php echo $post->price; ?> </span>
    <a href="#" class="btn btn-primary border-0" style="background:linear-gradient(purple,black);">HOME</a>
    <a href="?delete=<?php echo $post->post_id; ?>" class="btn btn-warning border-0">Delete</a>
  </div>
</div>
<?php } ?>
</div>


</div>