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
<body>
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
                            <a class="nav-link" href="about.php"> <span class="glyphicon glyphicon-user"></span>About</a>
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



        

<?php 

require_once("connect.php");
if ($_SERVER['REQUEST_METHOD']=='POST') {
  $id =$_POST['id'];
  if (empty($_SESSION['cart'][$id])) {
    $q=mysqli_query($connect,"SELECT * FROM song WHERE SongID = {$id}");
    $product = mysqli_fetch_assoc($q);
    $_SESSION['cart'][$id]=$product;
    $_SESSION['cart'][$id]['sl']=$_POST['sl'];
  }
  
 }
 ?>
 <div class="container-fluid">
 <div class="row">
  <link rel="stylesheet" type="text/css" href="cart.css">
  <h3 class="giohang"><i class="fas fa-shopping-cart"></i>  Cart</h3>
  <br>
  <br>
  <?php 
  if (!empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) :
    ?>
    <div class="products" style="border: 2px solid black">
    <a href="single.php?id=<?php echo $item['SongID']?>" style="text-decoration: none;">
    <div><img src="image/<?php echo $item['SongImg']?>" class="img-cart"></div>
    <h2><?php echo $item['SongName'] ?></h2>
        <p style="color: red">Price: <?php echo $item['SongPrice']." $"; ?></p>
             <?php
    echo "<a href='delcart.php?productid=$item[SongID]' style='text-decoration: none;'>Delete</a>";
    ?> 

       </a>
         </div>
           <?php
  endforeach;
  }
  else 
    echo "There are no products in the product";
  ?>
  <div id="total" class="clearfix">
     <?php
     $tong = 0;
      foreach ($_SESSION['cart'] as $item ) :
      $tong += $item['sl'] * $item['SongPrice'];
     endforeach;
     ?>
     </div>

     <div class="container" style="border-top:3px solid #38D276;margin-top: 20px">
        <div class="col-md-6" style="border: 1px solid #38D276">
            <h3 style="text-align: center;">Payment</h3>
  <form method="POST" action="thanhtoan.php" class="was-validated">
    <div class="form-group">
      <label for="usr">UserName:</label>
      <input type="text" class="form-control" id="usr" name="name" value="<?php if(isset($_SESSION['UserName'])) {echo $_SESSION['UserName'];}  ?>" readonly>
    </div>
    <label for="bank">Select payment bank</label>
  <select class="custom-select" required id="bank" name="bank">
    <option selected></option>
    <option value="Vietcombank">Vietcombank</option>
    <option value="Techcombank">Techcombank</option>
    <option value="Airpay">Airpay</option>
    <option value="momo">Momo</option>
  </select>
<div class="form-group">
  <div class="form-group">
  <label for="usr">Order date:</label>
  <input type="text" class="form-control" id="usr" name="date" value="<?php
  date_default_timezone_set('Asia/Ho_Chi_Minh');
echo "". date("d-m-Y h:i:s a");
?>"readonly>
</div>
<div class="form-group">
  <label for="usr">Total</label>
  <input type="text" class="form-control" id="usr" value=" <?php echo number_format($tong) ." $" ?>" readonly name="total">
</div>
<input type="submit" class="btn btn-success" value="Pay">
  </form>
</div>
</div>
</div>
</div>
</body>
</html>