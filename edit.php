<?php
include "db_conn.php";
$id = $_GET['id'];
if(isset($_POST['submit'])) {
    $product_name = $_POST['product_name'];
    $product_quantity = $_POST['quantity'];
    $product_price = $_POST['price'];
    $product_category = $_POST['category'];

    $query = " UPDATE products
    SET product_name = '$product_name', quantity = '$product_quantity', price = '$product_price', category = '$product_category'
    WHERE product_id = '$id' ";

    $result = mysqli_query($conn,$query);

    if($result){
        header("Location: prod.php?msg= Record updated successfully");
    }
    else{
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
</head>
<?php
include 'navbar.php'
?>
<body>

    <div class="container">
        <br>
        <div class="text-center mb-4">
            <h3>Edit Products</h3>
            <p class="text-muted">Click update to change product details</p>
        </div>

        <?php
        
        $query = "SELECT * FROM products WHERE product_id = $id LIMIT 1";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result); 
        ?>
        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width: 50vw; min-width: 300px;">
                <div class="row">
                    <div class="col">
                        <label class="form-label">Product Name</label>
                        <input type="text" class="form-control" name="product_name" value="<?php echo $row['product_name']?>">
                    </div>

                    <div class="col">
                        <label class="form-label">Quantity</label>
                        <input type="text" class="form-control" name="quantity" value="<?php echo $row['quantity']?>">
                    </div>

                </div>
                <div class="col">
                    <label class="form-label">Price</label>
                    <input type="text" class="form-control" name="price" value="<?php echo $row['price']?>">
                </div>
                <br>
                <div class="form-group mb-3">
                    <label>Category :</label>
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
                    <button type="submit" class="btn btn-success" name="submit"> Update </button>
                    <a href="prod.php" class="btn btn-danger">Cancel</a>
                </div>
            </form>

        </div>
    </div>
    
</body>

</html>