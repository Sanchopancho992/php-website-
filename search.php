<?php
include 'templates/server.php';  // Ensure your database connection is correct

$search_query = mysqli_real_escape_string($conn, $_GET['query']);
$sql = "SELECT * FROM products WHERE 
        Brand LIKE '%$search_query%' OR 
        Model LIKE '%$search_query%' OR 
        Category LIKE '%$search_query%' OR 
        Price LIKE '%$search_query%' OR 
        Specifications LIKE '%$search_query%'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $products[] = $row;
  }
} else {
  $no_results = "No results found";
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
    <?php if (empty($products)) : ?>
      <p><?php echo $no_results; ?></p>
    <?php else : ?>
      <div class="row">
        <?php foreach ($products as $product) : ?>
          <div class="col-md-4 mb-4">
            <div class="card h-100">
              <div class="card-body">
                <h3><?php echo htmlspecialchars($product['brand']); ?></h3>
                <p><?php echo htmlspecialchars($product['model']); ?></p>
                <p><?php echo htmlspecialchars($product['category']); ?></p>
                <p><?php echo htmlspecialchars($product['price']); ?></p>
                <p><?php echo htmlspecialchars($product['specifications']); ?></p>
                <p><?php echo htmlspecialchars($product['description']); ?></p>
                <?php
                if ($product['stock'] > 0) {
                ?>
                  <p><a href="cart.php?id=<?php echo htmlspecialchars($product['product_ID']); ?>&method=add">add cart</a></p>
                <?php
                } else {
                ?>
                  <p> stock null</p>
                <?php
                }
                ?>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>
  <?php include 'templates/footer.php'; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>