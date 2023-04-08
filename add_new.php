<?php
include "db_conn.php";

if (isset($_POST['submit'])) {
    $product_name = $_POST['product_name'];
    $product_quantity = $_POST['quantity'];
    $product_price = $_POST['price'];
    $category = $_POST['category'];

    $query = " INSERT INTO products(product_id, product_name, quantity, price, category)
    VALUES(NULL,'$product_name','$product_quantity','$product_price','$category') ";
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
    <link rel="stylesheet" href="css/style4.css">
</head>
<?php
include 'navbar.php'
?>

<body>

    <div class="container">
        <br>
        <div class="text-center mb-4">
            <h3>Add New Products</h3>
            <p class="text-muted">Complete the form below to add</p>
        </div>
        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width: 50vw; min-width: 300px;">
                <div class="row">
                    <div class="col">
                        <label class="form-label">Product Name</label>
                        <input type="text" class="form-control" name="product_name" placeholder="Marlboro">
                    </div>

                    <div class="col">
                        <label class="form-label">Quantity</label>
                        <input type="text" class="form-control" name="quantity" placeholder="500">
                    </div>

                </div>
                <div class="col">
                    <label class="form-label">Price</label>
                    <input type="text" class="form-control" name="price" placeholder="35000">
                </div>
                <br>
                <div class="form-group mb-3">
                    <label>Categories:</label>
                    <select name="category" id="category">
                        <option value="">Select</option>
                        <?php
                        $query = "SELECT category_name FROM categories";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <option><?php echo $row['category_name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div>
                    <button type="submit" class="btn btn-success" name="submit"> Save </button>
                    <a href="prod.php" class="btn btn-danger">Cancel</a>
                </div>
            </form>

        </div>
    </div>

</body>

</html>