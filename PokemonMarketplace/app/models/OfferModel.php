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
}
