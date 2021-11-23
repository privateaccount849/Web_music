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
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">CODE MUSIC</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="../admin.php"> Home <span class="glyphicon glyphicon-home sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="navbarDropdown">
                                Song
                            </a>
                            <div class="dropdown-content">
                                <a class="dropdown-item" href="../Song/edit_song.php">Edit Songs</a>
                                <a class="dropdown-item" href="../Song/view_song.php">Song management</a>
                                <div class="dropdown-divider"></div>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="navbarDropdown">
                                Singer
                            </a>
                            <div class="dropdown-content">
                                <a class="dropdown-item" href="../Singer/edit_singer.php">Edit Singers</a>
                                <a class="dropdown-item" href="../Singer/view_singer.php">Singer Management</a>
                                <div class="dropdown-divider"></div>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="navbarDropdown">
                                Genre
                            </a>
                            <div class="dropdown-content">
                                <a class="dropdown-item" href="edit_genres.php">Edit Genres</a>
                                <a class="dropdown-item" href="view_genres.php">Genre Management</a>
                                <div class="dropdown-divider"></div>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="navbarDropdown">
                                Users 
                            </a>
                            <div class="dropdown-content">
                                <a class="dropdown-item" href="../User/edit_user.php">Edit Users</a>
                                <a class="dropdown-item" href="../User/view_user.php">Users Management</a>
                                <div class="dropdown-divider"></div>
                            </div>
                        </li>
                        <li class="nav-item dropdown" >
                            <a class="nav-link" href="../../dangxuat.php" id="navbarDropdown">
                                Log Out
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
          </nav>
    </header>



         <div class="example">
        <div class="container">
            <form class="row" method="post">
                <h2>Edit Genres</h2>
                <table class="table">
                 <?php 
                        include("../../connect.php");
                    $GenresID='-1';
                    $GenresName='';
                    if (isset($_GET["GenresID"])) {   
                        $GenresID = intval($_GET['GenresID']);
                        $sql = " select* from genres where GenresID = $GenresID";
                        $result = mysqli_query($connect, $sql);
                        while($genres =  mysqli_fetch_array($result)){
                            $GenresID =$genres['GenresID'];
                            $GenresName =$genres['GenresName'];
                        }
                    }
                    echo "
                        <tr>
                            <td>ID</td>
                            <td colspan='2'><input type='text' name='GenresID' value='$GenresID'></td>
                        </tr>
                        <tr>
                            <td>Name of the genre</td>
                            <td colspan='2'><input type='text' name='GenresName' value='$GenresName'></td>
                        </tr>
                    ";
                  ?>

        
        <tr>
        <td><input type="submit" class="btn btn-outline-success" name="add" value="Add Genre"></td>
        <td><input type="submit" class="btn btn-outline-success" name="edit" value="Edit Genre"></td>
        <td><input type="submit" class="btn btn-outline-warning" name="delete" value="Delete Genre"></td>
        </tr>
            </table>
        </form>
        
    <?php
 
    if (isset($_POST['add'])) {
        $GenresID=$_POST['GenresID'];
        $GenresName=$_POST['GenresName'];
        $sql="insert into genres values ('$GenresID','$GenresName')";
        $result = mysqli_query($connect,$sql);
        if ($result){
            echo "<script>alert('Genre has been added successfull!')</script>";
            echo "<script>window.open('view_genres.php','_self')</script>";
        }
    else{
        echo"<script>alert('Error')</script>";
    }
    }
    
    
    
    
    if(isset($_POST['edit'])){
                $GenresID=$_POST['GenresID'];
                $GenresName=$_POST['GenresName'];
                $check_exist = mysqli_query($connect,"select * from genres");
                $genres = mysqli_fetch_array($check_exist);

                $sql="update genres set GenresName='$GenresName' where GenresID=$GenresID";
                $result = mysqli_query($connect, $sql);
                if ($result) {
                    echo "<script>alert('Genre has been edited successfull!')</script>";
                    echo "<script>window.open('view_genres.php','_self')</script>";
                }
                else {
                    echo "<script>alert('Error')</script>";
                }
            }
        
        
        
        if(isset($_POST['delete'])){
                $GenresID=$_POST['GenresID'];
                $sql="delete from genres where GenresID=$GenresID";
                $result = mysqli_query($connect, $sql);
                $check_exist = mysqli_query($connect,"select * from genres");
                $genres = mysqli_fetch_array($check_exist);
                if ($result) {
                    echo "<script>alert('Genre has been deleted successfull!')</script>";
                    echo "<script>window.open('view_genres.php','_self')</script>";
                }
                else {
                    echo "<script>alert('Error')</script>";

                }
            }


    ?>
    

        </div>
         
    </div>