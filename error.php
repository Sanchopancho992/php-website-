
<div class="container mt-3">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <?php if (!empty($errors)) : ?>
        <div class="alert alert-danger">
          <?php foreach ($errors as $error) : ?>
            <p class="error-message mb-0"><?php echo htmlspecialchars($error); ?></p>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>