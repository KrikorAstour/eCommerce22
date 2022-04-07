<?php

class Profile extends Controller
{
    public function __construct()
    {
        $this->user_model = $this->model('Users');
        $this->post_model = $this->model('PostModel');
        $this->save_model = $this->model('savedPostModel');
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
                $posts_with_saves = map_posts_to_users($posts, $this->save_model);

                $data = [
                    'posts' => $posts_with_saves,
                    'username' => extract_username_from_email($user->username),
                    'is_mine' => $_SESSION['user_id'] == $user_id
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
            $posts_with_saves = map_posts_to_users($posts, $this->save_model);

            $data = [
                'posts' => $posts_with_saves,
                'username' => extract_username_from_email($_SESSION['username']),
                'is_mine' => true
            ];

            $this->view('Profile/profile', $data);
        }
    }
}
