<?php

session_start();

function isLoggedIn()
{
  if (isset($_SESSION['user_id'])) {
    return true;
  } else {
    return false;
  }
}

function extract_username_from_email($email)
{
  $parts = explode('@', $email);
  return $parts[0];
}

function map_posts_to_users($posts, $save_model, $offer_model)
{
  foreach ($posts as $post) {
    $post_saves = $save_model->get_users_who_saved($post->post_id);
    $saves = array_map(fn ($saves) => $saves->user_id, $post_saves);
    $post->is_saved_by_me = in_array($_SESSION['user_id'], $saves);
    $post->is_mine = $_SESSION['user_id'] == $post->user_id;
    $post->offers = $offer_model->get_offers_by_post_id($post->post_id);
  }

  return $posts;
}
