<?php require APPROOT . '/views/includes/header.php'; ?>
<?php require APPROOT . '/views/includes/navbar.php'; ?>

<main class="container">
  <div>
    <div class="d-flex justify-content-between align-items-center">
      <h2 class="fw-bold"><?= $data['username'] ?></h2>
      <?php if ($data['is_mine']) : ?>
        <a href="<?= URLROOT ?>/post/create" class="btn btn-success">Create Post</a>
      <?php endif; ?>
    </div>
    <hr class="mb-4">
    <?php foreach ($data['posts'] as $post) : ?>
      <article class="card mb-4 mx-auto post">
        <header class="card-header bg-danger text-white d-flex justify-content-between align-items-center">
          <h2 class="fs-4"><?= $data['username'] ?></h2>
          <a class="<?= $post->is_saved_by_me ? 'fa-solid saved' : 'fa-regular save' ?> fa-bookmark link-light fs-4" href="<?= URLROOT ?>/posts/save_from_profile/<?= $post->post_id . '/' . $data['user_id'] ?>"></a>
        </header>
        <main class="row g-0">
          <div class="col-4 p-2">
            <img src="<?= $post->card_image ?>" alt="<?= $post->card_name ?> Pokemon Card" class="img-fluid">
          </div>
          <div class="col-8">
            <div class="card-body h-100 d-flex flex-column justify-content-between">
              <div>
                <h1 class="card-title"><?= $post->post_title ?></h1>
                <p class="card-text"><?= $post->post_description ?></p>
              </div>
              <div class="d-flex justify-content-between align-items-center">
                <h3 class="fs-4 fw-bold">
                  Price: <?= $post->price ? '$' . $post->price : 'N/A' ?>
                </h3>
                <div>
                  <?php if ($data['is_mine']) : ?>
                    <a class="link-info me-1" href="<?= URLROOT ?>/post/update/<?= $post->post_id ?>">Edit</a>
                    <a class="link-danger" href="<?= URLROOT ?>/post/delete/<?= $post->post_id ?>">Delete</a>
                  <?php else : ?>
                    <a href="<?= URLROOT ?>/post/<?= $post->post_id ?>" class="link-info">View More</a>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        </main>
      </article>
    <?php endforeach; ?>
  </div>
</main>

<?php require APPROOT . '/views/includes/footer.php'; ?>