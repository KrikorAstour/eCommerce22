<?php
class Home extends Controller
{
    public function __construct()
    {
        $this->user_model = $this->model('Users');
        $this->post_model = $this->model('Posts');
        $this->save_model = $this->model('savedPostModel');
    }

    public function index()
    {
        if (empty($_SESSION)) {
            header('Location: ' . URLROOT . '/login');
        } else {

            $posts = $this->post_model->get_all_posts();

            $data = [
                'posts' => $posts,
                'username' => $this->extract_username_from_email($_SESSION['username']),
                'is_mine' => true
            ];
            $this->view('Home/home',$data);
        }
    }

    private function extract_username_from_email($email)
    {
        $parts = explode('@', $email);
        return $parts[0];
    }
}
