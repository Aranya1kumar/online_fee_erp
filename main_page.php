<!DOCTYPE html>
<?php session_start();?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel='stylesheet' media='screen' href='main_page.css'>
    <script src='main_page.js'></script>
    <title>ERP</title>
</head>
<style>
  body {
  margin: 0;
  color: #f5f5f5;
  background:  rgba(69, 168, 175, 0.9);
  font: 600 16px/18px 'Open Sans', sans-serif;
  background-image: url("image/background.jpg");
  background-repeat: no-repeat;
  background-position: right top;
  background-attachment: fixed;
  background-size: 1380px 670px;
}
</style>
<?php
        include("connect.php");
        $passerr="";
        if(isset($_GET["login"])){
          $valid=0;
          if(empty($_GET["admin_name"])){
            $valid=1;
          }
          if(empty($_GET["pas"])){
            $valid=1;
        }
        if(!$valid){
          $an=$_GET["admin_name"];
          $ps=$_GET["pas"];
          $qu="SELECT * FROM admin_login WHERE admin_id='$an' and pass='$ps'";
          $val=mysqli_query($connect,$qu);
          if (mysqli_num_rows($val) >0){
              $_SESSION['xyx']=$val;
            header("location:admin.php");
          }else{
            $passerr="insert valid password";
          }
        }
      }

      if(isset($_GET["stdlog"])){
        $valid=0;
        if(empty($_GET["std_name"])){
          $valid=1;
        }
        if(empty($_GET["pass"])){
          $valid=1;
      }
      if(!$valid){
        $an=$_GET["std_name"];
        $ps=$_GET["pass"];
        $qu="SELECT * FROM add_student WHERE std_name='$an' and password='$ps'";
        $val=mysqli_query($connect,$qu);
        if (mysqli_num_rows($val) >0){
          $row=mysqli_fetch_array($val);
         $_SESSION['data']=$row;
          header("location:student.php");
        }else{
          $passerr="insert valid password";
        }
      }
    }
        ?>
<body>
  <div class="login-wrap">
    <div class="login-html">
      <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Admin Login</label>
      <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Student Login</label>
      <div class="login-form">
        <form method="GET" action="">
          <div class="sign-in-htm">
            <div class="group">
              <label for="user" class="label">Admin Name</label>
              <input id="user" name="admin_name" type="text" class="input" pattern="[a-zA-Z0-9\s]+" required title="only character & whitespace">
            </div>
            <div class="group">
              <label for="pass" class="label">Password</label>
              <input id="pass" name="pas" type="password" class="input" data-type="password" pattern="(?=.*\d)(?=.*[0-9]).{8,16}" required title="min-8 & max-16 char. & 1 number required">
              <br><span class="error"><?php echo "$passerr"; ?></span>
            </div>
            <div class="group">
              <input id="check" type="checkbox" class="check" checked>
              <label for="check"><span class="icon"></span> Keep me Signed in</label>
            </div>
            <div class="group">
              <input type="submit" name="login" class="button" value="Sign In">
            </div>
            <div class="hr"> </div>
            <div class="foot-lnk">
              <a href="#forgot">Forgot Password?</a>
            </div>  
          </div>
        </form>
        
        <form method="GET">
          <div class="sign-up-htm">
            <div class="group">
              <label for="user" class="label">Student Name</label>
              <input id="user" name="std_name" type="text" class="input" pattern="[a-zA-Z0-9\s]+" required title="only character & whitespace">
            </div>
            <div class="group">
              <label for="pass" class="label">Password</label>
              <input id="pass" name="pass" type="password" class="input" data-type="password" pattern="(?=.*\d)(?=.*[0-9]).{8,16}" required title="min-8 & max-16 char. & 1 number required">
              <br><span class="error"><?php echo "$passerr"; ?></span>
            </div>
            <div class="group">
              <input type="submit" name="stdlog" class="button" value="Sign Up">
            </div>
            <div class="hr"></div>
            <div class="foot-lnk">
              <label for="tab-1">Forgot Password?</a>
            </div>
          </div>
        </form>
      </div>
    </div>
	</div>
</body>
</html>