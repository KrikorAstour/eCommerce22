<?php

class OfferModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_offers_by_post_id($post_id)
    {
        $this->query(
            'SELECT offer_id, o.user_id, post_id, offer_price, o.created_at, username '
                . 'FROM offers as o JOIN users as u ON o.user_id = u.user_id '
                . 'WHERE post_id = :post_id '
                . 'ORDER BY offer_price DESC'
        );
        $this->bind('post_id', $post_id);
        return $this->getResultSet();
    }

    public function get_total_user_offers($user_id)
    {
        $this->query('SELECT COALESCE(SUM(offer_price), 0.0) as total_offer FROM offers WHERE user_id = :user_id');
        $this->bind('user_id', $user_id);
        return $this->getSingle();
    }

    public function create($data)
    {
        $this->query('INSERT INTO offers (user_id, post_id, offer_price) VALUES (:user_id, :post_id, :offer_price)');
        $this->bind('user_id', $data['user_id']);
        $this->bind('post_id', $data['post_id']);
        $this->bind('offer_price', $data['offer_price']);
        return $this->execute();
    }
}
