<?php
include 'templates/server.php';

$product_id = $_GET['id'] ?? null;

if ($product_id) {
  $sql = "SELECT * FROM reviews WHERE product_ID = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $product_id);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $reviews = $result->fetch_all(MYSQLI_ASSOC);
  } else {
    $reviews = [];
    // echo "No reviews yet.";
  }
} else {
  echo "Product ID is missing.";
  exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <?php include 'templates/navbar.php'; ?>
  <div class="container mt-5">
    <h1>Product Reviews</h1>
    <?php if (!empty($reviews)) : ?>
      <div class="row">
        <?php foreach ($reviews as $review) : ?>
          <div class="col-md-4 mb-4">
            <div class="card h-100">
              <div class="card-body">
                <p>Rating: <?= htmlspecialchars($review['rating']) ?></p>
                <p>Comment: <?= htmlspecialchars($review['comment']) ?></p>
                <p>Date: <?= htmlspecialchars($review['Date']) ?></p>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    <?php else : ?>
      <p>No reviews yet.</p>
    <?php endif; ?>
  </div>
  <?php include 'templates/footer.php'; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>