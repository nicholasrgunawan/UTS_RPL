<?php
include "db_conn.php";

if (isset($_POST['submit'])) {
    $category = $_POST['category_name'];
    $query = " INSERT INTO categories(id, category_name)
    VALUES(NULL,'$category') ";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: categories.php?msg=New record created successfully");
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
include 'navbar.php'
?>

<body>

    <div class="container">
        <br>
        <div class="text-center mb-4">
            <h3>Add New Category</h3>
            <p class="text-muted">Complete the form below to add</p>
        </div>
        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width: 50vw; min-width: 300px;">
                <div class="row">
                    <div class="col">
                        <label class="form-label">Category Name</label>
                        <input type="text" class="input-control" name="category_name" placeholder="Category name">
                    </div>
                <br>
                <div>
                    <button type="submit" class="btn-success" name="submit"> Save </button>
                    <a href="categories.php" class="btn-danger">Cancel</a>
                </div>
            </form>

        </div>
    </div>

</body>

</html>