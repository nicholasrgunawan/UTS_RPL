<?php
include "db_conn.php";

if (isset($_POST['submit'])) {
    $product_name = $_POST['product_name'];
    $product_quantity = $_POST['quantity'];
    $product_price = $_POST['price'];
    $category = $_POST['category'];
    $image = $_POST['image'];


    $query = " INSERT INTO products(product_id, product_name, quantity, price, category, image)
    VALUES(NULL,'$product_name','$product_quantity','$product_price','$category','$image') ";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: prod.php?msg=New record created successfully");
    } else {
        echo "Failed: " . mysqli_error($conn);
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create App</title>
    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style1.css">
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
            <h3>Add New Products</h3>
            <div class="box">
                <form action="" method="post">
                    <input type="text" name="product_name" class="input-control" placeholder="Product Name" required>
                    <input type="text" name="quantity" class="input-control" placeholder="Quantity" required>
                    <input type="text" name="price" class="input-control" placeholder="Price" required>

                    <select class="input-control" name="category" required>
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
                    <h3>Upload image</h3>
                    <input type="file" name="image" class="input-control" accept="image/jpg, image/jpeg, image/png">
                    <br>
                    <button type="submit" class="btn-success" name="submit"> Save </button>
                    <a type="cancel" href="prod.php" class="btn-danger">Cancel</a>
                </form>
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