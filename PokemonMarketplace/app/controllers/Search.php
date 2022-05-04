<?php
    class Search extends Controller{
        public function __construct(){
            $this->searchModel = $this->model('searchModel');
            $this->postModel = $this->model('PostModel');
            $this->user_model = $this->model('Users');
        $this->save_model = $this->model('savedPostModel');
        $this->offer_model = $this->model('OfferModel');
        $this->comment_model = $this->model('commentModel');
        }

        public function index(){

        }

        public function getResult(){
          

            if(isset($_POST['search']) && $_POST['search_type'] == "newFirst"){
                var_dump($_POST['rarity']);
                $data = $_POST['search_text'];
                $rarity = $_POST['rarity'];
                $isSucc = $this->searchModel->getNewest($data, $rarity);
                $posts_with_saves = map_posts_to_users($isSucc, $this->save_model, $this->offer_model);
                $comments = $this->comment_model->getAllComments();


            $data = [
                'posts' => $posts_with_saves,
                'comments' => $comments,
                'login_id' => $_SESSION['user_id']
            ];
                var_dump($isSucc);
                $this->view('Search/search', $data);
            }
            else if(isset($_POST['search']) && $_POST['search_type'] == "oldFirst"){
                $data = $_POST['search_text'];
                $rarity = $_POST['rarity'];
                $isSucc = $this->searchModel->getOldest($data, $rarity);
                $this->view('Search/search', $isSucc);
            }
            else if(isset($_POST['search']) && $_POST['search_type'] == "highFirst"){
                $data = $_POST['search_text'];
                $rarity = $_POST['rarity'];
                $isSucc = $this->searchModel->getHigherPrice($data, $rarity);
                $this->view('Search/search', $isSucc);
            }
            else if(isset($_POST['search']) && $_POST['search_type'] == "lowFirst"){
                $data = $_POST['search_text'];
                $rarity = $_POST['rarity'];
                $isSucc = $this->searchModel->getlowerPrice($data, $rarity);
                $this->view('Search/search', $isSucc);
            }
        }
    }

?>
