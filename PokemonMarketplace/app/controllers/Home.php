<?php
class Home extends Controller
{
    public function __construct()
    {
        $this->user_model = $this->model('Users');
        $this->post_model = $this->model('PostModel');
        $this->save_model = $this->model('savedPostModel');
        $this->offer_model = $this->model('OfferModel');
        $this->comment_model = $this->model('commentModel');
        $this->rating_model = $this->model("ratingModel");
    }

    public function index()
    {
        if (empty($_SESSION)) {
            header('Location: ' . URLROOT . '/login');
        } else {
            $posts = $this->post_model->get_all_posts();
            $posts_with_saves = map_posts_to_users($posts, $this->save_model, $this->offer_model);
            $comments = $this->comment_model->getAllComments();
            
            

            $data = [
                'posts' => $posts_with_saves,
                'comments' => $comments,
                'login_id' => $_SESSION['user_id']
            ];

            $this->view('Home/home', $data);
        }
    }


    
    
}
