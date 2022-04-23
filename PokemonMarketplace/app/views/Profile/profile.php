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
        <footer class="card-footer">
          <ul class="nav nav-tabs" id="commentsOffers" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="comment-tab" data-bs-toggle="tab" data-bs-target="#comment" type="button" role="tab" aria-controls="comment">Comments</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="offer-tab" data-bs-toggle="tab" data-bs-target="#offer" type="button" role="tab" aria-controls="offer">Offers</button>
            </li>
          </ul>
          <div class="tab-content" id="commentsOffersContent">
            <div class="tab-pane fade" id="comment" role="tabpanel" aria-labelledby="comment-tab">
              <!-- [!INSERT COMMENTS HERE!] -->
            </div>
            <div class="tab-pane fade" id="offer" role="tabpanel" aria-labelledby="offer-tab">
              <div class="list-group pt-2">
                <?php $count = 0; ?>
                <?php foreach ($post->offers as $offer) : ?>
                  <a href="<?= URLROOT ?>/offer/accept" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                    <span class="h5"><strong><?= $offer->username ?></strong> offers
                      <?php if ($count == 0) : ?>
                        <strong class="text-danger">
                          <?php $count = $count + 1 ?>
                        <?php else : ?>
                          <strong>
                          <?php endif; ?>
                          $<?= $offer->offer_price ?></strong></span>
                    <small><?= $offer->created_at ?></small>
                  </a>
                <?php endforeach; ?>
              </div>
              <form action="<?= URLROOT ?>/offer/create" method="post" class="p-2">
                <input type="hidden" name="route" value="home">
                <input type="hidden" name="post_num" value="<?= $post->post_id ?>">
                <div class="input-group">
                  <input type="number" name="offer_price" id="offer_price" class="form-control" step="0.01" min="0" aria-label="Create Offer" placeholder="$0.00">
                  <button class="btn btn-primary" type="submit">Offer</button>
                </div>
              </form>
            </div>
          </div>
        </footer>
      </article>
    <?php endforeach; ?>
  </div>
</main>

<?php require APPROOT . '/views/includes/footer.php'; ?>