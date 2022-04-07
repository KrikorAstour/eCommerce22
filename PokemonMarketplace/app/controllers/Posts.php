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

    public function save($post_id){
        if (empty($_SESSION)) {
            header('Location: ' . URLROOT);
        } else {
            $save = $this->save_model->getSavedPost($_SESSION['user_id'],$post_id);

            if($save==null){
                $posts = $this->post_model->get_user_posts($_SESSION['user_id']);
                $this->save_model->savePost($_SESSION['user_id'],$post_id);
    
                $data = [
                    'posts' => $posts,
                    'username' => $this->extract_username_from_email($_SESSION['username']),
                    'is_mine' => true,
                ];
    
                $this->view('Home/home', $data);
            }
            else{
                $posts = $this->post_model->get_user_posts($_SESSION['user_id']);
                $this->save_model->deleteSavedPost($_SESSION['user_id'],$post_id);
    
                $data = [
                    'posts' => $posts,
                    'username' => $this->extract_username_from_email($_SESSION['username']),
                    'is_mine' => true,
                ];
    
                $this->view('Home/home', $data);
            }
        }
    }

    private function extract_username_from_email($email)
    {
        $parts = explode('@', $email);
        return $parts[0];
    }
}
