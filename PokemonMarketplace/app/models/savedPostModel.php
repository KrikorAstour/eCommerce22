<?php
    class savedPostModel{

        public function __construct(){
            $this->db = new Model;
        }

        public function getUserSavedPosts($user_id){
            $this->db->query(
                'SELECT p.post_id, post_title, post_description, price, p.created_at as post_creation, '
                    . 'card_name, card_rarity, card_image, p.user_id, u.username '
                    . 'FROM posts as p '
                    . 'JOIN cards as c ON p.card_id = c.card_id '
                    . 'JOIN users as u ON p.user_id = u.user_id '
                    . 'JOIN saves as s ON p.user_id = s.user_id '
                    . 'WHERE s.user_id = :user_id '
            );
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