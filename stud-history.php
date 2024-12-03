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

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$user = $_SESSION['user'];
$student_id = $user['accinfo_id'];

$sql = "SELECT * FROM sitin WHERE student_id = $student_id";
$result = mysqli_query($conn, $sql);

$sitin_records = array();
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $sitin_records[] = $row;
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Sitin History</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
    }
    .container {
      width: 80%;
      margin: auto;
      padding: 20px;
    }
    h2 {
      color: #333;
    }
    table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 1rem;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #dee2e6;
        }
        
        th {
            background-color: #007bff;
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
        }
        
        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
  </style>
</head>
<body>
<div class="container">
  <h2>Sitin History</h2>
  <?php if (!empty($sitin_records)): ?>
  <table>
    <thead>
      <tr>
        <th>Date</th>
        <th>Purpose</th>
        <th>Lab</th>
        <th>Login Time</th>
        <th>Logout Time</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($sitin_records as $record): ?>
      <tr>
        <td><?php echo $record['login_time']; ?></td>
        <td><?php echo $record['purpose']; ?></td>
        <td><?php echo $record['lab']; ?></td>
        <td><?php echo $record['login_time']; ?></td>
        <td><?php echo $record['logout_time']; ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <?php else: ?>
  <p>No sitin records found.</p>
  <?php endif; ?>
</div>
</body>
</html>
