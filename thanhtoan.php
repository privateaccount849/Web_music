<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/33a12d68d3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../Demowebsite(1)/Vendors/css/grid.css">
    <link rel="stylesheet" type="text/css" href="/Vendors/css/style.css">
  <link rel="stylesheet" type="text/css" href="/Resources/bootstrap-5.0.0-beta3-dist/css/bootstrap.min.css">

    <style>
        *{
  margin: 0;
  padding: 0;
}

body{
    background-image: url(https://image4.uhdpaper.com/wallpaper/mountain-scenery-landscape-sunset-uhdpaper.com-4K-4.3289.jpg);
    background-repeat: no-repeat;
    background-size:cover;
}
/*xử lý menu*/
.dropdown{
  position: relative;
  display: inline-block;
}
.dropdown-content{
  display: none;
  position: absolute;
  z-index: 1;
  background-color: #f5f5f5;
}
.dropdown:hover .dropdown-content{
  display: block;
}
/*list product*/
.list-product-title{
  width: 100%;
  text-transform: uppercase;
  margin-left: 5px;
  margin-right: 5px;

}
.list-product-subtitle{
  width: 100%;
  margin-left: 5px;
  margin-right: 5px;
}

/*product card*/
.card-product{
  width: 100%;
  margin-left: 5px;
  margin-right: 5px;
  overflow: hidden; 
}
img.d-block {
  display: block;
  max-width:1920px;
  max-height:530px;
  width: auto;
  height: auto;
  
}
    </style>
    <title>Document</title>
</head>

  <?php 
  session_start(); ?>
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="index.php">CODE MUSIC</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php"> Home <span class="glyphicon glyphicon-home sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.php"> <span class="glyphicon glyphicon-user"></span>Stream</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="navbarDropdown">
                                Account
                            </a>
                            <div class="dropdown-content">
                                <?php if(!isset($_SESSION['UserName'])) echo "<a class='dropdown-item' href='login.php'>Sign In</a>"
                               ?>
                                <?php if(!isset($_SESSION['UserName'])) echo "<a class='dropdown-item' href='dangky.php'>Sign Up</a>" ?> 
                                <div class="dropdown-divider"></div>
                                <?php if(isset($_SESSION['UserName'])) echo "<a class='dropdown-item' href='admin/admin.php'>Admin</a>" 
                                ?>
                                <?php if(isset($_SESSION['UserName'])) echo"<a class='dropdown-item' href='dangxuat.php' id='navbarDropdown'>
                                Log Out</a>"  ?>
                            </div>
                        </li>
                    </ul>
                    
                    <form class="form-inline my-2 my-lg-0" method="get" action="search.php" enctype="multipart/form-data">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="searchName">
                        <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </div>
          </nav>

    </div>

    <h3 style="text-align: center;">Congratulations on your payment and you can now download it</h3>
 <?php 
 require_once("connect.php");
  if($_SERVER['REQUEST_METHOD']=='POST'){
  $total=$_POST['total'];
  $date=$_POST['date'];
  $usn=$_POST['name'];
  $bank=$_POST['bank'];
  
  $sql="INSERT INTO orders (Total,OderDate,UserNameC,Bank) VALUES ('$total','$date','$usn','$bank')";
if(mysqli_query($connect,$sql)){
  echo "thanh toan thanh cong";
}
else{
  echo "Error: ".mysqli_errno($connect);
}
}
 ?>

 <div class="container-fluid">
 <div class="row">
  <link rel="stylesheet" type="text/css" href="cart.css">
  <?php 
  if (!empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) :
    ?>
    <div class="products" style="border: 2px solid black">
    <div><img src="image/<?php echo $item['SongImg']?>" class="img-cart"></div>
    <h2><?php echo $item['SongName'] ?></h2>
        <audio controls controlsList="autodownload">
          <source src="song/<?php echo $item['Mp3'] ?>" type="audio/mpeg">
          </audio>
         </a>
         </div>
           <?php
  endforeach;
  }
     ?>
  </div>  
 
 </div>
 </html>
 