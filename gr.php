<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Report</title>
    <style>
        /* Reset CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #343a40;
            margin: 0;
            padding: 0;
        }
        
        .navbar {
            background-color: #343a40;
            color: #fff;
            padding: 10px;
            display: flex;
            justify-content: space-between;
        }
        
        .navbar .navbar-brand {
            font-size: 1.5rem;
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
            background-color: #f8f9fa;
            border-color: #f8f9fa;
        }
        
        .container {
            max-width: 90%;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
        
        .report-container {
            margin-bottom: 20px;
        }
        
        h1 {
            font-size: 2rem;
            margin-bottom: 20px;
        }
        
        .row {
            margin-bottom: 1rem;
        }
        
        .col-md-2, .col-md-6 {
            flex-basis: 0;
            flex-grow: 1;
            max-width: 100%;
        }
        
        input[type="date"], select {
            width: 100%;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }
        
        .btn-primary, .btn-primary:hover {
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
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
        
        #printDate {
            margin-bottom: 20px;
        }
        
        @media print {
            body * {
                visibility: hidden;
            }
            
            .print-container, .print-container * {
                visibility: visible;
            }
            
            .print-container {
                position: absolute;
                left: 0;
                top: 0;
            }
        }
    </style>
</head>
<body>
<nav class="navbar">
    <span class="navbar-brand">Generate Report</span>
    <a class="btn btn-light" href="admin-staff.php">Back</a>
</nav>
<div class="container">
    <div class="report-container">
        <h1>Generate Report</h1>
        <div class="row">
            <div class="col-md-2">
                <input type="date" id="filterDate">
            </div>
            <div class="col-md-2">
                <select id="filterLab">
                <option value="">Select Lab..</option>
                <option value="524">524</option>
                <option value="526">526</option>
                <option value="528">528</option>
                <option value="530">530</option>
                <option value="542">542</option>
                </select>
            </div>
            <div class="col-md-2">
                <select id="filterPurpose">
                <option value="">Select Purpose..</option>
                <option value="cprog">C Programming</option>
                <option value="javaprog">Java Programming</option>
                <option value="csharpprog">C# Programming</option>
                <option value="pythonprog">Python Programming</option>
                </select>
            </div>
            <br>
            <div class="col-md-6">
                <button class="btn btn-primary" onclick="filterRecords()">Filter</button>
                <a class="btn btn-primary"  href="gr.php">Clear Filter</a>
                <button class="btn btn-primary mr-2" onclick="printReport()">Print Report</button>
            </div>
        </div>
    </div>
    <div class="print-container">
        <div id="printDate"></div>
        <table>
            <thead>
                <tr>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>ID Number</th>
                    <th>Year</th>
                    <th>Contact</th>
                    <th>Address</th>
                    <th>Lab</th>
                    <th>Login Time</th>
                    <th>Logout Time</th>
                    <th>Purpose</th>
                </tr>
            </thead>
            <tbody id="reportTableBody">
            <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "eyacdb";
                $conn = mysqli_connect($servername, $username, $password, $dbname);

                // Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                // Check if any filters are applied
                $sql = "SELECT 
                            a.accinfo_firstname, 
                            a.accinfo_lastname, 
                            a.accinfo_idno, 
                            a.accinfo_year,  
                            a.accinfo_contact, 
                            a.accinfo_address,
                            s.lab, 
                            s.login_time, 
                            s.logout_time, 
                            s.purpose 
                        FROM 
                            accountinfo a 
                        INNER JOIN 
                            sitin s ON a.accinfo_id = s.student_id";

                if(isset($_GET['date'])) {
                    $filtered_date = $_GET['date'];
                    $sql .= " WHERE DATE(s.login_time) = '$filtered_date'";
                }
                if(isset($_GET['filterLab'])) {
                    $lab_filter = $_GET['filterLab'];
                    $sql .= (strpos($sql, 'WHERE') !== false ? ' AND' : ' WHERE') . " s.lab = '$lab_filter'";
                }
                if(isset($_GET['filterPurpose'])) {
                    $purpose_filter = $_GET['filterPurpose'];
                    $sql .= (strpos($sql, 'WHERE') !== false ? ' AND' : ' WHERE') . " s.purpose = '$purpose_filter'";
                }

                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['accinfo_firstname'] . "</td>";
                        echo "<td>" . $row['accinfo_lastname'] . "</td>";
                        echo "<td>" . $row['accinfo_idno'] . "</td>";
                        echo "<td>" . $row['accinfo_year'] . "</td>";
                        echo "<td>" . $row['accinfo_contact'] . "</td>";
                        echo "<td>" . $row['accinfo_address'] . "</td>";
                        echo "<td>" . $row['lab'] . "</td>";
                        echo "<td>" . $row['login_time'] . "</td>";
                        echo "<td>" . $row['logout_time'] . "</td>";
                        echo "<td>" . $row['purpose'] . "</td>";
                        echo "</tr>";
                    }

                    echo "</tbody>";
                    echo "</table>";
                } else {
                    echo "<p>No records found</p>";
                }

                mysqli_close($conn);
            ?>
        </table>
        <?php if(!isset($filtered_date)): ?>
            <div></div>
        <?php endif; ?>
    </div>
</div>
<script>
    function filterRecords() {
        var selectedDate = document.getElementById("filterDate").value;
        var selectedLab = document.getElementById("filterLab").value;
        var selectedPurpose = document.getElementById("filterPurpose").value;
        fetchRecords(selectedDate, selectedLab, selectedPurpose);
    }

    function fetchRecords(selectedDate, selectedLab, selectedPurpose) {
        var url = window.location.href.split('?')[0];
        if (selectedDate !== '') {
            url += '?date=' + selectedDate;
        }
        if (selectedLab !== '') {
            url += (url.includes('?') ? '&' : '?') + 'filterLab=' + selectedLab;
        }
        if (selectedPurpose !== '') {
            url += (url.includes('?') || selectedLab !== '' || selectedDate !== '' ? '&' : '?') + 'filterPurpose=' + selectedPurpose;
        }
        window.location.href = url;
    }

    function printReport() {
        var currentDate = new Date();
        var formattedDate = currentDate.toLocaleString();
        document.getElementById("printDate").innerHTML = "Printed at " + formattedDate;
        window.print();
    }
</script>


</body>
</html>
