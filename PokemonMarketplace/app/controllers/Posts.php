<?php
class Posts extends Controller
{
    public function __construct()
    {
        $this->user_model = $this->model('Users');
        $this->post_model = $this->model('PostModel');
        $this->save_model = $this->model('savedPostModel');
        $this->comment_model = $this->model("commentModel");
        $this->rating_model = $this->model("ratingModel");
    }

    public function index()
    {
        if (empty($_SESSION)) {
            header('Location: ' . URLROOT . '/login');
        } else {

            // to be done
        }
    }
    
    public function createCard(){
            if(!isset($_POST['next'])){
               $this->view('Post/createCard');
            }
            else{
                $data = [
                    'card_name' => $_POST['card_name'],
                    'card_rarity' => $_POST['card_rarity'],
                    'card_image' => $_POST['card_image'],
                    'post_title' => $_POST['post_title'],
                    'post_price' => $_POST['post_price'],
                    'post_description' => $_POST['post_description'],
                    'isoffered' => ''
                ];
                if(isset($_POST['isoffered'])){
                    $data['isoffered'] = 1;
                }else{
                    $data['isoffered'] = 0;
                }

                $isSucc = $this->post_model->createCard($data);
                $card_id = $this->post_model->getCardId($data['card_image']);
                
                $isSucc2 = $this->post_model->createPost($data, $_SESSION['user_id'], $card_id->card_id);
                if($isSucc2){
                    echo 'Uploading the Post!';
                   echo '<meta http-equiv="Refresh" content="2; url=/eCommerce22/PokemonMarketplace/Profile/my_profile">';
                }
        }
    }
    
    public function deletePost($postId)
    {
        $userId = $_SESSION['user_id'];
        $isSucc = $this->post_model->deletePost($postId);
        
        if ($isSucc) {
            echo '<h5 class="text-danger">Deleting The Post!</h5>';
            echo '<meta http-equiv="Refresh" content="2; url=/eCommerce22/PokemonMarketplace/Profile/my_profile">';
                } else {
            echo '<h1 class="text-danger">Internal Server Error: Something Broke!</h1>';
            echo '<meta http-equiv="Refresh" content="2; url=/eCommerce22/PokemonMarketplace/Profile/my_profile">';
                }
        
    }
    
    public function updatePost($post_Id){
        $this->view('Post/updatePost');
        $post = $this->post_model->getPost($post_Id);
        $data = [
            "post" => $post
        ];

        if(!isset($_POST['confirm'])){
            $this->view('post/updatePost',$data);
        }
        else{
            
            $data = [
                    
                'post_title' => $_POST['post_title'],
                'post_text' => $_POST['post_text'],
                'post_price' => $_POST['post_price'],
                'isoffered' => ''
                
            ];

            if(isset($_POST['isoffered'])){
                $data['isoffered'] = 1;
            }
            else{
                $data['isoffered'] = 0;
            }
            if($this->post_model->updatePost($data, $post_Id)){
                    echo 'Updating your post!';
                    echo '<meta http-equiv="refresh" content="0;url=' . URLROOT . '/profile/my-proffile' . $userId . '" />';
                }
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

    public function unsave_from_saves($post_id){
        if (!empty($_SESSION)) {
            $this->save($post_id);
        }
        header('Location: ' . URLROOT . '/saves');
    }

    private function save($post_id)
    {
        $save = $this->save_model->getSavedPost($_SESSION['user_id'], $post_id);

        return $save == null ?
            $this->save_model->savePost($_SESSION['user_id'], $post_id)
            : $this->save_model->deleteSavedPost($_SESSION['user_id'], $post_id);
    }

    public function addComment($post_id){
        if (empty($_SESSION)) {
            header('Location: ' . URLROOT . '/login');
        } else {

            if(!isset($_POST['comment'])){
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
            else{
                $data = [
                    'comment' => $_POST['comment_text']
                ];

                if($this->comment_model->createComment($post_id,$_SESSION['user_id'],$data['comment'])){
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                }
                
            }
            
        }
    }


    public function deleteComment($user_id,$comment_id){
        if (empty($_SESSION)) {
            header('Location: ' . URLROOT . '/login');
        } else {

            if ($_SESSION['user_id'] == $user_id){
                if($this->comment_model->deleteComment($comment_id)){
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                }
            }

            
        }
    }

    public function giveRating($user_id,$rated_by){
        if (empty($_SESSION)) {
            header('Location: ' . URLROOT . '/login');
        } else {

            if($_POST['rating']!="0"){
                if ($_SESSION['user_id'] != $user_id){
                    $rating = $this->rating_model->getOneUserRating($user_id,$rated_by);
    
                    if($rating==null){
                        if($this->rating_model->giveRating($user_id,$rated_by,$_POST['rating'])){
                            header('Location: ' . $_SERVER['HTTP_REFERER']);
                        }
                    }
                    else{
                        if($this->rating_model->updateRating($rating->rating_id,$_POST['rating'])){
                            header('Location: ' . $_SERVER['HTTP_REFERER']);
                        }
                    }
                }
            }

            
            
        }
    }
}
