<?php

class Offers extends Controller
{
    public function __construct()
    {
        $this->offer_model = $this->model('OfferModel');
        $this->user_model = $this->model('Users');
        $this->post_model = $this->model('PostModel');
        $this->transaction_model = $this->model('TransactionModel');
    }

    public function index()
    {
        header("Location: " . URLROOT);
    }

    public function create_offer()
    {
        if (empty($_SESSION) || !isset($_POST['offer'])) {
            header('Location: ' . URLROOT);
        } else {
            $data = $this->validate_offer($_POST);
            $this->debug_print($data);
            $this->debug_print($_POST);

            if (empty($data['error'])) {
                $user_balance = $this->user_model->get_user_by_id($_SESSION['user_id'])->cash_balance;
                $total_offers = $this->offer_model->get_total_user_offers($_SESSION['user_id'])->total_offer;

                if ($total_offers + $data['offer_price'] <= $user_balance) {
                    $data['user_id'] = $_SESSION['user_id'];
                    $data['post_id'] = $_POST['post_num'];
                    $this->offer_model->create($data);
                }
            }
            header('Location: ' . URLROOT . $data['redirection_link'] . '#post_num_' . $data['post_num']);
        }
    }

    public function delete_offer($offer_id, $post_id)
    {
        if (empty($_SESSION)) {
            header('Location: ' . URLROOT);
        } else {
            $this->offer_model->delete(['offer_id' => $offer_id]);
            header('Location: ' . URLROOT . '#post_num_' . $post_id);
        }
    }

    public function accept($offer_id)
    {
        if (empty($_SESSION)) {
            header('Location: ' . URLROOT);
        } else {
            $int_offer_id = intval($offer_id);
            $offer = $this->offer_model->get_single_offer(['offer_id' => $int_offer_id]);
            $post = $this->post_model->get_post_user($offer->post_id);

            $isSuccPurchase = $this->user_model->purchase($offer->user_id, $offer->offer_price);
            if ($isSuccPurchase) {
                $isSuccToggle = $this->post_model->toggle_is_offered($offer->post_id, false);
                if ($isSuccToggle) {
                    $data = [
                        'buyer_id' => $offer->user_id,
                        'seller_id' => $post->user_id,
                        'price' => doubleval($offer->offer_price),
                        'post_id' => $offer->post_id
                    ];
                    $isSuccOffer = $this->transaction_model->accept_offer($data);

                    if ($isSuccOffer) {
                        $isSucc = $this->offer_model->delete_all_post_offers($offer->post_id);
                    }
                }
            }

            header('Location: ' . URLROOT);
        }
    }

    private function validate_offer_price($offer_price)
    {
        $offer = 0.0;
        if ($offer_price != null) {
            $offer = doubleval($offer_price);
        }
        return $offer > 0 ? $offer_price : false;
    }

    private function validate_offer($raw_data)
    {
        $data = ['error' => []];
        $data['redirection_link'] = isset($raw_data['route']) ? $raw_data : '/';
        $data['offer_price'] = $this->validate_offer_price($raw_data['offer_price']);
        $data['post_num'] = $raw_data['post_num'];

        if (!$data['offer_price']) {
            $data['error'][] = 'Offer price must be a positive real number!';
        }

        return $data;
    }
}
