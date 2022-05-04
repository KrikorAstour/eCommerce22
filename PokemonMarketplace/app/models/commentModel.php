<?php
    class commentModel extends Model{

        public function __construct(){
            parent::__construct();
        }
        
        public function getAllComments(){
            $this->query("SELECT c.comment_id, c.comment, c.updated_at,
                                 u.username, u.user_id, p.post_id
                          FROM comments AS c
                          JOIN users AS u ON c.user_id = u.user_id 
                          JOIN posts AS p ON c.post_id = p.post_id ");


            return $this->getResultSet();
        }


        public function getPostComments($post_id){
            $this->query("SELECT c.comment, c.updated_at,
                                 u.username 
                          FROM comments AS c
                          JOIN users AS u ON c.user_id = u.user_id 
                          WHERE c.post_id = :post_id");

            $this->bind(":post_id",$post_id);

            return $this->getResultSet();
        }

        public function createComment($post_id,$user_id,$comment){
            $this->query("INSERT INTO comments (post_id,user_id,comment) 
                          VALUES (:post_id,:user_id,:comment)");

            $this->bind(":post_id",$post_id);
            $this->bind(":user_id",$user_id);
            $this->bind(":comment",$comment);

            if($this->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        public function editComment($post_id,$user_id,$comment){
            $this->query("UPDATE comments 
                          SET comment = :comment
                          WHERE post_id = :post_id AND user_id = :user_id");

            $this->bind(":post_id",$post_id);
            $this->bind(":user_id",$user_id);
            $this->bind(":comment",$comment);

            if($this->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        public function deleteComment($comment_id){
            $this->query("DELETE FROM comments 
                          WHERE comment_id = :comment_id ");

            $this->bind(":comment_id",$comment_id);
            
            if($this->execute()){
                return true;
            }
            else{
                return false;
            }


        }
    }
?>