<?php
include 'connector_db.php'; // Include your database connection

// Check if the form is submitted for approval/disapproval
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reservation_id = mysqli_real_escape_string($conn, $_POST['reservation_id']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);

    // Update the reservation status in the database
    $sql = "UPDATE reservations SET status='$status' WHERE id ='$reservation_id'";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Reservation status updated successfully.'); window.location.href='admin-reserve.php';</script>";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

// Fetch all reservations from the database
$sql = "SELECT r.id, r.date, r.time, r.purpose, r.status, r.lab,
               a.accinfo_firstname, a.accinfo_middlename, a.accinfo_lastname, a.accinfo_idno
        FROM reservations r
        JOIN accountinfo a ON r.student_id = a.accinfo_id";
$result = mysqli_query($conn, $sql);

// Check if the query was successful
if (!$result) {
    die("Error fetching reservations: " . mysqli_error($conn));
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - View Reservations</title>
    <style>
        /* Add your custom styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }
        
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #343a40;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .btn {
            padding: 10px 15px;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-approve {
            background-color: #28a745;
        }

        .btn-disapprove {
            background-color: #dc3545;
        }

        .back-button {
            background-color: #007bff;
            padding: 10px 15px;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            margin-bottom: 20px;
            margin-left: 95%;
        }
    </style>
</head>
<body>
    <h1>Student Reservations</h1>
    <a href="admin-staff.php" class="back-button">Back</a>
    <table>
        <tr>
            <th>Student Name</th>
            <th>ID Number</th>
            <th>Date</th>
            <th>Time</th>
            <th>Purpose</th>
            <th>Lab</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        <?php if (mysqli_num_rows($result) > 0): ?>
            <?php while($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $row['accinfo_firstname'] . ' ' . $row['accinfo_middlename'] . ' ' . $row['accinfo_lastname']; ?></td>
                    <td><?php echo $row['accinfo_idno']; ?></td>
                    <td><?php echo $row['date']; ?></td>
                    <td><?php echo $row['time']; ?></td>
                    <td><?php echo $row['purpose']; ?></td>
                    <td><?php echo $row['lab']; ?></td>
                    <td><?php echo ucfirst($row['status']); ?></td>
                    <td>
                        <?php if ($row['status'] == 'pending'): ?>
                            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" style="display:inline;">
                                <input type="hidden" name="reservation_id" value="<?php echo $row['id']; ?>">
                                <input type="hidden" name="status" value="approved">
                                <button type="submit" class="btn btn-approve">Approve</button>
                            </form>
                            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" style="display:inline;">
                                <input type="hidden" name="reservation_id" value="<?php echo $row['id']; ?>">
                                <input type="hidden" name="status" value="disapproved">
                                <button type="submit" class="btn btn-disapprove">Disapprove</button>
                            </form>
                        <?php else: ?>
                            <span><?php echo ucfirst($row['status']); ?></span>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="8" style="text-align:center;">No reservations found.</td>
            </tr>
        <?php endif; ?>
    </table>
</body>
</html>
