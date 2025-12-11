<?php
include 'connect.php';

if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];
    // Use backticks for table names if necessary
    $sql = "DELETE FROM `student` WHERE id=$id";
    $result = mysqli_query($con, $sql);

    if ($result) {
        header('location:display.php');
       // echo "Deleted successfully";
    } else {
        die(mysqli_error($con));
    }
}
?>
