<?php
include 'templates/server.php';

// Initialize message variable
$message = '';

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_review'])) {
  $product_id = mysqli_real_escape_string($conn, $_POST['product_id']);
  $rating = mysqli_real_escape_string($conn, $_POST['rating']);
  $review = mysqli_real_escape_string($conn, $_POST['review']);
  $user_id = $_SESSION['uid']; // Assuming the user ID is stored in the session

  // Insert review into database
  $sql = "INSERT INTO reviews (product_ID, user_ID, rating, comment, Date) VALUES ('$product_id', '$user_id', '$rating', '$review', CURDATE())";

  if (mysqli_query($conn, $sql)) {
    $message = "Review submitted successfully!";
  } else {
    $message = "Error: " . mysqli_error($conn);
  }
}

// Retrieve products from the database
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
$products = [];

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $products[] = $row;
  }
} else {
  echo "0 results";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Review</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <?php include 'templates/navbar.php'; ?>
  <div class="container mt-5">
    <?php if ($message) echo "<p class='alert alert-success'>$message</p>"; ?>
    
    <div class="row"> <!-- Start of the row -->
        <?php foreach ($products as $product) : ?>
          <div class="col-md-4 mb-4"> <!-- Each card takes up 4 columns -->
            <div class="card h-100">
              <div class="card-body">
                <h5 class="card-title"><?php echo htmlspecialchars($product['name']); ?></h5>
                <p class="card-text"><?php echo htmlspecialchars($product['description']); ?></p>

                <!-- Review Form -->
                <form action="reviews.php" method="POST">
                  <input type="hidden" name="product_id" value="<?php echo $product['product_ID']; ?>">
                  <div class="mb-3">
                    <label for="rating" class="form-label">Rating:</label>
                    <select name="rating" class="form-select" required>
                      <option value="">Select Rating</option>
                      <option value="1">1 - Poor</option>
                      <option value="2">2 - Fair</option>
                      <option value="3">3 - Good</option>
                      <option value="4">4 - Very Good</option>
                      <option value="5">5 - Excellent</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="review" class="form-label">Review:</label>
                    <textarea class="form-control" name="review" required></textarea>
                  </div>
                  <button type="submit" name="submit_review" class="btn btn-primary">Submit Review</button>
                </form>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
    </div> <!-- End of the row -->
  </div>
  <?php include 'templates/footer.php'; ?>
</body>
</html>