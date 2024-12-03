<?php
include 'connector_db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_SESSION['user']['accinfo_id'];
    $reservation_date = mysqli_real_escape_string($conn, $_POST['date']);
    $reservation_time = mysqli_real_escape_string($conn, $_POST['time']);
    $purpose = mysqli_real_escape_string($conn, $_POST['purpose']);
    $lab = mysqli_real_escape_string($conn, $_POST['lab']); // Get the lab value

    $sql = "INSERT INTO reservations (student_id, date, time, purpose, lab, status) 
            VALUES ('$student_id', '$reservation_date', '$reservation_time', '$purpose', '$lab', 'pending')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Reservation submitted successfully and is awaiting admin approval.'); window.location.href='studash.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Fetch pending reservations for the logged-in student
$student_id = $_SESSION['user']['accinfo_id'];
$sql_pending = "SELECT date, time, purpose, lab FROM reservations WHERE student_id='$student_id' AND status='pending'";
$result_pending = mysqli_query($conn, $sql_pending);

// Fetch approved reservations for the logged-in student
$sql_approved = "SELECT date, time, purpose, lab FROM reservations WHERE student_id='$student_id' AND status='approved'";
$result_approved = mysqli_query($conn, $sql_approved);

$sql_disapproved = "SELECT date, time, purpose, lab FROM reservations WHERE student_id='$student_id' AND status='disapproved'";
$result_disapproved = mysqli_query($conn, $sql_disapproved);

// Check if the queries were successful
if (!$result_pending) {
    die("Error fetching pending reservations: " . mysqli_error($conn));
}

if (!$result_approved) {
    die("Error fetching approved reservations: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Submission</title>
    <style>
        .form-container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
        }

        input[type="date"],
        input[type="time"],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ced4da;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
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
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Make Reservation</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div>
                <label for="date">Date:</label>
                <input type="date" id="date" name="date" required>
            </div>
            <div>
                <label for="time">Time:</label>
                <input type="time" id="time" name="time" required>
            </div>
            <div>
                <label for="purpose">Purpose:</label>
                <textarea id="purpose" name="purpose" rows="4" required></textarea>
            </div>
            <div>
                <label for="lab">Lab:</label>
                <select id="lab" name="lab" required>
                    <option value="">Select a lab</option>
                    <option value="Lab 526">Lab 526</option>
                    <option value="Lab 524">Lab 524</option>
                    <option value="Lab 528">Lab 528</option>
                    <option value="Lab 530">Lab 530</option>
                    <option value="Lab 542">Lab 542</option>
                </select>
            </div>
            <button type="submit" class="btn">Submit Reservation</button>
        </form>
    </div>

    <?php if (mysqli_num_rows($result_pending) > 0): ?>
        <div class="form-container">
            <h2>Pending Reservations</h2>
            <table>
                <tr>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Purpose</th>
                    <th>Lab</th>
                </tr>
                <?php while($row = mysqli_fetch_assoc($result_pending)): ?>
                    <tr>
                        <td><?php echo $row['date']; ?></td>
                        <td><?php echo $row['time']; ?></td>
                        <td><?php echo $row['purpose']; ?></td>
                        <td><?php echo $row['lab']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </table>
        </div>
    <?php else: ?>
        <div class="form-container">
            <h2>Pending Reservations</h2>
            <p style="text-align:center;">No pending reservations found.</p>
        </div>
    <?php endif; ?> 
    <?php if (mysqli_num_rows($result_approved) > 0): ?>
        <div class="form-container">
            <h2>Approved Reservations</h2>
            <table>
                <tr>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Purpose</th>
                    <th>Lab</th>
                </tr>
                <?php while($row = mysqli_fetch_assoc($result_approved)): ?>
                    <tr>
                        <td><?php echo $row['date']; ?></td>
                        <td><?php echo $row['time']; ?></td>
                        <td><?php echo $row['purpose']; ?></td>
                        <td><?php echo $row['lab']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </table>
        </div>
    <?php else: ?>
        <div class="form-container">
            <h2>Approved Reservations</h2>
            <p style="text-align:center;">No approved reservations found.</p>
        </div>
    <?php endif; ?>
    <?php if (mysqli_num_rows($result_disapproved) > 0): ?>
        <div class="form-container">
            <h2>Disapproved Reservations</h2>
            <table>
                <tr>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Purpose</th>
                    <th>Lab</th>
                </tr>
                <?php while($row = mysqli_fetch_assoc($result_disapproved)): ?>
                    <tr>
                        <td><?php echo $row['date']; ?></td>
                        <td><?php echo $row['time']; ?></td>
                        <td><?php echo $row['purpose']; ?></td>
                        <td><?php echo $row['lab']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </table>
        </div>
    <?php else: ?>
        <div class="form-container">
            <h2>Disapproved Reservations</h2>
            <p style="text-align:center;">No disapproved reservations found.</p>
        </div>
    <?php endif; ?>
</body>
</html>
