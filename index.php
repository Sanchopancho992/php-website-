<?php

include 'templates/server.php';


$sql = "SELECT * FROM products";
$result = $conn->query($sql);

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
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Main page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>


<body>
  <?php include 'templates/navbar.php'; ?>
  <div class="container mt-5">
    <div class="row">
      <?php foreach ($products as $product) : ?>
        <div class="col-md-4 mb-4">
          <div class="card h-100 d-flex flex-column">
            <div class="card-body">
              <h3><?php echo htmlspecialchars($product['brand']); ?></h3>
              <p><?php echo htmlspecialchars($product['model']); ?></p>
              <p><?php echo htmlspecialchars($product['category']); ?></p>
              <p><?php echo htmlspecialchars($product['price']); ?></p>
              <p><?php echo htmlspecialchars($product['specifications']); ?></p>
              <p><?php echo htmlspecialchars($product['description']); ?></p>
            </div>
            <div class="card-footer mt-auto">
              <?php if ($product['stock'] > 0) : ?>
                <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) : ?>
                  <a href="cart.php?id=<?php echo htmlspecialchars($product['product_ID']); ?>&method=add" class="btn btn-primary">Add to Cart</a>
                <?php endif; ?>
              <?php else : ?>
                <p>Out of Stock</p>
              <?php endif; ?>
              <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) : ?>
                <a href="reviews.php?id=<?php echo htmlspecialchars($product['product_ID']); ?>" class="btn btn-success">Write a Review</a>
                <a href="view_review.php?id=<?php echo htmlspecialchars($product['product_ID']); ?>" class="btn btn-secondary">View Reviews</a>
              <?php endif; ?>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
  <div class="d-flex justify-content-center">
    <a href="cart.php" class="btn btn-primary">View Cart</a>
  </div>
  <?php include 'templates/footer.php'; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>