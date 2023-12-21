<?php include "nav.php";in(2); ?>

<div class="col-lg-8 col-sm m-auto rounded-4 text-white" style="background:linear-gradient(purple,black);">
<div class=" m-1 row justify-content-center">
<?php

if (isset($_GET['delete'])) {
  $userid = $database->secure($_GET['delete']);
  $deleted = $user->delete("`id` = '$userid'");

  if ($deleted) {
      header("location:view_all_user.php");
  }else {
      header("location:view_all_user.php?NotFound");
  }
}


$allpost = User::get_all(0);
foreach ($allpost as $post) { ?>
<div class="card m-2 rounded-4" style="width: 18rem;">
  <img src="./photo/profile.png" class="card-img-top rounded-4 w-50 m-auto">
  <div class="card-body">
    <h5 class="card-title"><?php echo $post->username; ?></h5>
    <p class="card-text"><?php echo $post->email; ?></p>
    <p class="card-text"><?php if($post->rule == 1){ echo "User";}else{echo "Admin";} ?></p>
    <a href="?delete=<?php echo $post->id; ?>" class="btn btn-warning border-0">Delete</a>
  </div>
</div>
<?php } ?>
</div>


</div>