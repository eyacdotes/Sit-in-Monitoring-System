<!DOCTYPE html>
<html>
<head>
  <title>Search</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-image: linear-gradient(to right top, #d7e1f0, #d4eaf3, #d8f3f1, #e4f9ed, #f7fdea);
    }
    .button-sub{
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
    border-radius: 15px;
    }
    .button-back{
    background-color: red;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 15px;
    }
    .navbar {
      position: fixed;
      background-color: #d1d7af;
      top: 50%;
      left: 0;
      right: 5%;
      border-radius: 6px;
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
      border-bottom: solid;
      border-width: 3px;
    }
    .navbar a:hover {
      background-color: #2d83e3;
    }
    .container {
      margin: 0 auto; 
      padding: 20px;
      text-align: center;
      justify-content: center;
      width: 80%; 
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
    td, th {
      border: 1px solid black;
      font-weight: bold;
      font-family: serif;
      text-align: center;
    }

    td, th {
    border: 1px solid #ddd;
    padding: 8px;
    font-family: sans-serif;
    }

    tr:nth-child(even){background-color: #F5FFFA;}
    tr:nth-child(odd){background-color: #F5FFFA;}

    tr:hover {background-color: 	 #b3ecff;}
    
    th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: center;
    background-color: white;
    color: black;
    }
    table {
      justify-content: center;
      align-items: center;
    }
    .modal {
      display: none; 
      position: fixed; 
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%; 
      height: 100%; 
      overflow: auto; 
      background-color: rgb(0,0,0); 
      background-color: rgba(0,0,0,0.4); 
      padding-top: 60px;
    }
    .modal-content {
      background-color: #fefefe;
      margin: 5% auto; 
      padding: 20px;
      border: 1px solid #888;
      width: 50%; 
      border-radius: 5px;
    }
    strong {
      font-family: sans-serif;
      padding: 5px;
      line-height: 1.5;
    }
</style>
</head>
<body>
<div class="welcome">
    <h3>Welcome Admin/Staff </h3>
    <img class="staff-photo" src="Images/staff.jpg" alt="Staff Photo">
</div>
<?php
include "connector_db.php";

$query = "SELECT accinfo_idno , accinfo_firstname, accinfo_lastname, purpose, lab, login_time, logout_time , remain_ss FROM sitin INNER JOIN accountinfo ON accountinfo.accinfo_id = sitin.sitin_id WHERE remain_ss = '30'";

$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    echo "<div class='container'>"; 
    echo "<table border='1 '>
    <th>ID Number</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Purpose</th>
    <th>Lab</th>
    <th>Login Time</th>
    <th>Remaining Session</th>
    </tr>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr onclick='openModal(\"" . $row['accinfo_idno'] . "\" ,\"" . $row['accinfo_firstname'] . "\", \"" . $row['accinfo_lastname'] . "\", \"" . $row['purpose'] . "\", \"" . $row['lab'] . "\", \"" . $row['login_time'] . "\", \"" . $row['logout_time'] . "\", \"" . $row['remain_ss']. "\")'>";
        echo "<td>" . $row['accinfo_idno'] . "</td>";
        echo "<td>" . $row['accinfo_firstname'] . "</td>";
        echo "<td>" . $row['accinfo_lastname'] . "</td>";
        echo "<td>" . $row['purpose'] . "</td>";
        echo "<td>" . $row['lab'] . "</td>";
        echo "<td>" . $row['login_time'] . "</td>";
        echo "<td>" . $row['remain_ss'] . "</td>";
    }
    echo "</table>";
    echo "</div>"; 
} else {
    echo "No records found";
}

mysqli_close($conn);
?>
<form id="endSessionForm" action="end_session.php" method="POST">
  <div id="myModal" class="modal">
    <div class="modal-content">
      <span class="close" onclick="closeModal()">&times;</span>
      <p id="modal-content"></p>
      <input type="hidden" id="accinfo_id_hidden" value="accinfo_id" name="accinfo_id">
      <button type="button" class="button-back" id="endSessionBtn">End Session</button>
    </div>
  </div>
</form>

<script>
  var modal = document.getElementById("myModal");
  var span = document.getElementsByClassName("close")[0];

  function openModal(accinfo_idno , firstname, lastname, purpose, lab, login_time, logout_time, remain_ss) {
  var modalContent = document.getElementById("modal-content");
  modalContent.innerHTML = "<strong>ID Number:</strong> " + accinfo_idno + "<br>" +
                           "<strong>First Name:</strong> " + firstname + "<br>" +
                           "<strong>Last Name:</strong> " + lastname + "<br>" +
                           "<strong>Purpose:</strong> " + purpose + "<br>" +
                           "<strong>Lab:</strong> " + lab + "<br>" +
                           "<strong>Login Time:</strong> " + login_time + "<br>" +
                           "<strong>Remaining Session:</strong> " + remain_ss + "<br>";
  
  document.getElementById("accinfo_id_hidden").value = accinfo_idno; // BABALA CHANGE THIS INTO THE REAL ACCINFO_ID
  document.getElementById("endSessionBtn").addEventListener("click", function() {
    endSession();
  });

  modal.style.display = "block";
}

function endSession() {
  var accinfo_id = document.getElementById("accinfo_id_hidden").value;
  window.location.href = "end_session.php?accinfo_id=" + accinfo_id; // BABALA CHANGE THIS INTO THE REAL ACCINFO_ID
} 

    window.onclick = function(event) {
      if (event.target == modal) {
        closeModal();
      }
    }
    function closeModal() {
    modal.style.display = "none";
  }
</script>


</body>
</html>
