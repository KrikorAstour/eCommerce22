<?php
class Saves extends Controller
{
    public function __construct()
    {
        $this->user_model = $this->model('Users');
        $this->post_model = $this->model('PostModel');
        $this->save_model = $this->model('savedPostModel');
        $this->offer_model = $this->model('OfferModel');
        $this->comment_model = $this->model('commentModel');
    }

    public function index()
    {
        if (empty($_SESSION)) {
            header('Location: ' . URLROOT . '/login');
        } else {
            $count = $this->save_model->getUserSavesCount($_SESSION['user_id']);
            $posts = $this->save_model->getUserSavedPosts($_SESSION['user_id']);
            $posts_with_saves = map_posts_to_users($posts, $this->save_model, $this->offer_model);
            $comments = $this->comment_model->getAllComments();


            $data = [
                'total' =>  $count,
                'posts' => $posts_with_saves,
                'comments' => $comments,
                'login_id' => $_SESSION['user_id']
            ];

            $this->view('Saves/saves', $data);
        }
    }


    
    
}
