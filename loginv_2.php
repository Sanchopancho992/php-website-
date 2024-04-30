<?php
include 'templates/server.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <?php include 'templates/navbar.php'; ?>

  <?php include 'error.php'; ?>

  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <form action="loginv_2.php" method="POST">
          <div class="mb-3">
            <label for="username" class="form-label">Username:</label>
            <input type="text" class="form-control" id="username" name="username" value="<?php echo htmlspecialchars($username ?? ''); ?>">
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password:</label>
            <input type="password" class="form-control" id="password" name="password">
          </div>
          <div class="d-grid gap-2">
            <button type="submit" class="btn btn-success" name="login">Login</button>
          </div>
          <p class="mt-3">Don't have an account? <a href="register_2.php">Register</a></p>
        </form>
      </div>
    </div>
  </div>
  <?php include 'templates/footer.php'; ?>

</body>

</html>