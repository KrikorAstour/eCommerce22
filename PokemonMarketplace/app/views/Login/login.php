<?php require APPROOT . '/views/includes/header.php'; ?>

<main class="container">
  <div class="row vh-100 d-flex align-items-center">
    <div class="col-lg-4 col-sm-8 col-10 mx-auto shadow py-5 px-4">
      <h1 class="fw-bolder text-center mb-4">Login</h1>
      <?php if (!empty($data['error'])) : ?>
        <div class="alert alert-danger">
          <?php foreach ($data['error'] as $error) : ?>
            <div>
              <?= $error ?>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
      <form action="" method="POST" class="form">
        <div class="mb-3">
          <label class="mb-2" for="email">Email:</label>
          <input class="form-control" type="text" name="email" id="email" required>
        </div>
        <div class="mb-3">
          <label class="mb-2" for="password">Password:</label>
          <input class="form-control" type="password" name="password" id="password" required>
        </div>
        <div class="mb-4">
          <label class="mb-2" for="two_fa">2FA Token:</label>
          <input class="form-control" type="password" name="two_fa" id="two_fa">
        </div>
        <div class="mb-5">
          <input class="btn btn-primary" type="submit" value="Login" name="Login">
        </div>
      </form>
      <div class="text-center pt-3">
        Didn't have an account? <a href="<?= URLROOT ?>/login/signup" class="link-primary">Sign Up!</a>
      </div>
    </div>
  </div>
</main>

<?php require APPROOT . '/views/includes/footer.php'; ?>