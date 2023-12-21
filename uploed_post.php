<?php require_once "nav.php";in(1); ?>

<div class="col-lg-8 col-sm m-auto p-3 rounded-4 " style="background:linear-gradient(purple,black);">

<?php


if (isset($_POST['submit'])) {
   
    $uploed->userid = $session->userid; // Assuming you have a $session object
    $uploed->title = $_POST['title'];
    $uploed->detail = $_POST['detail'];
    $uploed->price = $_POST['price'];
    $uploed->set_image($_FILES['file']);

   echo "<div class = 'alert alert-warning text-center fw-bold'> ". $uploed->save() ." </div>";
}

?>



<form action="uploed_post.php" class="rounded-4 p-3 text-center" method="post" enctype="multipart/form-data">
<img src="./photo/folder.png" width="100">
<input type="text" name="title" placeholder="title" class="form-control m-1 border-0 shadow-none">
<textarea name="detail" placeholder="detail" class="form-control m-1 border-0 shadow-none"></textarea>
<input type="text" name="price" placeholder="price" class="form-control m-1 border-0 shadow-none">
<input type="file" name="file" class="form-control m-1 border-0 shadow-none"> 
<button name="submit" class="btn btn-primary w-100">Uploed</button>
</form>

</div>