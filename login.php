<?php
session_start();
$error="";
$flag=0;
    if(isset($_POST['login']))
    {
      $user=$_POST["name"];
      $pswd=$_POST["pass"];
      $conn=mysqli_connect("localhost","dachi","dachi");
      $sql1="select * from rms.credential where username='$user' and pass='$pswd';";
      $res=mysqli_query($conn,$sql1);
      #echo "hi";
      if(mysqli_num_rows($res)==1)
      {
        while($row = mysqli_fetch_assoc($res)) {
        $flag=$row["flag"];}
        echo $flag;
        $_SESSION['usernow']=$user;
        $_SESSION['flg']=$flag;
        if($flag==1)
        {
          header("location:admin.php");
        }
        else if($flag==0)
        {
          header("location:user.php");
        }
      }
      else {
        $error="Invalid Username or Password!!";
        #header("location:index.php");
      }
    }
    ?>
