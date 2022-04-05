<?php require APPROOT . '/views/includes/header.php'; ?>
<?php require APPROOT . '/views/includes/navbar.php'; ?>

<main class="container">
  <div>
    <div class="d-flex justify-content-between align-items-center">
      <h2 class="fw-bold"><?= $data['username'] ?>, you currently hold a balance of <span class="text-success">$<?= number_format($data['user']->cash_balance, 2, '.', '') ?></span></h2>
      
    </div>
    <hr class="mb-4">
    <?php if (!empty($data['error'])) : ?>
        <div class="alert alert-danger">
          <?php echo $data['error']; ?>  
        </div>
      <?php endif; ?>
      
    <form action="" method="POST" class="form">
        <div class="mb-3">
          <label class="mb-2" for="">Enter amount:</label>
          <input class="form-control" type="number" name="amount" id="amount" required>
        </div>
        <div class="mb-5">
          <input class="btn btn-primary" type="submit" value="Add" name="Add">
        </div>
      </form>
  </div>
</main>

<?php require APPROOT . '/views/includes/footer.php'; ?>


