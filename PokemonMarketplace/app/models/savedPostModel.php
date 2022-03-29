<?php
    class savedPostModel{

        public function __construct(){
            $this->db = new Model;
        }


        public function savePost($user_id,$post_id){
            $this->db->query("INSERT INTO Saves (user_id,post_id) VALUES (:user_id,:post_id");
            $this->db->bind(":user_id",$user_id);
            $this->db->bind(":post_id",$post_id);

            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        public function deletePost($user_id,$post_id){
            $this->db->query("DELETE FROM Saves WHERE user_id = :user_id AND post_id = :post_id");
            $this->db->bind(":user_id",$user_id);
            $this->db->bind(":post_id",$post_id);

            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }
    }
?>