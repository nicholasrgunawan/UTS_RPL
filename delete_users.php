<?php
include 'db_conn.php';
$id = $_GET['id'];
$query = "DELETE FROM user_form WHERE id = $id";
$result = mysqli_query($conn, $query);
if ($result) {
    header("Location: users.php?msg= Record deleted successfully");
    $query ="ALTER TABLE user_form AUTO_INCREMENT = 0";
    $result = mysqli_query($conn, $query);
}else{
        echo "Failed: " . mysqli_error($conn);
    }

?>