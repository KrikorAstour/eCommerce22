<?php

class Profile extends Controller
{
    public function __construct()
    {
        $this->user_model = $this->model('Users');
        $this->post_model = $this->model('Posts');
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
                $posts = $this->post_model->get_all_posts($user_id);

                $data = [
                    'posts' => $posts,
                    'username' => $this->extract_username_from_email($user->username),
                    'is_mine' => $user->user_id == $_SESSION['user_id']
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
            $posts = $this->post_model->get_all_posts($_SESSION['user_id']);

            $data = [
                'posts' => $posts,
                'username' => $this->extract_username_from_email($_SESSION['username']),
                'is_mine' => true
            ];

            $this->view('Profile/profile', $data);
        }
    }

    private function extract_username_from_email($email)
    {
        $parts = explode('@', $email);
        return $parts[0];
    }
}
