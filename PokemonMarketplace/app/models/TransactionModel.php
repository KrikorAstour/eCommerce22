<?php

class TransactionModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_purchases($user_id)
    {
        $this->query('SELECT pr.post_id, purchase_price, card_name, card_rarity, pr.created_at '
            . 'FROM purchases as pr JOIN posts as p ON pr.post_id = p.post_id '
            . 'JOIN cards as c ON p.card_id = c.card_id '
            . 'WHERE pr.user_id = :user_id');
        $this->bind('user_id', $user_id);
        return $this->getResultSet();
    }

    public function get_sales($user_id)
    {
        $this->query('SELECT s.post_id, sale_price, card_name, card_rarity, s.created_at '
            . 'FROM sales as s JOIN posts as p ON s.post_id = p.post_id '
            . 'JOIN cards as c ON p.card_id = c.card_id '
            . 'WHERE s.user_id = :user_id');
        $this->bind('user_id', $user_id);
        return $this->getResultSet();
    }

    public function accept_offer($data)
    {
        $this->start_transaction();
        $is_purchase_succ = $this->purchase($data);
        $is_sale_succ = $this->sell($data);
        return $this->end_transaction($is_purchase_succ && $is_sale_succ);
    }

    public function purchase($data)
    {
        $this->query('INSERT INTO purchases (post_id, user_id, purchase_price, created_at, `updated-at`) VALUES (:post_id, :user_id, :price, now(), now())');
        $this->bind('post_id', $data['post_id']);
        $this->bind('user_id', $data['buyer_id']);
        $this->bind('price', $data['price']);
        return $this->execute();
    }

    public function sell($data)
    {
        $this->query('INSERT INTO sales (post_id, user_id, sale_price) VALUES (:post_id, :user_id, :price)');
        $this->bind('post_id', $data['post_id']);
        $this->bind('user_id', $data['seller_id']);
        $this->bind('price', $data['price']);
        return $this->execute();
    }
}
