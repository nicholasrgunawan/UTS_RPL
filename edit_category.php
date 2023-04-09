<?php
include "db_conn.php";
$id = $_GET['id'];
if (isset($_POST['submit'])) {
    $category_name = $_POST['category_name'];

    $query = " UPDATE categories
    SET category_name = '$category_name'
    WHERE id = '$id' ";

    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: categories.php?msg= Record updated successfully");
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
            <h3>Edit Category</h3>
            <div class="box">
                <p class="text-muted">Click update to change category</p>
                <br>

                <?php

                $query = "SELECT * FROM categories WHERE id = $id LIMIT 1";
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_assoc($result);
                ?>
                    <form action="" method="post">
                                <input type="text" class="input-control" name="category_name" value="<?php echo $row['category_name'] ?>">
                                <button type="submit" class="btn btn-success" name="submit"> Update </button>
                                <a href="categories.php" class="btn btn-danger">Cancel</a>
                            
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<footer>
        <div class="container">
            <small>Copyright &copy; 2023 - All You Need Minimarket.</small>
        </div>
    </footer>
</html>