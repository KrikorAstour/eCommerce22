<?php

class Offers extends Controller
{
    public function __construct()
    {
        $this->offer_model = $this->model('OfferModel');
        $this->user_model = $this->model('Users');
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

    public function delete_offer($offer_id)
    {
    }

    public function accept($offer_id)
    {

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
