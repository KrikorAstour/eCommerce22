<?php require APPROOT . '/views/includes/header.php'; ?>
<?php require APPROOT . '/views/includes/navbar.php'; ?>

<main class="container">
  <div>
    <div class="d-flex justify-content-between align-items-center">
      <h2 class="fw-bold"><?= $data['username'] ?>, you currently hold a balance of <span class="text-success">$<?= number_format($data['user']->cash_balance, 2, '.', '') ?></span></h2>
      <?php if ($data['is_mine']) : ?>
        <a href="<?= URLROOT ?>/deposit/add" class="btn btn-success">Add balance</a>
      <?php endif; ?>
    </div>
    <hr class="mb-4">
    
    <?php if (!empty($data['success'])) : ?>
        <div class="alert alert-success">
          <?php echo $data['success']; ?>  
        </div>
      <?php endif; ?>
  </div>
</main>

<?php require APPROOT . '/views/includes/footer.php'; ?>