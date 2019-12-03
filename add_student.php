<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel='stylesheet' type='text/css' media='screen' href='add_student.css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <title>Add Student</title>
</head>
<?php
include("connect.php");
$sname= $fname= $dob= $address= $course= $fstatus =$fee=" ";
$snm= $cr = $fnm="";
if(isset($_POST['insert'])){
	$validate=0;
	if(empty($_POST["student"])){
		$validate=1;
	  }else{
		$snm="";
	  }
	if(empty($_POST["fname"])){
		$validate=1;
	  }else{
		$fnm="";
	  }
	if(empty($_POST["dob"])){
		$validate=1;
	  }
	if(empty($_POST["address"])){
		$validate=1;
	  }
	if(empty($_POST["course"])){
		$validate=1;
	  }else{
		$cr="";
	  }
	if(empty($_POST["fee"])){
		$validate=1;
	  }
	if(empty($_POST["fee_status"])){
		$validate=1;
	  }
	if(!$validate){
		$sn=$_POST["student"];
		$fn=$_POST["fname"];
		$do=$_POST["dob"];
		$add=$_POST["address"];
		$cours=$_POST["course"];
		$f=$_POST["fee"];
		$fstat=$_POST["fee_status"];

		$query= "INSERT INTO add_student(std_name, father_name, dob, address, course, fee, fee_status) VALUES ('$sn','$fn','$do','$add','$cours','$f','$fstat')";
		$value= mysqli_query($connect,$query);
		echo"<script>
		  		alert('INSERTED SUCESSFULLY!');
			</script>";
			header("refresh:0;admin.php");
	}
	function tests_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data; 
	  }
}	    
if(isset($_GET['id'])){
	$idd=($_GET['id']);
	$qur="SELECT * FROM add_student WHERE std_id='$idd'";
	$val=mysqli_query($connect,$qur);
	
	while($row=mysqli_fetch_array($val)){
	$snm = $row['std_name'];
	$fnm = $row['father_name'];
	$db = $row['dob'];
	$ad = $row['address'];
	$cr = $row['course'];
	$fe = $row['fee'];
	$fs = $row['fee_status'];
	}
}
?>
	<body>
    	<header class="head">
		<h1  class="line">Add Student <a href="admin.php"><img class="home" src="image/home2.png" alt="Home"></a> </h1>
		</header>
    	<div class="login-wrap">
    		<div class="login-form">
				<div class="sign-up-htm">
					<form method="POST" action="">
						<div class="group">
							<label for="student" class="label">Student Name</label>
							<input name="student" value="<?=$snm?>" type="text" class="input"  pattern="[a-zA-Z0-9\s]+" required title="only character & whitespace">
						</div>
						<div class="group">
							<label for="fname" class="label">Fathers Name</label>
							<input name="fname" value="<?=$fnm?>" type="text" class="input" pattern="[a-zA-Z0-9\s]+" required title="only character & whitespace" >
						</div>
						<div class="group">
							<label for="dob" class="label">Date of Birth</label>
							<input name="dob" value="<?=$db?>" type="date" class="input" required>
						</div>
                		<div class="group">
							<label for="address" class="label">Address</label>
							<textarea name="address"  value="<?=$ad?>" class="input" palceholder="insert address" style=""></textarea>
                		</div>
                		<div class="group">
							<label for="course" class="label">Course</label>
                    		<input list="course" value="<?=$cr?>" name="course" class="input" required>
                			<datalist id="course">
	                    		<option value="JAVA">
                    			<option value="PHP">
                    			<option value="PYTHON">
                    			<option value="DOT NET">
                 				<option value="C">
                    			<option value="C++">
                			</datalist>    
                		</div>
                		<div class="group">
							<label for="fee" class="label">Fee</label>
							<input name="fee" type="number" value="<?=$fe?>" class="input"pattern="[0-9]+" required title="only numerical value">
                		</div>

                		<div class="group">
                			<label for="course" class="label">Fee Status</label><br>
                			<input name="fee_status" type="radio" class="check" <?php if (isset($fee_status) && $fee_status=="paid") ;?> value="Paid">
                			<label for="fee_status" style="color: #254988;font-size:15px;">Paid</label><br>
                			<input name="fee_status" type="radio" class="check"<?php if (isset($fee_status) && $fee_status=="due") echo "checked";?>value="Due">
                			<label for="fee_status" style="color: #254988;font-size:15px;">Due</label>
                		</div>
						<div class="group">
							<?php
							 if (isset($_GET['id'])){
								 echo"<input type='submit' name='update' class='button' value='UPDATE' >";
								 }else{
									echo"<input type='submit' name='insert' class='button' value='ADD'>";
								 }
							?>
							</div>
			  		</form>
					  <?php
					  if(isset($_POST['update'])){
						$ss=$_POST["student"];
						$ff=$_POST["fname"];
						$dd=$_POST["dob"];
						$aa=$_POST["address"];
						$cs=$_POST["course"];
						$fe=$_POST["fee"];
						$fss=$_POST["fee_status"];

						$sqli="UPDATE add_student SET std_name = '$ss', father_name = '$ff', dob = '$dd', address = '$aa', course='$cs', fee='$fe', fee_status='$fss' WHERE std_id='$idd'";
						$vals=mysqli_query($connect,$sqli);
						if($vals){
							echo"<script>
		  							alert('UPDATED SUCESSFULLY!');
								</script>";
								header("refresh:0;admin.php");
						}else{
							echo "<script>
							  alert('NOT UPDATED!');
							</script>";
						}
					} 
					  ?>	 
				</div>
			</div>            
		</div>        
	</body>
</html>