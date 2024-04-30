<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Navbar</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Super tech company</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admin.php">Admin page</a>
          </li>

		      <li class="nav-item">
             <a class="nav-link" href="per.php">My Order</a>
          </li>


          <li class="nav-item">
            <form class="d-flex me-2" action="register_2.php" method="get">
              <button class="btn btn-outline-primary" type="submit">Register</button>
            </form>
          </li>
          <?php if (isset($_SESSION['username'])) : ?>
		
            <li class="nav-item">
              <form class="d-flex" action="logout.php" method="get">
                <button class="btn btn-outline-danger" type="submit">Logout</button>
              </form>
            </li>
          <?php else : ?>
            <li class="nav-item">
              <form class="d-flex" action="loginv_2.php" method="get">
                <button class="btn btn-outline-success" type="submit">Go to Login Page</button>
              </form>
            </li>
          <?php endif; ?>
        </ul>
        <form class="d-flex" method="get" action="search.php">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="query">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>

  <!-- Include Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>