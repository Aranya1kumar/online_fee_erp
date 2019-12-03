<!DOCTYPE html>
<?php session_start();?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <title>Student</title>
</head>
<style>
    body {
    margin: 0;
    color: #f5f5f5;
    background:  rgba(69, 168, 175, 0.9);
    font: 600 16px/18px 'Open Sans', sans-serif;
    background-image: url("image/background_2.jpg");
    background-repeat: no-repeat;
    background-position: right top;
    background-attachment: fixed;
    background-size: 1380px 670px;
  }
  header {
      overflow: hidden;
      position:relative;
      width: 100%;
  
  }
  ul.sidenav {
    list-style-type: none;
    margin: 0;
    padding: 0;
    width: 100%;
    position: relative;
    height: auto;
    overflow: auto;
  }
  .logout{
    float: right;
    font-size:20px;
  }
  ul.sidenav li a {
    display: block;
    text-decoration: none;
    float: left;
    padding: 30px;
    color: white;
  }
  
  ul.sidenav li a:hover {
    color: #000;
    opacity:0.5;
  }

  table.redTable {
    border: 2px solid #111F54;
    background-color: #547FD0;
    width: 70%;
    text-align: center;
    border-collapse: collapse;
    margin-left:15%;
    margin-right:15%;
  }
  table.redTable td, table.redTable th {
    border: 1px solid #000000;
    padding: 8px 8px;
  }
  table.redTable tbody td {
    font-size: 13px;
  }
  table.redTable tr:nth-child(even) {
    background: #8DB7FF;
  }
  table.redTable thead, .header {
    background: #1091E2;
    background: -webkit-linear-gradient(top, #4cace9 0%, #289ce5 66%, #1091E2 100%);
  }
  table.redTable thead th {
    font-size: 19px;
    font-weight: bold;
    color: #111F54;
    text-align: center;
  }
  
  @media screen and (max-width: 500px) {
    ul.sidenav li a {
      text-align: center;
      float: none;
    }
  }
</style>
<body>
  <header class="header">
    <ul class="sidenav">
      <li class="logout" ><a  href="main_page.php"><u>LOGOUT</u></a></li>
      <li><h1 style="font-family:'Playball', cursive; font-size: 4em; font-weight:70; text-align:center; ">Student</h1></li>
    </ul>
  </header><br><br><br><br>
  <table class="redTable">
  <?php
    include("connect.php");
    $row="";
    $row = $_SESSION['data'];
  echo "<thead>
    <tr>
      <th>student Name</th>
      <td>{$row['std_name']}</td>
    </tr>
    <tr>
      <th>Fathers Name</th>
      <td>{$row['father_name']}</td>
    </tr>
    <tr>
      <th>DOB</th>
      <td>{$row['dob']}</td>
    </tr>
    <tr>
      <th>Address</th>
      <td>{$row['address']}</td>
    </tr>
    <tr>
      <th>Course</th>
      <td>{$row['course']}</td>
    </tr>
    <tr>
      <th>Fee</th>
      <td>{$row['fee']}</td>
    </tr>
    <tr>
      <th>Fee Status</th>
      <td>{$row['fee_status']}</td>
    </tr>
  </thread>";
    ?>
  </table>
  <?php session_destroy();?>
  
  <?php
  if(!isset($_SESSION['data'])){
    header("location:main_page.php");
  }
  ?>

</body>
</html>