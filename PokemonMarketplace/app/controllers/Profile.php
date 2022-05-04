<?php

class Profile extends Controller
{
    public function __construct()
    {
        $this->user_model = $this->model('Users');
        $this->post_model = $this->model('PostModel');
        $this->save_model = $this->model('savedPostModel');
        $this->offer_model = $this->model('OfferModel');
        $this->comment_model = $this->model("commentModel");
    }

    public function index($user_id)
    {
        if (empty($_SESSION)) {
            header('Location: ' . URLROOT);
        } else {
            $user = $this->user_model->get_user_by_id($user_id);
            if (empty($user)) {
                header('Location: ' . URLROOT);
            } else {
                $posts = $this->post_model->get_user_posts($user_id);
                $posts_with_saves = map_posts_to_users($posts, $this->save_model, $this->offer_model);
                $comments = $this->comment_model->getAllComments();

                $data = [
                    'posts' => $posts_with_saves,
                    'username' => extract_username_from_email($user->username),
                    'user_id' => $user->user_id,
                    'is_mine' => $_SESSION['user_id'] == $user_id,
                    'comments' => $comments
                ];

                $this->view('Profile/profile', $data);
            }
        }
    }

    public function my_profile()
    {
        if (empty($_SESSION)) {
            header('Location: ' . URLROOT);
        } else {
            $posts = $this->post_model->get_user_posts($_SESSION['user_id']);
            $posts_with_saves = map_posts_to_users($posts, $this->save_model, $this->offer_model);
            $comments = $this->comment_model->getAllComments();

            $data = [
                'posts' => $posts_with_saves,
                'username' => extract_username_from_email($_SESSION['username']),
                'user_id' => $_SESSION['user_id'],
                'is_mine' => true,
                'comments' => $comments
            ];

            $this->view('Profile/profile', $data);
        }
    }
}
