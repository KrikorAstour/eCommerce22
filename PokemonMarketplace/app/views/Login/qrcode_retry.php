<?php require APPROOT . '/views/includes/header.php'; ?>

<main class="container">
    <div class="row vh-100 d-flex align-items-center">
        <div class="col-lg-6 col-sm-10 col mx-auto text-center">
            <h1>Please rescan your QR Code!</h1>
            <h2><?= $data['try_num'] == 0 ? 'No' : $data['try_num'] ?> more <?= $data['try_num'] == 1 ? 'try' : 'tries' ?></h2>
            <div class="my-3">
                <img src="<?= $data['qr_link'] ?>" alt="QR Code for Two-Factor Auth" class="img-thumbnail">
            </div>
            <div>
                <a href="<?= URLROOT ?>/login">Click Here</a> to go to login page!
            </div>
        </div>
    </div>
</main>

<?php require APPROOT . '/views/includes/footer.php'; ?>