<?php

class Transactions extends Controller
{
    public function __construct()
    {
        $this->transaction_model = $this->model('TransactionModel');
    }

    public function index()
    {
        if (empty($_SESSION)) {
            header('Location: ' . URLROOT);
        } else {
            $purchases = $this->transaction_model->get_purchases($_SESSION['user_id']);
            $sales = $this->transaction_model->get_sales($_SESSION['user_id']);

            $this->view('Transaction/transactions', [
                'purchases' => $purchases,
                'sales' => $sales
            ]);
        }
    }
}
