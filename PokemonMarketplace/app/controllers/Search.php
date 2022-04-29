<?php
    class Search extends Controller{
        public function __construct(){
            $this->searchModel = $this->model('searchModel');
        }

        public function index(){

        }

        public function getResult(){
            

            if(isset($_POST['search']) && $_POST['search_type'] == "newFirst"){
                $data = $_POST['search_text'];
                $rarity = $_POST['rarity'];
                $isSucc = $this->searchModel->getNewest($data);
                $this->view('Search/search', $isSucc);
            }
            else if(isset($_POST['search']) && $_POST['search_type'] == "oldFirst"){
                $data = $_POST['search_text'];
                $rarity = $_POST['rarity'];
                $isSucc = $this->searchModel->getOldest($data);
                $this->view('Search/search', $isSucc);
            }
            else if(isset($_POST['search']) && $_POST['search_type'] == "highFirst"){
                $data = $_POST['search_text'];
                $rarity = $_POST['rarity'];
                $isSucc = $this->searchModel->getHigherPrice($data);
                $this->view('Search/search', $isSucc);
            }
            else if(isset($_POST['search']) && $_POST['search_type'] == "lowFirst"){
                $data = $_POST['search_text'];
                $rarity = $_POST['rarity'];
                $isSucc = $this->searchModel->getlowerPrice($data);
                $this->view('Search/search', $isSucc);
            }
        }
    }

?>