<?php
// Check if the user is logged in as an administrator
include "templates/server.php";

$perm = $_SESSION['admin']; // Get the admin permission level from the session

if ($perm != 1) { // If the user is not an admin
    header('Location: index.php'); // Redirect to the main page
    exit();
}

// Your admin-specific code goes here
// Example: Display a welcome message


if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $brand = mysqli_real_escape_string($conn, $_POST['brand']);
    $model = mysqli_real_escape_string($conn, $_POST['model']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $specifications = mysqli_real_escape_string($conn, $_POST['specifications']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $stock = mysqli_real_escape_string($conn, $_POST['stock']);
    $sql = "INSERT INTO products (name, brand, model, category, price, specifications, description, stock)
        VALUES ('$name', '$brand', '$model', '$category', '$price', '$specifications', '$description', $stock)";
    if (mysqli_query($conn, $sql)) {
        echo "New product added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php include 'templates/navbar.php'; ?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="admin.php" method="POST" class="needs-validation" novalidate>
                    <div class="mb-3">
                        <label for="name" class="form-label">Product Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="brand" class="form-label">Brand:</label>
                        <input type="text" class="form-control" id="brand" name="brand" required>
                    </div>
                    <div class="mb-3">
                        <label for="model" class="form-label">Model:</label>
                        <input type="text" class="form-control" id="model" name="model" required>
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Category:</label>
                        <input type="text" class="form-control" id="category" name="category" required>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price:</label>
                        <input type="text" class="form-control" id="price" name="price" required pattern="^\d+(\.\d{1,2})?$" title="Please enter a valid price with two decimal places.">
                    </div>
                    <div class="mb-3">
                        <label for="specifications" class="form-label">Specifications:</label>
                        <input type="text" class="form-control" id="specifications" name="specifications" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description:</label>
                        <textarea class="form-control" id="description" name="description" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="stock" class="form-label">Stock:</label>
                        <input type="number" class="form-control" id="stock" name="stock" required>
                        <button type="submit" name="submit" class="btn btn-primary" style="margin-top: 1rem;">Add Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <?php include 'templates/footer.php'; ?>

</body>

</html>