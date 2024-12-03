<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eyacdb";


if (!isset($_SESSION['user'])) {
  header("Location: index.php?error=Please login first");
  exit();
}

$user = $_SESSION['user'];

$student_name = $user['accinfo_firstname'] . ' ' . $user['accinfo_middlename'] . ' ' . $user['accinfo_lastname'];
$student_id = $user['accinfo_idno']; 

?>


<!DOCTYPE html>
<html>
<head>
  <title>Edit Student Record</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-image: linear-gradient(to right top, #d7e1f0, #d4eaf3, #d8f3f1, #e4f9ed, #f7fdea);
    }
    .navbar {
      background-color: #d1d7af;
      overflow: hidden;
    }
    .navbar a {
      float: left;
      display: block;
      color: black;
      text-align: center;
      padding: 14px 20px;
      text-decoration: none;
    }
    .navbar a:hover {
      background-color:  #2d83e3;
    }
    .container {
      width: 20%;
      padding: 20px;
    }
    h2 {
      color: ;
    }
    .profile {
      border: 2px solid #ccc;
      border-radius: 5px;
      padding: 10px; 
      margin-bottom: 10px;
      background-color: white;
      width: 80%; 
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: center;
    }

    .profile img {
      border-radius: 50%; 
      margin-bottom: 10px;
      width: 100px; 
      height: 100px; 
    }

    .profile h3 {
      margin-top: 0;
      font-size: 18px;
    }

    .profile p {
      margin-bottom: 3px; 
      font-size: 14px; 
    }
    .containerb {
      width: 70%;
      float: right;
      position: absolute;
      top: 22%;
      left: 30%;
    }
    .info {
    border: 2px solid #ccc;
    border-radius: 5px;
    padding: 10px;
    margin: 0 auto; 
    margin-top: 10%; 
    background-color: white;
    width: 30%;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    }
    .info h3 {
      margin-top: 0;
      font-size: 18px;
      width: 100%;
      height: 100%;
    }
    .info-row {
    display: flex;
    justify-content: center;
    margin-bottom: 10px;
  }

  .info-row p {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 10px;
    margin-top: 20%;
    width: 50px;
    display: flex;
    align-items: center; 
    justify-content: center; 
    text-align: center;
    background-color: #f9f9f9;
    }
  .button {
    background-color: #04AA6D;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 5px;
  }
  .button-sub{  
      background-color:#04AA6D;
    }
  .dp {
    background-image: url('..Images/sitin.jpg');
  }
  .logout {
    position: fixed;
    bottom: 20px; 
    right: 20px; 
    padding: 10px 20px;
    }
  </style>
</head>
<body>
    <div class="info">
        <div class="info-row">
            <h3>Your Remaining Session</h3>
            <p><?php echo $user['remain_ss']; ?></p>
        </div>  
    </div>
    <div class="logout">
    <a href="studash.php">Back</a>
    </div>
</body>
</html>