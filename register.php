<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/register_css.css">
<center>
<h1 style="font-family:goudy old style;font-size:300%;color:#ff4d4d;">Register</h1>
<body>
<?php
    $name=$name_err=$pswd=$pswd_err=$uname_msg=$uname_err=$str_link="";
    $flag=0;
    $conn=mysqli_connect("localhost","dachi","dachi");
    if(!$conn)
    {
      die("Could not connect: " . mysql_error());
    }
    #echo "connection established";
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
      $name=$_POST["uname"];
      $pswd=$_POST["pswd"];
      if(strlen($name)<6)
      {
        $name_err="Warning: Username must be atleast of 6 characters";
      }
      if(!preg_match("/^[a-zA-Z0-9_]*$/",$name))
      {
        $name_err="Warning: Only letters,numbers and underscore allowed  for username!!";
      }
      if(strlen($pswd)<6)
      {
        $pswd_err="Choose a strong password,atleast of 6 characters";
      }
      if($name=="admin")
      {
        $name_err="You Fucking idiotic shit! Fuck off ! you can't be admin";
      }
      $sql1="select username from rms.credential where username='$name';";
      $res=mysqli_query($conn,$sql1);
      #echo mysqli_num_rows($res);
      if(mysqli_num_rows($res)>0)
      {
        $uname_err="Warning:Username already exists.Try another username";
      }
      else
      {

        $sql2="insert into rms.credential(username,pass,flag)"." values('$name','$pswd',0);";
        $res1=mysqli_query($conn,$sql2);
        if($res1===TRUE){
        $uname_msg="Successfully registered!!";
        $str_link = '&lt;a href=&quot;login.php&quot;&gt;Login&lt;/a&gt;';
        $flag=1;}
        #echo html_entity_decode($str);

      }

    }
?>
<div class="container">
  <form name="regform" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>
    </br>
    <span class="err"><?php echo $name_err;?></span>

  </br>
    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="pswd" required></br>
    <span class="err"><?php echo $pswd_err;?></span></br>
    <span class="err"><?php echo $uname_err;?></span></br>
    <button type="submit">Register</button></br>
</form>
</div>
<span class="msg"><?php echo $uname_msg; ?></span></br>
<?php if($flag==1){echo html_entity_decode($str_link);}?>
</body>
</center>
</html>
