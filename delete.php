<?php
include 'db_conn.php';
$id = $_GET['id'];
$query = "DELETE FROM products WHERE product_id = $id";
$result = mysqli_query($conn, $query);
if ($result) {
    header("Location: prod.php?msg= Record deleted successfully");
    $query ="ALTER TABLE products AUTO_INCREMENT = 0";
    $result = mysqli_query($conn, $query);
}else{
        echo "Failed: " . mysqli_error($conn);
    }

?>