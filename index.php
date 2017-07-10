<?php
include 'login.php'; // Includes Login Script

if(isset($_SESSION['usernow'])){
  if($_SESSION['flg']==1)
  {
      header("location: admin.php");
  }
  else if($_SESSION['flg']==0)
  {
      header("location:user.php");
  }
}
#else $error="invalid username and password";
?>
<!DOCTYPE html>
  <head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
  <body>

    <center>
      <h1>Chaitanya Bharathi Institute of Technology</h1>
    </center>
    <form action="" method="post">
      <div class="imgcontainer">
        <a href="https://www.cbit.ac.in">
          <img src="images/logo.png" alt="logo" class="avatar">
        </a>
      </div>
	    <center>
	    <h2>Resource Management System</h2></center>
      <div class="container">
        <center>
          <label><b>Username</b></label>
          <input type="text" placeholder="Enter Username" name="name" required></br>
          <label><b>Password </b></label>
          <input type="password" placeholder="Enter Password" name="pass" required></br>
          <span class="err"><?php echo $error; ?></span></br>
          <button name="login" type="submit">Login</button></br>
          <input type="checkbox" checked="checked"> Remember me</br></br>
          <span class="psw"> <a href="register.html">register</a></span></center>
      </div>
    </form>

  </body>
</html>
