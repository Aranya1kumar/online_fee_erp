<?php session_start();?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel='stylesheet' media='screen' href='admin.css'>
    <title>Admin</title>
</head>
<body>
    <header class="header">
      <ul class="sidenav">
        <li><a href="add_student.php"style="height:44px;font-size:20px;"><u>Add Student</u></a></li>
        <li class="logout" ><a  href="admin.php?val='0'" style="height:44px;"><u>LOGOUT</u></a></li>
        <div class="ui-component">
        <div class="dropdown-container">
        <li><h1 style="font-family:'Playball', cursive; font-size: 4em; font-weight:70; text-align:center;">Admin</h1></li>
      </ul>
    </header>
    <div>  
      <form class="search-container" method="POST">
        <input type="text" name="search" id="search-bar" placeholder="Search student's by Name"><br><br><br><br>
      </form>
    </div>
<div>    
<table class="redTable">
  <thead>
    <tr>
      <th>Student ID</th>
      <th>Student Name</th>
      <th>Fathers Name</th>
      <th>DOB</th>
      <th>Address</th>
      <th>Course</th>
      <th>Fee</th>
      <th>Fee Status</th>
      <th>Edit</th>
    </tr>
  </thead>
  <tbody>
    <?php
    include("connect.php");
      if(isset($_POST['search'])){
        $namesearch = $_POST['search'];
        $sqli = "SELECT * FROM add_student WHERE std_name LIKE '%".$namesearch."%' ORDER BY std_name";
        $valu=mysqli_query($connect,$sqli);
        $results = $connect->query($sqli);
        while($data = mysqli_fetch_array($results)){
          echo "
            <tr>
              <td>{$data['std_id']}</td>
              <td>{$data['std_name']}</td>
              <td>{$data['father_name']}</td>
              <td>{$data['dob']}</td>
              <td>{$data['address']}</td>
              <td>{$data['course']}</td>
              <td>{$data['fee']}</td>
              <td>{$data['fee_status']}</td>
            </tr>
          ";
        }
        }else{
        $sql="SELECT * FROM add_student";
        $value=mysqli_query($connect,$sql);
        $result = $connect->query($sql);
	      while($row= $result->fetch_assoc()){
        echo"<tr>
        <td>{$row['std_id']}</td>
        <td>{$row['std_name']}</td>
        <td>{$row['father_name']}</td>
        <td>{$row['dob']}</td>
        <td>{$row['address']}</td>
        <td>{$row['course']}</td>
        <td>{$row['fee']}</td>
        <td>{$row['fee_status']}</td>
        <td>
        <button style='background-color:#8DB7FF;'><a href='add_student.php?id=".$row['std_id']."'>Update</a></button><br><br>
        <button style='background-color:#8DB7FF;' ><a href='admin.php?id=".$row['std_id']."'>Delete</a></button></td>
        </tr>";
        }
      }
    ?>
  </tbody>
</table>
</div> 
<?php
if(isset($_GET['id'])){
  $idd=($_GET['id']);
  $qur="DELETE FROM add_student WHERE std_id='$idd'";
  $val=mysqli_query($connect,$qur);
  if($qur){
    $msg="DELETED";
    $emsg="NOT DELETED";
    echo "<script type='text/javascript'>alert('$msg');</script>";
    header("refresh:0,admin.php");
  }	
}
?>
<?php
  if(isset($_GET['val'])){
    unset($_SESSION['xyx']);
   }
   
   if(!isset($_SESSION['xyx'])){
    header("location:main_page.php");
  }
   
 ?> 

</body>
</html>