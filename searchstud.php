<?php
include "connector_db.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search_value = $_POST['sstd'];

    if(empty($search_value)) {
        header("Location: search.php?error=Type something first to search.");
        exit();
    }

    $query = "SELECT * FROM accountinfo WHERE accinfo_email = '$search_value' OR accinfo_idno = '$search_value'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) { 
        $row = mysqli_fetch_assoc($result);
        $accID = $row['accinfo_id'];
        $id_or_email = $row['accinfo_idno']; 
        $remaining_session = $row['remain_ss'];
        header("Location: search.php?result=" . urlencode($id_or_email) . "&remaining_session=" . urlencode($remaining_session) . "&accID=" . urlencode($accID));
        exit();
    } else {
        header("Location: search.php?error=Student Not Found!!!!!");
    }
    
    
    mysqli_free_result($result);
    mysqli_close($conn);
}

