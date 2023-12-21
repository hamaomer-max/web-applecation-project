<?php require_once "nav.php";in(0); ?> 

<?php
if (isset($_POST['submit'])) {
    $user->username = $_POST['username'];
    $user->email = $_POST['email'];
    $user->password = hash('gost',$_POST['password']);
    $user->rule = $_POST['rule'];
    
    if ($user->create() === true) {
        header("location:index.php");
    }else {
        echo "not add";
    }
}
?>
<form action="registar.php" class="col-lg-4 col-sm text-center shadow-lg p-3 rounded-5 m-auto w-50 mt-4" style="background:linear-gradient(purple,white);" method="post" enctype="multipart/form-data">
<img src="./photo/car.png" width="100">
<input type="text" name="username" placeholder="username" class="form-control m-1 border-0 shadow-none">
<input type="text" name="email" placeholder="email" class="form-control m-1 border-0 shadow-none">
<input type="text" name="password" placeholder="password" class="form-control m-1 border-0 shadow-none">
<button name="submit" class="btn btn-primary rounded-4 fw-bold mt-4 w-40 border-0" style="background:linear-gradient(purple,black) ;">Registar</button>
<a href="ui.php" class="btn btn-primary rounded-4 fw-bold mt-4 w-40 border-0">Back</a>
</form>


