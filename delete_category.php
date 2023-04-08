<?php
include 'db_conn.php';
$id = $_GET['id'];
$query = "DELETE FROM categories WHERE id = $id";
$result = mysqli_query($conn, $query);
if ($result) {
    header("Location: categories.php?msg= Record deleted successfully");
    $query ="ALTER TABLE categories AUTO_INCREMENT = 0";
    $result = mysqli_query($conn, $query);
}else{
        echo "Failed: " . mysqli_error($conn);
    }
?>