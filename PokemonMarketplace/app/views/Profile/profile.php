<?php require APPROOT . '/views/includes/header.php'; ?>
<?php require APPROOT . '/views/includes/navbar.php'; ?>

<main class="container">
  <div>
    <div class="d-flex justify-content-between align-items-center">
      <h2 class="fw-bold"><?= $data['username'] ?></h2>
      <?php  if ($data['is_mine']) : ?> 
        <a href="<?= URLROOT ?>/Posts/createCard" class="btn btn-success">Create Post</a>
      <?php endif; ?>
    </div>
    <div class="d-flex flex-row align-items-left">
    <form action="" method="POST">
    <fieldset class="rating">
  <input type="radio" id="star5" name="rating" value="5" /><label class="bi bi-star-fill" for="star5" title="5 stars"></label>
  <input type="radio" id="star4" name="rating" value="4" /><label class="bi bi-star-fill" for="star4" title="4 stars"></label>
  <input type="radio" id="star3" name="rating" value="3" /><label class="bi bi-star-fill" for="star3" title="3 stars"></label>
  <input type="radio" id="star2" name="rating" value="2" /><label class="bi bi-star-fill" for="star2" title="2 stars"></label>
  <input type="radio" id="star1" name="rating" value="1" /><label class="bi bi-star-fill" for="star1" title="1 star"></label>
</fieldset>
<input type="submit" name="rate" value="Give Rating!" class="btn btn-info ">
    </form>

      
</div>
      </div>
    <hr class="mb-4">
    <?php foreach ($data['posts'] as $post) : ?>
      <article class="card mb-4 mx-auto post" id="post_num_<?= $post->post_id ?>">
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
                  Price: <?= $post->post_price ? '$' . $post->post_price : 'N/A' ?>
                </h3>
                <div>
                  <?php if ($data['is_mine']) : ?>
                    <a class="link-info me-1" href="<?= URLROOT ?>/Posts/updatePost/<?= $post->post_id ?>">Edit</a>
                    <a class="link-danger" href="<?= URLROOT ?>/Posts/deletePost/<?= $post->post_id ?>">Delete</a>
                  <?php else : ?>
                    <a href="<?= URLROOT ?>/post/<?= $post->post_id ?>" class="link-info">View More</a>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        </main>
        <?php require APPROOT . '/views/includes/post_footer.php'; ?>
      </article>
    <?php endforeach; ?>
  </div>
</main>

<?php require APPROOT . '/views/includes/footer.php'; ?>
