<?php
include 'connector_db.php';

if(isset($_POST['start_date'])) {
    $startDate = $_POST['start_date'];

    // SQL query to filter records based on the selected date
    $sql = "SELECT accinfo_idno, accinfo_firstname, accinfo_lastname, student_id , purpose, lab , login_time , logout_time , remain_ss FROM sitin INNER JOIN accountinfo ON accountinfo.accinfo_id = sitin.student_id WHERE DATE(login_time) = '$startDate'";
    $result = $conn->query($sql);
    

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
                echo "<button type='submit' class='btn btn-danger' name='end_session'>End Session</button>";
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
}

$conn->close();
?>
