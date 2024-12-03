<?php
include('connector_db.php');

$data = [];


// to get rows for lab rooms
$sqlRoom = "SELECT lab_room, COUNT(*) as count FROM endedsessions GROUP BY lab_room";
$resultRoom = mysqli_query($db, $sqlRoom);

if ($resultRoom) {
  while ($row = mysqli_fetch_assoc($resultRoom)) {
    $data['Room: ' . $row['lab_room']] = (int)$row['count'];
  }
}

// to get rows for purpuse
$sqlPurpose = "SELECT purpose, COUNT(*) as count FROM endedsessions GROUP BY purpose";
$resultPurpose = mysqli_query($db, $sqlPurpose);

if ($resultPurpose) {
  while ($row = mysqli_fetch_assoc($resultPurpose)) {
    $data['Purpose: ' . $row['purpose']] = (int)$row['count'];
  }
}

echo json_encode($data);

mysqli_close($db);
?>