<?php include "init.php";?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Saller</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


    <style>

    

        .image {
            display: block;
            width: 100%;
        }

        .navbar {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            padding: 10px;
            box-sizing: border-box; /* Include padding in width calculations */
        }

        .navbar a {
            text-decoration: none;
            margin: 0 10px;
        }

        .text-overlay {
            position: absolute;
            top: 40%; /* Adjust the vertical position of the text */
            left: 10%; /* Adjust the horizontal position of the text */
            color: white; /* Text color */
            font-size: 24px; /* Font size */
            font-weight: bold; /* Font weight */
        }

        .hr{
            position: absolute;
            top: 50%; /* Adjust the vertical position of the text */
            left: 50%; /* Adjust the horizontal position of the text */
            color: white; /* Text color */
            font-size: 24px; /* Font size */
            font-weight: bold; /* Font weight */
            
        }
       

        .feature-right{
          height: 120px;
          width: 80%;
          float: right;
          margin-left: 20px;
          margin-top: 20px;
          font-size: 20px;
}

.h1{
  position: absolute;
            top: 287%; /* Adjust the vertical position of the text */
            left: 45%; /* Adjust the horizontal position of the text */
            color: white; /* Text color */
            font-size: 40px; /* Font size */
}

.hr2{
  position: absolute;
            top: 296%; /* Adjust the vertical position of the text */
            left: 10%; /* Adjust the horizontal position of the text */
            right: 10%;
            color: white; /* Text color */
            font-size: 24px; /* Font size */
            font-weight: bold; /* Font weight */
}


    </style>

</head>
<body class="bg-white">
      

<div class="image-container" id="home">
        <img src="./photo/ferari2.jpg"  class="image" style="opacity: 0.9;">
        <div class="text-overlay">
            <h1 class="text-center">Welcome To The Best Website for <br>
                 <em>Salling All Types Of Cars</em></h1> <br>
            <p> in this website you can buy or cell all types of car , This site gives you the feature to buy and sell all kinds of cars and get information about them. </p>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <h1 class="text-center">All Types Are Available </h1>

            <hr width="90%">
            <br>
            <br>  
            <img src="./photo/suv.png" width="130px" class="ms-4">
            <div class="feature-right" >
            <h4>Suv Cars</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque eos dicta dolore atque eaque sit distinctio cum voluptates laborum ullam.</p>
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <img src="./photo/sedan.png" width="130" class="ms-4">
            <div class="feature-right" >
            <h4>Sedan Cars</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque eos dicta dolore atque eaque sit distinctio cum voluptates laborum ullam.</p>
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <img src="./photo/muscle-car.png" width="130" class="ms-4">
            <div class="feature-right" >
            <h4>Muscle Cars</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque eos dicta dolore atque eaque sit distinctio cum voluptates laborum ullam.</p>
            </div> 
    </div>
    <h1 class="h1">All Proudcts</h1>
    <hr class="hr2">
    </div>
    <nav class="navbar navbar-expand-lg m-3 rounded-4">
<a class="navbar-brand" href="#"><img src="./photo/car.png" width="50" class="ms-2"></a>
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="btn btn-outline-light my-1"  href="#">Home</a>
        <a class="btn btn-outline-light my-1"  href="#">About</a>
        <a class="btn btn-outline-light my-1"  href="#">Proudct</a>
      </div>
    </div>

    <div class="me-5 my-lg-0">
        <a href="registar.php" class="btn btn-outline-success w-100 ">Registar</a>
      </div>

    <div class="me-5 my-lg-0">
        <a href="?logout" class="btn btn-outline-warning w-100">Login</a>
      </div>
  </div>
</nav>


<div class="col-lg-8 col-sm m-auto p-3  rounded-4">
<div class=" m-1 row justify-content-center">
  <?php
  $allpost = Uploed::get_all(0);
  foreach ($allpost as $post) { ?>
  <div class="card m-2 rounded-4" style="width: 18rem;">
    <img src="./photo/<?php echo $post->filename; ?>" class="card-img-top rounded-4">
    <div class="card-body">
      <h5 class="card-title"><?php echo $post->title; ?></h5>
      <p class="card-text"><?php echo $post->detail; ?></p>
      <span class="btn btn-dark" style="position: absolute;right: 0;top: 0;margin-top: 50%;margin-right: 5px;"><?php echo $post->price; ?> </span>
      <a href="#" class="btn btn-primary border-0" style="background:linear-gradient(purple,black);">Buy</a>
    </div>
  </div>
 <?php } ?>
</div>
</div>

</body>
</html>