<?php
include "db_conn.php";
$id = $_GET['id'];
if(isset($_POST['submit'])) {
    $category_name = $_POST['category_name'];

    $query = " UPDATE categories
    SET category_name = '$category_name'
    WHERE id = '$id' ";

    $result = mysqli_query($conn,$query);

    if($result){
        header("Location: categories.php?msg= Record updated successfully");
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
        
        $query = "SELECT * FROM categories WHERE id = $id LIMIT 1";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result); 
        ?>
        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width: 50vw; min-width: 300px;">
                <div class="row">
                    <div class="col">
                        <label class="form-label">Category Name</label>
                        <input type="text" class="form-control" name="category_name" value="<?php echo $row['category_name']?>">
                    </div>
                <div>
                    <button type="submit" class="btn btn-success" name="submit"> Update </button>
                    <a href="categories.php" class="btn btn-danger">Cancel</a>
                </div>
            </form>

        </div>
    </div>
    
</body>

</html>