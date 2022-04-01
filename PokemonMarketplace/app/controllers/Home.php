<?php
class Home extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        if (empty($_SESSION)) {
            header('Location: ' . URLROOT . '/login');
        } else {
            $this->view('Home/home');
        }
    }
}
