<?php require APPROOT . '/views/includes/header.php'; ?>
<?php require APPROOT . '/views/includes/navbar.php'; ?>

<main class="container">
    <div class="row">
        <div class="col-6 mx-auto">
            <h1>Purchases</h1>
            <div class="list-group pb-5">
                <?php foreach($data['purchases'] as $purchase): ?>
                <div class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <div class="h3"><span class="fw-bold"><?= $purchase->card_name ?></span> -- <?= $purchase->card_rarity ?></div>
                        <small><?= $purchase->created_at ?></small>
                    </div>
                    <div class="h4 text-danger">
                        <?= $purchase->purchase_price ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <h1>Sales</h1>
            <div class="list-group">
                <?php foreach($data['sales'] as $sale): ?>
                <div class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <div class="h3"><span class="fw-bold"><?= $sale->card_name ?></span> -- <?= $sale->card_rarity ?></div>
                        <small><?= $sale->created_at ?></small>
                    </div>
                    <div class="h4 text-success">
                        <?= $sale->sale_price ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</main>

<?php require APPROOT . '/views/includes/footer.php'; ?>