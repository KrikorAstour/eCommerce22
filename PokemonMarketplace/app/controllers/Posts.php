<?php
class Posts extends Controller
{
    public function __construct()
    {
        $this->user_model = $this->model('Users');
        $this->post_model = $this->model('PostModel');
        $this->save_model = $this->model('savedPostModel');
    }

    public function index()
    {
        if (empty($_SESSION)) {
            header('Location: ' . URLROOT . '/login');
        } else {

            // to be done
        }
    }

    public function save_from_profile($post_id, $profile_id)
    {
        if (empty($_SESSION)) {
            header('Location: ' . URLROOT);
        } else {
            $this->save($post_id);
            header('Location: ' . URLROOT . '/profile/' . $profile_id);
        }
    }

    public function save_from_home($post_id)
    {
        if (!empty($_SESSION)) {
            $this->save($post_id);
        }
        header('Location: ' . URLROOT);
    }

    private function save($post_id)
    {
        $save = $this->save_model->getSavedPost($_SESSION['user_id'], $post_id);

        return $save == null ?
            $this->save_model->savePost($_SESSION['user_id'], $post_id)
            : $this->save_model->deleteSavedPost($_SESSION['user_id'], $post_id);
    }
}
