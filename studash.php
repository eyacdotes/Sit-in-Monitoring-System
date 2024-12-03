<!DOCTYPE html>
<html>
<head>
  <title>Student Sit-In System</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-image: linear-gradient(to right top, #d7e1f0, #d4eaf3, #d8f3f1, #e4f9ed, #f7fdea);
    }
    .navbar {
      position: fixed;
      background-color: #d1d7af;
      top: 55%;
      left: 0;
      right: 5%;
      border-radius: 10px;
      transform: translateY(-50%);
      overflow: hidden;
      width: 150px;
    }
    .navbar a {
      display: block;
      color: black;
      text-align: center;
      padding: 14px 20px;
      text-decoration: none;
      border-bottom: groove;
      border-width: 3px;
    }
    .navbar a:hover {
      background-color: #2d83e3;
    }
    .container {
      margin-left: 100px;
      padding: 20px;
      text-align: center;
      justify-content: center;
    }
    .welcome {
      background-color: #d1d7af;
      overflow: hidden;
      text-align: center;
    }
    .logout {
      position: fixed;
      bottom: 0;
      left: 0;
      padding: 10px 20px;
    }
    h3 {
      color: ;
    }
    img.student-photo {
      position: fixed;
      top: 4px;
      right: 10px;
      border-radius: 50%;
      width: 50px; 
      height: 50px;
    }
  </style>
</head>
<body>
<?php
include "connector_db.php";
if (isset($_SESSION['user'])) {
  $user = $_SESSION['user']; 

  $student_name = $user['accinfo_firstname'];
  $student_id = $user['accinfo_id']; // Access user ID

  echo '<div class="welcome">
          <h3 style="color: black;">Welcome Student, ' . $student_name . '</h3>
          <img class="student-photo" src="Images/staff.jpg" alt="Student Photo">
        </div>';

  echo '<div class="navbar">
    <a href="studash.php">Dashboard</a>
    <a href="editp.php">Edit Profile</a>
    <a href="remainss.php">View Remaining Sessions</a>
    <a href="stud-history.php">Sit-in History</a>
    <a href="stud-feedback.php">Feedback and Reporting</a>
    <a href="stud-view-post.php">View Announcement</a>
    <a href="reserve.php">Make Reservation</a>
    <a href="labrules.html">Lab Sit-in Rules</a>
    <a href="index.php">Logout</a>
  </div>';
  echo '<div class="container">
    <h3>Welcome to Student Sit-In System</h3>
    <p>The Sit-In System represents a pioneering initiative in enhancing collaborative learning environments within higher education institutions.</p>
    <p>Tailored specifically for college students, this innovative system prioritizes inclusivity, flexibility, and active engagement in the educational process.</p>
  </div>';
} else {
  header("Location: index.php?error=Please login first");
  exit();
}

$conn->close();
?>
