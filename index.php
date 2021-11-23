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
.im{
  margin: 0 auto
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
.ccc{
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: red
}
/*product card*/
.card-product{
	width: 100%;
	margin-left: 5px;
	margin-right: 5px;
	overflow: hidden;	
}
img.d-block {
  display: contents;
  max-width:1920px;
  max-height:530px;
  width: auto;
  height: auto;
  
}
    </style>
    <title>CD | Nghe tải nhạc chất lượng cao</title>
</head>
<body>
   <?php 
  session_start(); ?>
    <header>
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
                            <a class="nav-link" href="about.php"> <span class="glyphicon glyphicon-user"></span>Contact</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="navbarDropdown">
                                Account
                            </a>
                            <div class="dropdown-content">
                                <?php if(!isset($_SESSION['UserName'])) echo "<a class='dropdown-item' href='login.php'>Sign In</a>"
                               ?>
                                <?php if(!isset($_SESSION['UserName'])) echo "<a class='dropdown-item' href='dangky.php'>Sign Up</a>"?> 
                                <div class="dropdown-divider"></div>
                                <?php if(isset($_SESSION['UserName'])) echo "<a class='dropdown-item' href='admin/admin.php'>Admin</a>" 
                                ?>
                                <?php if(isset($_SESSION['UserName'])) echo"<a class='dropdown-item' href='dangxuat.php' id='navbarDropdown'>
                                Exit</a>"?>
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
    </header>
    <section>
        <div id="carouselExampleIndicators" class="carousel slide mt-1" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner cc">
              <div class="carousel-item active cc">
                <img  class="d-block im" src="image/denvau5.jpg" alt="First slide">
              </div>
              <div class="carousel-item im">
                <img class="d-block" src="image/denvau2.jpg" alt="Second slide">s
              </div>
              <div class="carousel-item im">
                <img class="d-block" src="image/denvau3.jpg" alt="Third slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
          <!-- 2 -->
          <div class="container">
            <div class="row mt-5">
                <h2 class="list-product-title"></h2>
                <div class="list-product-subtitle">
                    <p></p>
                </div>

                <?php
                $connect = mysqli_connect('localhost','root','','web_music');
                if (!$connect){
                  echo "ket noi that bai";
                  }
                  $sql ="select * from song";
                    $query=mysqli_query($connect,"select * from song");
                    while($row_pro=mysqli_fetch_array($query)){
                    $SongID = $row_pro['SongID'];
                    $SongName = $row_pro['SongName'];
                    $SongPrice = $row_pro['SongPrice'];
                    $SongImg = $row_pro['SongImg'];
                    $GenresID = $row_pro['GenresID'];
                    $Mp3 = $row_pro['Mp3'];
                    echo"
                    <div class='col-md-3 col-sm-6 col-12'>
                      <div class='card card-product mb-3'>
                            <img src='image/$SongImg' width='250' height='250' alt='Hinh Anh'/>
                            <div class='card-body'>
                                <h5 class='card-title'>$SongName</h5>
                                <p style='color:blue'><b>Price: $SongPrice </b>$</p>
                                   <div align='center'>
                                     <a href='detail.php?id=$SongID'><button class='btn btn-secondary' ; style='float: left;'>Play Music</button></a>
                                   </div>
                            </div>
                      </div>
                    </div>
                    ";
                  }
                ?>
                    </div>
                </div>
            </div>
        </div>
        <script src="/Vendors/css/style.css"></script>
        <script src="/Vendors/js/jquery-3.3.1.min.js"></script>
    </section>
    <footer>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <div class="collapse navbar-collapse" id="navbarSupportedContent" >
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php"> CODE MUSIC <span class="glyphicon glyphicon-home sr-only">(current)</span></a>
                        </li>
                    </ul>
                </div>
            </div>
            </nav>
    </footer>
</body>
</html>