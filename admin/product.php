<?php
    session_start();
  
    
    if (!isset($_SESSION['admin'])) {
        header("location: form/login.php");
        exit();
    }
;
    include 'includes/navbar.php';
    include 'includes/connection.php';

    // Add Product
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $category = $_POST['category'];

        // Handle file upload
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image = $target_file;

            // Insert product into database
            $query = "INSERT INTO `add_product` (`name`, `price`, `image`, `category`) VALUES ('$name', '$price', '$image', '$category')";
            if (mysqli_query($conn, $query)) {
                $feedback = "Product added successfully!";
                $feedback_class = "success-msg";
            } else {
                $feedback = "Failed to add product.";
                $feedback_class = "error-msg";
            }
        } else {
            $feedback = "Failed to upload image.";
            $feedback_class = "error-msg";
        }
        header("location: product.php");
        exit();
    }

    // Delete Product
    if (isset($_POST['delete'])) {
        $id = $_POST['rowId'];

        // Delete product from database
        $query = "DELETE FROM `add_product` WHERE id = $id";
        if (mysqli_query($conn, $query)) {
            $feedback = "Product deleted successfully!";
            $feedback_class = "success-msg";
        } else {
            $feedback = "Failed to delete product.";
            $feedback_class = "error-msg";
        }
        header("location: product.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="product-container">
        <?php
        if (isset($feedback)) {
            echo "<div class='$feedback_class'>$feedback</div>";
        }
        ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <h2>Add Product</h2>
            <div class="fields">
                <label>Product Name:</label>
                <input type="text" name="name" placeholder="Enter Product Name" autocomplete="off" required>
                <label>Product Price:</label>
                <input type="number" name="price" placeholder="Enter Product Price" required>
                <label>Product Image:</label>
                <input type="file" name="image" accept="image/*" required>
                <label>Product Category:</label>
                <select name="category" required>
                    <option value="">Select</option>
                    <option value="T-shirts">T-shirts</option>
                    <option value="Jeans">Jeans</option>
                    <option value="Leggings">Leggings</option>
                    <option value="Skirts">Skirts</option>
                </select>
            </div>
            <div class="btns">
                <input type="submit" name="submit" value="Upload">
                <input type="reset" value="Reset">
            </div>
        </form>
    </div>

    <div class="table-container">
        <h2 class="heading">All Products</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Category</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $record = mysqli_query($conn, "SELECT * FROM `add_product` ORDER BY id DESC");
                while($row = mysqli_fetch_array($record)) {
                    echo "
                    <form action='' method='POST'>
                        <tr>
                            <td data-label='ID'><input type='hidden' name='rowId' value='{$row['id']}'>{$row['id']}</td>
                            <td data-label='Name'>{$row['name']}</td>
                            <td data-label='Price'>{$row['price']}</td>
                            <td data-label='Image'><img src='{$row['image']}' style='width:70px;'></td>
                            <td data-label='Category'>{$row['category']}</td>
                            <td data-label='Delete'><button name='delete'>Delete</button></td>
                        </tr>
                    </form>
                    ";
                }
            ?>  
            </tbody>
        </table>
    </div>
</body>
</html>
