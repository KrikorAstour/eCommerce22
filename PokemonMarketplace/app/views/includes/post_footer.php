            <footer class="card-footer">
                <ul class="nav nav-tabs" id="commentsOffers<?= $post->post_id ?>" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="comment-tab<?= $post->post_id ?>" data-bs-toggle="tab" data-bs-target="#comment<?= $post->post_id ?>" type="button" role="tab" aria-controls="comment">Comments</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="offer-tab<?= $post->post_id ?>" data-bs-toggle="tab" data-bs-target="#offer<?= $post->post_id ?>" type="button" role="tab" aria-controls="offer">Offers</button>
                    </li>
                </ul>
                <div class="tab-content" id="commentsOffersContent">
                    <div class="tab-pane fade" id="comment<?= $post->post_id ?>" role="tabpanel" aria-labelledby="comment-tab">
                        <!-- [!INSERT COMMENTS HERE!] -->
                    </div>
                    <div class="tab-pane fade" id="offer<?= $post->post_id ?>" role="tabpanel" aria-labelledby="offer-tab<?= $post->post_id ?>">
                        <ul class="list-group pt-2">
                            <?php $count = 0; ?>
                            <?php foreach ($post->offers as $offer) : ?>
                                <li class="list-item d-flex justify-content-between align-items-center">
                                    <a href="<?= $post->is_mine ? URLROOT . '/offers/accept/' . $offer->offer_id : '#' ?>" class="list-group-item list-group-item-action <?= $post->is_mine ? '' : 'disabled' ?> d-flex flex-column" id="offers<?= $offer->offer_id ?>">
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
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <?php if ($post->user_id != $data['login_id']) : ?>
                            <form action="<?= URLROOT ?>/offers/create_offer" method="post" class="p-2">
                                <input type="hidden" name="redirection_link" value="/">
                                <input type="hidden" name="post_num" value="<?= $post->post_id ?>">
                                <div class="input-group">
                                    <input type="number" name="offer_price" id="offer_price" min="0" class="form-control" step="0.01" aria-label="Create Offer" placeholder="$0.00">
                                    <button class="btn btn-primary" name="offer" type="submit">Offer</button>
                                </div>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            </footer>