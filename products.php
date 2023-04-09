<?php
error_reporting(0);
include 'db_conn.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style1.css">
</head>

<body>
    <header>
        <div class="container">
            <h1><a href="home.php">All You Need Minimarket</a></h1>
            <ul>
                <li style="font-size: 30px; float: right;"><a href="products.php">Products</a></li>
            </ul>
        </div>
    </header>

    <div class="search">
        <div class="container">
            <form action="products.php">
                <input type="text" name="search" placeholder="Search Product" value="<?php echo $_GET['search']?>">
                <input type="submit" name="searching" value="Search">
            </form>
        </div>
    </div>


    <div class="section">
        <div class="container">
            <h3>Products</h3>
            <div class="box">
                <?php
                if ($_GET['search'] != '' ) {
                    $where = "AND product_name LIKE '%".$_GET['search']."%' ";
                }
                $product = mysqli_query($conn, "SELECT * from products where quantity > 0 $where order by product_id DESC");
                if (mysqli_num_rows($product) > 0) {
                    while ($p = mysqli_fetch_array($product)) {
                ?>
                        <a href="detail-product.php?id=<?php echo $p['product_id'] ?>">
                            <div class="col-4">
                                <img src="products/<?php echo $p['image'] ?>">
                                <p class="name"><?php echo $p['product_name'] ?></p>
                                <p class="price">Rp. <?php echo $p['price'] ?></p>
                            </div>
                        </a>
                    <?php }
                } else { ?>
                    <p>Product Unavailable</p>
                <?php } ?>

            </div>
        </div>
    </div>
    <div class="footer">
        <div class="container">
            <small>Copyright &copy; 2023 - All You Need Minimarket.</small>
        </div>
    </div>
</body>

</html>