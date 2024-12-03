<?php
include "connector_db.php";

if(isset($_GET['accinfo_id'])) { 
    $accinfo_id = mysqli_real_escape_string($conn, $_GET['accinfo_id']); 
    
    $logout_time = date("Y-m-d H:i:s");

    $update_sitin_query = "UPDATE sitin SET logout_time = '$logout_time' WHERE student_id = '$accinfo_id'"; 

    if(mysqli_query($conn, $update_sitin_query)) {
        $update_accountinfo_query = "UPDATE accountinfo SET remain_ss = remain_ss - 1 WHERE accinfo_id='$accinfo_id'"; 
        if(mysqli_query($conn, $update_accountinfo_query)) {
            header("Location: admin-staff.php");
            exit();
        } else {
            echo "Error updating remain_ss: " . mysqli_error($conn);
        }
    } else {
        echo "Error updating logout_time: " . mysqli_error($conn);
    }
} else {
    echo "HELLO";
    //header("Location: previous_page.php");
    exit();
}
mysqli_close($conn);
?>
