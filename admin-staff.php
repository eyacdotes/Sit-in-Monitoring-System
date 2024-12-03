<!DOCTYPE html>
<html>
<head>
  <title>Admin/Staff Module</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-image: linear-gradient(to right top, #d7e1f0, #d4eaf3, #d8f3f1, #e4f9ed, #f7fdea);
      margin-top: 60px; 
    }
    .navbar {
      position: fixed;
      background-color: #d1d7af;
      top: 52%;
      left: 1%;
      right: 5%;
      border-radius: 10px;
      transform: translateY(-50%);
      overflow: hidden;
      width: 230px;
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
    .icon{
      position: relative;
      display: block;
      height: 20px;
      line-height: 50px;
      text-align: start;
    }
    .icon ion-icon{
      font-size: 20px;
    }
    .title{
      position: relative;
        display: block;
        padding: 0 30px;
        height: 20px;
        line-height: 5px;
        text-align: start;
        white-space: nowrap;
    }
    .container {
      margin-left: 100px;
      padding: 10%;
      text-align: center;
      margin: 100px 350px;
      border-radius: 30px;
      background-color: azure;
      width: 40%;
      box-shadow: 5px 10px 18px #888888;
    }
    .welcome {
      background-color: #d1d7af;
      overflow: hidden;
      text-align: center;
      position: fixed;
      width: 100%;
      top: 0;
      z-index: 1000; 
    }
    .logout {
      position: fixed;
      bottom: 0;
      left: 0;
      padding: 10px 20px;
    }
    h3 {
      color: black;
    }
    img.staff-photo {
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

  <div class="navbar">
    <a href="admin-staff.php">
      <span class="icon">
          <ion-icon name="home-outline"></ion-icon>
      </span>
      <span class="title">Dashboard</span>
    </a>
    <a href="search.php">
      <span class="icon">
          <ion-icon name="search-outline"></ion-icon>
      </span>
      <span class="title">Search</span>
    </a>
    <a href="admin-reserve.php">
      <span class="icon">
          <ion-icon name="trash-outline"></ion-icon>
      </span>
      <span class="title">View Reservations</span>
    </a>
    <a href="resetsession.php">
      <span class="icon">
          <ion-icon name="calendar-outline"></ion-icon>
      </span>
      <span class="title">Reset Session</span>
    </a>
    <a href="resetpass.php">
      <span class="icon">
          <ion-icon name="clipboard-outline"></ion-icon>
      </span>
      <span class="title">Reset Password</span>
    </a>
    <a href="admin-post.php">
      <span class="icon">
          <ion-icon name="clipboard-outline"></ion-icon>
      </span>
      <span class="title">Post Announcement</span>
    </a>
    <a href="vsir.php">
      <span class="icon">
          <ion-icon name="clipboard-outline"></ion-icon>
      </span>
      <span class="title">View Sitin Records</span>
    </a>
    <a href="gr.php">
      <span class="icon">
          <ion-icon name="document-outline"></ion-icon>
      </span>
      <span class="title">Generate Report</span>
    </a>
    <a href="admin-feedback.php">
      <span class="icon">
          <ion-icon name="document-outline"></ion-icon>
      </span>
      <span class="title">View Feedback</span>
    </a>
    <a href="analytic.php">
      <span class="icon">
          <ion-icon name="document-outline"></ion-icon>
      </span>
      <span class="title">Daily Analytics/Report</span>
    </a>
    <a href="index.php">
      <span class="icon">
          <ion-icon name="log-out-outline"></ion-icon>
      </span>
      <span class="title">Log Out</span>
    </a>
  </div>
<?php
include "connector_db.php";
if (isset($_SESSION['admin'])) {
  $user = $_SESSION['admin']; 

  $staff_name = $user['admin_name'];
  $staff_id = $user['admin_id']; // Access user ID

  echo '<div class="welcome">
          <h3>Welcome Admin, '. $staff_name .' </h3>
          <img class="staff-photo" src="Images/staff.jpg" alt="Staff Photo">
        </div>';

  // You can use $staff_id to retrieve further data from other tables

  
  echo '<div class="container">
    <h3>Welcome to Admin/Staff Module</h3>
    <p>This module provides administrative and staff functionalities to manage the Student Sit-In System.</p>
    <p>Use the navigation bar above to perform various tasks such as searching, deleting, managing sit-in records, generating reports, and more.</p>
  </div>';
} else {
  header("Location: index.php?error=Please login as admin/staff");
  exit();
}

// Close database connection
$conn->close();
?>


<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
