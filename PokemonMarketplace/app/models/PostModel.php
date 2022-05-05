<?php

class PostModel extends Model
{
    public function __construct()
    {
        $this->db = new Model;
        parent::__construct();
    }

    public function createPost($data, $user_id, $card_id){
        $this->query('INSERT INTO posts (user_id, card_id, post_title, post_description, post_price, isOffered) 
                        VALUES (:user_id, :card_id, :post_title, :post_description, :post_price, :isOffered)'
                    );
                         
        $this->bind('user_id', $user_id);
        $this->bind('card_id', $card_id);     
        $this->bind('post_title', $data['post_title']);
        $this->bind('post_description', $data['post_description']);
        $this->bind('post_price', $data['post_price']);
        $this->bind('isOffered', $data['isoffered']);
        
            
        return $this->execute();
    }
    
    public function getCardId($card_image){
        $this->query('SELECT card_id FROM cards WHERE card_image=:card_image');
        $this->bind('card_image', $card_image);
        
        return $this->getSingle();
    }

    public function createCard($data){
        $this->query('INSERT INTO cards (card_name, card_rarity, card_image) 
        VALUES (:card_name, :card_rarity, :card_image)'
    );

        $this->bind('card_name', $data['card_name']);
        $this->bind('card_rarity', $data['card_rarity']);
        $this->bind('card_image', $data['card_image']);
        
        return $this->execute();
    }

    public function deletePost($post_id){
        $this->query('DELETE FROM posts WHERE post_id = :post_id');
        $this->bind('post_id', $post_id);
        return $this->execute();
    }
    
    public function updatePost($data, $post_id){
        $this->query('UPDATE posts SET post_title=:post_title, post_description=:post_description post_price=:post_price isOffered=:isoffered Where post_id=:post_id');
        $this->bind('post_title', $data['post_title']);
        $this->bind('post_description', $data['post_text']);
        $this->bind('post_price', $data['post_price']);
        $this->bind('isoffered', $data['isoffered']);
        $this->bind('post_id', $post_id);
        
        return $this->execute();
    }
    
    public function get_user_posts($user_id)
    {
        $this->query(
            'SELECT p.post_id, post_title, post_description, post_price, p.created_at as post_creation, '
                . 'card_name, card_rarity, card_image, p.user_id, u.username, isOffered '
                . 'FROM posts as p JOIN cards as c ON p.card_id = c.card_id '
                . 'JOIN users as u ON p.user_id = u.user_id '
                . 'WHERE p.user_id = :user_id'
        );
        $this->bind('user_id', $user_id);
        return $this->getResultSet();
    }
    
    public function getPost($post_id){
        $this->query('SELECT card_id, post_title, post_description, post_price From posts WHERE post_id=:post_id');
        $this->bind('post_id', $post_id);
        return $this->execute();
    }

    public function get_all_posts()
    {
        $this->query(
            'SELECT p.post_id, post_title, post_description, post_price, p.created_at as post_creation, '
                . 'card_name, card_rarity, card_image, p.user_id, u.username, isOffered '
                . 'FROM posts as p JOIN cards as c ON p.card_id = c.card_id '
                . 'JOIN users as u ON p.user_id = u.user_id'
        );
        return $this->getResultSet();
    }

    public function toggle_is_offered($post_id, $is_offered)
    {
        $this->query('UPDATE posts SET isOffered = :is_offered WHERE post_id = :post_id');
        $this->bind('post_id', $post_id);
        $this->bind('is_offered', $is_offered);
        return $this->execute();
    }

    public function get_post_user($post_id)
    {
        $this->query('SELECT user_id FROM posts WHERE post_id = :post_id');
        $this->bind('post_id', $post_id);
        return $this->getSingle();
    }
}
