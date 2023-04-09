<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
</head>
<style>
    img {
        width: 50%;
    }
</style>

<body style="background-color: lightgray;">
    <?php include 'navbar.php' ?>
    <br>
    
        <div class="container">
            <?php
            if (isset($_GET['msg'])) {
                $msg = $_GET['msg'];
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  ' . $msg . '
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
            }
            ?>
            <a href="add_new.php" class="btn btn-dark mb-3"><i class="fa-solid fa-plus fs-5 text-center"></i></a>
            <form method="post" style="text-align: right;" class="mb-3">
                <input type="text" placeholder="Search..." name="search">
                <button class="btn btn-dark btn-sm" name="submit">Search</button>
            </form>
            <table class="table table-hover text-center" style="background-color: white;">
                <?php
                include "db_conn.php";
                if (isset($_POST['submit'])) {
                    $search = $_POST['search'];
                    $query = "select * from products where product_id='$search' or product_name like '%$search%' or category like'%$search%'";
                    $result = mysqli_query($conn, $query);
                    if ($result) {
                        if (mysqli_num_rows($result) > 0) {
                            echo '<thead class="table-dark">
                            <tr>
                    <th scope="col">Product_id</th>
                    <th scope="col">Product_name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Category</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                </tr>
                                </thead>
                            ';
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<tbody>
                            <tr>
                            <td>' . $row['product_id'] . '</td>
                            <td>' . $row['product_name'] . '</td>
                            <td>' . $row['quantity'] . '</td>
                            <td>' . $row['price'] . '</td>
                            <td>' . $row['category'] . '</td>
                            <td>' . $row['image'] . '</td>
                            <td>
                            <a href="edit.php?id=' . $row['product_id'] . '" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
                            <a href="delete.php?id=' . $row['product_id'] . '" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
                        </td>
                            </tr>
                            </tbody>';
                            }
                        } else {
                            echo '<h2 class =text-danger>Data Not Found</h2>';
                        }
                    }
                }
                ?>
            </table>
            <table class="table table-hover text-center" style="background-color: white;">
                <thead class="table-dark">
                    <tr>
                        <th scope="col" style="width: 150px;">Product_id</th>
                        <th scope="col" style="width: 150px;">Product_name</th>
                        <th scope="col" style="width: 150px;">Quantity</th>
                        <th scope="col" style="width: 150px;">Price</th>
                        <th scope="col" style="width: 150px;">Category</th>
                        <th scope="col" style="width: 150px;">Image</th>
                        <th scope="col" style="width: 150px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "db_conn.php";
                    $query = "SELECT * FROM products";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                            <td><?php echo $row['product_id'] ?></td>
                            <td><?php echo $row['product_name'] ?></td>
                            <td><?php echo $row['quantity'] ?></td>
                            <td>Rp.<?php echo number_format($row['price']) ?></td>
                            <td><?php echo $row['category'] ?></td>
                            <td> <img src="products/<?php echo $row['image'] ?>"></td>
                            <td>
                                <a href="edit.php?id=<?php echo $row['product_id'] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
                                <a href="delete.php?id=<?php echo $row['product_id'] ?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>


                </tbody>
            </table>
        </div>
    </div>
    

</body>


</html>