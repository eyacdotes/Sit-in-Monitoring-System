<?php
include 'connector_db.php';

function decrementRemSession($id) {
    include 'connector_db.php';
    $sql = "UPDATE accountinfo SET remain_ss = remain_ss - 1 WHERE accinfo_id = '$id'";
    $conn->query($sql);
    $conn->close();
}

if(isset($_POST['end_session'])) {
    if(isset($_POST['id'])) {
        $sitin_id = $_POST['id'];
        $logout_time = date('Y-m-d H:i:s'); 
        $sql_update = "UPDATE sitin SET logout_time = '$logout_time' WHERE student_id = $sitin_id";
        $conn->query($sql_update);
        decrementRemSession($sitin_id); 
        echo "<script>alert('Ended Successfully');</script>";
    } else {
        echo ""; 
    }
}

$sql = "SELECT accinfo_idno, accinfo_firstname, accinfo_lastname, student_id , purpose, lab , login_time , logout_time , remain_ss FROM sitin INNER JOIN accountinfo ON accountinfo.accinfo_id = sitin.student_id";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Sit-in Records</title>
</head>
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
    color: white;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 10px;
    padding: 10px 20px;
    background-color: #007bff;
    border-radius: 3px;
    margin-bottom: 10px;
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
    .calendar-filter {
    width: 20%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    border: 2px solid #ccc;
    padding: 20px;
    border-radius: 5px;
    background-color: #fff;
    margin: auto;
}

.calendar-filter label {
    margin-bottom: 10px;
}

.calendar-filter input[type="date"] {
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 3px;
    width: 150px;
    margin-bottom: 10px;
}

.calendar-filter button {
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    margin-bottom: 10px;
}

.calendar-filter button:hover {
    background-color: #0056b3;
}
.btn-primary, .btn-primary:hover {
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
        }
.btn {
            display: inline-block;
            font-weight: 400;
            color: #212529;
            text-align: center;
            vertical-align: middle;
            user-select: none;
            background-color: transparent;
            border: 1px solid transparent;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 0.25rem;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            cursor: pointer;
            text-decoration: none;
        }
        
        .btn-light {
            color: #343a40;
            background-color: white;
            border-color: black;
        }

</style>
<body>
<div class="container">
    <a class="btn btn-light" href="admin-staff.php">Back</a>
    <h2 class="text-center">Sit-in Records</h2>
    <form id="filter-form" method="post">
            <div class="calendar-filter">
                <label for="start-date">Calendar Date:</label>
                <input type="date" id="start-date" name="start_date">
                <button type="submit">Filter</button>
                <a class="button-back" href="vsir.php">Clear Filter</a>
            </div>
      </form>
    <br>
    <br>
    <div>
        <table>
            <thead>
                <tr>
                    <th>ID Number</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Purpose</th>
                    <th>Lab</th>
                    <th>Login Time</th>
                    <th>Logout Time</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["accinfo_idno"] . "</td>";
                        echo "<td>" . $row["accinfo_firstname"] . "</td>";
                        echo "<td>" . $row["accinfo_lastname"] . "</td>";
                        echo "<td>" . $row["purpose"] . "</td>";
                        echo "<td>" . $row["lab"] . "</td>";
                        echo "<td>" . $row["login_time"] . "</td>";
                        echo "<td>" . ($row["logout_time"] ? $row["logout_time"] : "Not ended") . "</td>";
                        echo "<td>";
                        if($row["logout_time"] == "0000-00-00 00:00:00") { 
                          echo "<form method='post'>";
                          echo "<input type='hidden' name='id' value='" . $row["student_id"] . "'>";
                          echo "<button type='submit' class='btn btn-danger button-sub' name='end_session'>End Session</button>";
                          echo "</form>";
                      } else {
                          echo "Session Ended";
                      }
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No records found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<script>
        document.getElementById('filter-form').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the form from submitting traditionally
            var formData = new FormData(this);

            // AJAX request to send selected date to server
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "filter_records.php", true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    document.querySelector('table').innerHTML = xhr.responseText;
                }
            };
            xhr.send(formData);
        });
    </script>
</body>
</html>
