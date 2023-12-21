<?php include "nav.php";in(0); ?>
<?php

if (isset($_POST['submit'])) {
  $username = $database->secure($_POST['username']);
  $password = $database->secure($_POST['password']);

  $chek = User::verify($username , $password);
  if ($chek) {
    $session->login($chek);
    header("location:login.php");
  }else {
    echo "<script> alert('your username or password is not available') ; </script>";
  }
}

?>

  <div class="mt-5">
    <div class="col-lg-4 col-sm text-center shadow-lg p-3 rounded-5 m-auto w-50" style="background:linear-gradient(purple,black);">
    <img src="./photo/car.png" width="100" alt="">
    <form action="login.php" method="post" class="p-3">
    <input type="text" name="username" value="<?php echo htmlspecialchars($_POST['username'] ?? ""); ?>" class="form-control mt-2 rounded-4 shadow-none border-0" placeholder="username">
    <input type="password" name="password" value="<?php echo htmlspecialchars($_POST['password'] ?? ""); ?>" class="form-control mt-3 rounded-4 shadow-none border-0" placeholder="password">
    <button type="submit" name="submit" class="btn btn-primary rounded-4 fw-bold mt-4 w-40 border-0" style="background:linear-gradient(purple,black) ;">Login</button>
    <a href="ui.php" class="btn btn-primary rounded-4 fw-bold mt-4 w-40 border-0">Back</a>
  </form>
    </div>
    </div>
   
