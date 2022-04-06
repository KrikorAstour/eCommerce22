<?php

class Posts extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_user_posts($user_id)
    {
        $this->query(
            'SELECT p.post_id, post_title, post_description, price, p.created_at as post_creation, '
                . 'card_name, card_rarity, card_image, s.created_at as save_creation '
                . 'FROM posts as p JOIN cards as c ON p.card_id = c.card_id '
                . 'LEFT JOIN saves as s ON p.post_id = s.post_id '
                . 'WHERE p.user_id = :user_id'
        );
        $this->bind('user_id', $user_id);
        return $this->getResultSet();
    }

    public function get_all_posts(){
        $this->query(
            'SELECT p.post_id, post_title, post_description, price, p.created_at as post_creation, '
                . 'card_name, card_rarity, card_image, s.created_at as save_creation '
                . 'FROM posts as p JOIN cards as c ON p.card_id = c.card_id '
                . 'LEFT JOIN saves as s ON p.post_id = s.post_id '
        );
       
        return $this->getResultSet();
    }
}
