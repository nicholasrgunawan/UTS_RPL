<?php
include "db_conn.php";
$id = $_GET['id'];
if (isset($_POST['submit'])) {
    $product_name = $_POST['product_name'];
    $product_quantity = $_POST['quantity'];
    $product_price = $_POST['price'];
    $product_category = $_POST['category'];
    $image = $_POST['image'];

    $query = " UPDATE products
    SET product_name = '$product_name', quantity = '$product_quantity', price = '$product_price', category = '$product_category', image = '$image'
    WHERE product_id = '$id' ";

    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: prod.php?msg= Record updated successfully");
    } else {
        echo "Failed: " . mysqli_error($conn);
    }
}

?>

<!doctype html>
<html lang="en">
<!-- custom css file link  -->
<link rel="stylesheet" href="css/style1.css">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Create App</title>
</head>
<?php

?>

<body>
    <header>
        <div class="container">
            <h1><a href="home.php">All You Need Minimarket</a></h1>
        </div>
    </header>

    <div class="section">
        <div class="container">
            <h3>Edit Products</h3>
            <div class="box">
                <p class="text-muted">Click update to change product details</p>


                <?php

                $query = "SELECT * FROM products WHERE product_id = $id LIMIT 1";
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_assoc($result);
                ?>
                <div class="container">
                    <form action="" method="post">
                        <input type="text" class="input-control" name="product_name" value="<?php echo $row['product_name'] ?>">
                        <input type="text" class="input-control" name="quantity" value="<?php echo $row['quantity'] ?>">
                        <input type="text" class="input-control" name="price" value="<?php echo $row['price'] ?>">
                        
                        <select class="input-control" name="category" id="category">
                            <option value="">--Select--</option>
                            <?php
                            $query = "SELECT category_name FROM categories";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                                <option><?php echo $row['category_name']; ?></option>
                            <?php } ?>
                        </select>
                        <br>
                        <label class="form-label" style="float: left;">Upload image</label>
                        <input type="file" name="image" class="input-control" accept="image/jpg, image/jpeg, image/png">
                        <button type="submit" class="btn btn-success" name="submit"> Update </button>
                        <a href="prod.php" class="btn btn-danger">Cancel</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="container">
            <small>Copyright &copy; 2023 - All You Need Minimarket.</small>
        </div>
    </footer>
</body>

</html>