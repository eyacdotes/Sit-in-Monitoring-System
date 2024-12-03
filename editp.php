<?php
include "connector_db.php";

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
      background-color: #2d83e3;
    }
    .container {
      width: 20%;
      padding: 20px;
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
      margin-bottom: 10px;
      background-color: white;
      width: 80%; 
      display: table;
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
      justify-content: space-between;
      margin-bottom: 10px;
    }

    .info-row p {
      flex-basis: 30%; 
      padding: 5px;
      border: 1px solid #ccc;
      border-radius: 5px;
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
    .button-sub {
      background-color: #04AA6D;
    }
    .dp {
      background-image: url('Images/sitin.jpg');
    }
    .modal {
      display: none;
      position: fixed;
      z-index: 1;
      padding-top: 100px;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgb(0,0,0);
      background-color: rgba(0,0,0,0.4);
    }
    .modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    border-radius: 5px;
  }

  .close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
  }

  .close:hover,
  .close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
  }

  .form-group {
    margin-bottom: 15px;
  }

  .form-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
  }

  .form-group input[type="text"],
  .form-group input[type="password"] {
    width: calc(100% - 20px);
    padding: 10px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f9f9f9;
  }

  .form-group button {
    background-color: #04AA6D;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }

  .form-group button:hover {
    background-color: #03a460;
  }
  </style>
</head>
<body>
<div class="navbar">
  <a href="studash.php">Dashboard</a>
  <a href="editp.php">View Record</a>
  <a href="#sit-in">Sit In</a>
  <a href="#view">View Remaining Sessions</a>
  <a href="#reservation">Make Reservation</a>
  <a href="stud-history.php">Sit-in History</a>
  <a style="float:right" href="index.php">Log Out</a>
</div>

<div class="container">
  <h2>Edit Student Record</h2>
  <div class="profile">
    <h3>Profile Picture</h3>
    <img src="Images/sitin.jpg">
    <h3><?php echo $student_name; ?></h3>
    <p>Student ID: <?php echo $student_id; ?></p>
    <p>Email: <?php echo $user['accinfo_email']; ?></p>
    <p>Phone: <?php echo $user['accinfo_contact']; ?></p>
  </div> 
</div>
<div class="containerb">
  <div class="info">
    <h3>Student Information</h3>
    <div class="info-row">
      <p>First Name: <?php echo $user['accinfo_firstname']; ?></p>
      <p>Middle Name: <?php echo $user['accinfo_middlename']; ?></p>
      <p>Last Name: <?php echo $user['accinfo_lastname']; ?></p>
    </div>
    <div class="info-row">
      <p>ID Number: <?php echo $user['accinfo_idno']; ?></p>
      <p>Year: <?php echo $user['accinfo_year']; ?></p>
      <p>Age: <?php echo $user['accinfo_age']; ?></p>
    </div>
    <div class="info-row">
      <p>Gender: <?php echo $user['accinfo_gender']; ?></p>
      <p>Contact Number: <?php echo $user['accinfo_contact']; ?></p>
      <p>Address: <?php echo $user['accinfo_address']; ?></p>
    </div>
    <div class="info-row">
      <p>Email: <?php echo $user['accinfo_email']; ?></p>
    </div>
    <button id="editBtn" class="button button-sub">Edit Profile</button>
  </div>  
</div>

<!-- This is the Moledal  -->
<div id="editModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <form method="post" action="editpp.php">
      <h2>Edit Profile</h2>
      <label for="firstname">First Name:</label>
      <input type="text" id="firstname" name="firstname" value="<?php echo $user['accinfo_firstname']; ?>" required><br>
      <label for="middlename">Middle Name:</label>
      <input type="text" id="middlename" name="middlename" value="<?php echo $user['accinfo_middlename']; ?>" required><br>
      <label for="lastname">Last Name:</label>
      <input type="text" id="lastname" name="lastname" value="<?php echo $user['accinfo_lastname']; ?>" required><br>
      <label for="email">ID Number:</label>
      <input type="text" id="idno" name="idno" value="<?php echo $user['accinfo_idno']; ?>" required><br>
      <label for="contact">Contact Number:</label>
      <input type="text" id="contact" name="contact" value="<?php echo $user['accinfo_contact']; ?>" required><br>
      <label for="address">Address:</label>
      <input type="text" id="address" name="address" value="<?php echo $user['accinfo_address']; ?>" required><br>
      <button type="submit" class="button button-sub">Save Changes</button>
    </form>
  </div>
</div>

<script>
document.getElementById('editBtn').onclick = function() {
  document.getElementById('editModal').style.display = "block";
}

document.getElementsByClassName('close')[0].onclick = function() {
  document.getElementById('editModal').style.display = "none";
}

window.onclick = function(event) {
  if (event.target == document.getElementById('editModal')) {
    document.getElementById('editModal').style.display = "none";
  }
}
</script>

</body>
</html>
