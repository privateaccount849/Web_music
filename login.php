<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sign-In</title>
    <link rel="stylesheet" type="text/css" href="css/login.css" />
</head>
<body>
    <form method = "post">
    <div class="loginbox">
        <h1>Sing In</h1>
        <form >
            <p>Username</p>
            <input type="text" name="UserName" required placeholder="UserName"/>
            <p>Password</p>
            <input type="Password" name="Password" required placeholder="Password"/>
            <input type="submit" name="login" value="Sign In" />
            <a href="dangky.php" style="font-size:large">Don't have an account?</a>
        </form>
    </div>
</form>
</body>
</html>

    <?php 
session_start();
  include ('connect.php');

  if(isset($_POST['login'])){

    $UserName = $_POST['UserName'];
    $Password = $_POST['Password'];
    $sql="select * from users where UserName='$UserName' AND Password='$Password'";
    $result = mysqli_query($connect,$sql);
    $check_login = mysqli_num_rows($result);
    $row_login = mysqli_fetch_array($result);   
    if($check_login == 0){
     echo "<script>alert('Password or Username is incorrect. Try again!')</script>";
     exit();
   }  
   if($check_login > 0){ 

   $_SESSION['UserName'] = $row_login['UserName']; 
    echo "<script>alert('Logged in successfully!')</script>";  
    echo"<script>window.open('index.php','_self')</script>";
  }
}
?>