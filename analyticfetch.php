<?php
include('connector_db.php');

$data = [];

// manually change this change the chart 
// for the data to fetch
$date = '2024-05-24'; // for chart to change (CHART)

$sqlRoom = "SELECT lab_room, COUNT(*) as count FROM endedsessions WHERE DATE(sit_in_time) = '$date' GROUP BY lab_room";
$resultRoom = mysqli_query($db, $sqlRoom);

if ($resultRoom) {
  while ($row = mysqli_fetch_assoc($resultRoom)) {
    $data['Room: ' . $row['lab_room']] = (int)$row['count'];
  }
}


$sqlPurpose = "SELECT purpose, COUNT(*) as count FROM endedsessions WHERE DATE(sit_in_time) = '$date' GROUP BY purpose";
$resultPurpose = mysqli_query($db, $sqlPurpose);

if ($resultPurpose) {
  while ($row = mysqli_fetch_assoc($resultPurpose)) {
    $data['Purpose: ' . $row['purpose']] = (int)$row['count'];
  }
}

echo json_encode($data);

mysqli_close($db);
?>
