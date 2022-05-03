<?php
    class savedPostModel{

        public function __construct(){
            $this->db = new Model;
        }
        
        public function getUserSavesCount($user_id){
            $this->db->query('SELECT (COUNT(post_id)) as count  
                                FROM saves
                                WHERE user_id = :user_id');

            $this->db->bind(":user_id",$user_id);
  
            return $this->db->getSingle();
        }

        public function getUserSavedPosts($user_id){
            $this->db->query('SELECT s.post_id,  
                                p.post_title, p.post_description, p.post_price, p.created_at as post_creation, 
                                c.card_name, c.card_rarity, c.card_image, p.user_id, u.username 
                                FROM saves as s 
                                JOIN posts as p ON s.post_id = p.post_id 
                                JOIN users as u ON p.user_id = u.user_id 
                                JOIN cards as c ON p.card_id = c.card_id 
                                WHERE s.user_id = :user_id');

            $this->db->bind(":user_id",$user_id);
            

            return $this->db->getResultSet();
        }

        public function getSavedPost($user_id,$post_id){
            $this->db->query("SELECT * FROM saves WHERE user_id = :user_id AND post_id = :post_id");
            $this->db->bind(":user_id",$user_id);
            $this->db->bind(":post_id",$post_id);

            return $this->db->getSingle();
        }

        public function savePost($user_id,$post_id){
            $this->db->query("INSERT INTO saves (user_id,post_id) VALUES (:user_id,:post_id)");
            $this->db->bind(":user_id",$user_id);
            $this->db->bind(":post_id",$post_id);

            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        public function deleteSavedPost($user_id,$post_id){
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

        public function get_users_who_saved($post_id) {
            $this->db->query('SELECT * FROM saves WHERE post_id = :post_id');
            $this->db->bind('post_id', $post_id);
            return $this->db->getResultSet();
        }
    }
?>