<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category List</title>
    
</head>
<body style="background-color: lightgray;">
    <?php include 'navbar.php' ?>
    <br>
    <div class="container">
        <?php
        if(isset($_GET['msg'])){
            $msg = $_GET['msg'];
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  '.$msg.'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
        }
        ?>
        <a href="add_category.php" class="btn btn-dark mb-3"><i class="fa-solid fa-plus fs-5 text-center"></i></a>
    <table class="table table-hover text-center" style="background-color: white;">
        <thead class="table-dark">
            <tr>
                <th scope="col">Category_id</th>
                <th scope="col">Category_name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include "db_conn.php";
            $query = "SELECT * FROM categories";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                <td><?php echo $row['id']?></td>
                <td><?php echo $row['category_name']?></td>
                <td>
                    <a href="edit_category.php?id=<?php echo $row['id'] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
                    <a href="delete_category.php?id=<?php echo $row['id'] ?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
                </td>
            </tr>
                <?php
            }
            ?>
            
            
        </tbody>
    </table>
    </div>
</body>

</html>