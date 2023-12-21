<?php require_once "nav.php";in(2); ?> 
<div class="col-lg-8 col-sm m-auto rounded-4 text-white" style="background:linear-gradient(purple,black);">
<?php
if (isset($_POST['submit'])) {
    $user->username = $_POST['username'];
    $user->email = $_POST['email'];
    $user->password = hash('gost',$_POST['password']);
    $user->rule = $_POST['rule'];
    
    if ($user->create() === true) {
        header("location:adduser.php");
    }else {
        echo "not add";
    }
}
?>
<form action="adduser.php" class="rounded-4 p-3 text-center" method="post" enctype="multipart/form-data">
<img src="./photo/profile.png" width="100">
<input type="text" name="username" placeholder="username" class="form-control m-1 border-0 shadow-none">
<input type="text" name="email" placeholder="email" class="form-control m-1 border-0 shadow-none">
<input type="text" name="password" placeholder="password" class="form-control m-1 border-0 shadow-none">
<select name="rule" class="form-control m-1 border-0 shadow-none">
    <option value="1">User</option>
    <option value="2">Admin</option>
</select>
<button name="submit" class="btn btn-primary w-100">Add User</button>
</form>





<?php






// create CRUD
/*
$users = User::get_all();
$user->username = "tre";
$user->password = "tre112233"; // Ensure to hash the password for security
$user->email = "tre@gmail.com";
$user->rule = 1; // Set the appropriate role

// Call the create method to insert the new user into the database
$result = $user->create();

if ($result) {
    echo "User created successfully!";
} else {
    echo "Error creating user.";
}*/




// update CRUD 

/*
$user = User::get_by_id(5);

if ($user) {
    echo "username: " . $user->username;
    echo "email: " . $user->email;

    // Update some data
    $user->username = "tre";
    $user->email = "tre@gmail.com";
    $user->update();
} else {
    echo "User not found.";
}
*/
?>

</div>