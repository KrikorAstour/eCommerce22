<?php
class Deposit extends Controller
{
    public function __construct()
    {
        $this->user_model = $this->model('Users');
    }

    public function index()
    {
        if (empty($_SESSION)) {
            header('Location: ' . URLROOT . '/login');
        } else {
            $user = $this->user_model->get_user_by_id($_SESSION['user_id']);

            $data = [
                'user' => $user,
                'username' => $this->extract_username_from_email($user->username),
                'is_mine' => $user->user_id == $_SESSION['user_id']
            ];

            $this->view('Deposit/deposit',$data);
        }
    }

    public function add(){
        if (empty($_SESSION)) {
            header('Location: ' . URLROOT . '/login');
        } else {

            $user = $this->user_model->get_user_by_id($_SESSION['user_id']);

                $data =[
                    'user' => $user,
                    'username' => $this->extract_username_from_email($user->username),
                    'is_mine' => $user->user_id == $_SESSION['user_id'],
                    'amount' => '',
                    'success' => '',
                    'error' => ''
                ];
            if(!isset($_POST['Add'])){
                
                $this->view('Deposit/add',$data);
            }
            else{
                $data['amount'] = $_POST['amount'];

                if($this->valid_amount($data)){
                    $this->user_model->add_balance($user->user_id,$data['amount']);
                    $data['user']->cash_balance+=$data['amount'];
                    $data['success'] = '$' . number_format($data['amount'], 2, '.', '') . ' has been successfully deposited!';
                    $this->view('Deposit/deposit',$data);
                }
            }
        }
    }

    public function valid_amount($data){
        if($data['amount'] < 0){
            $data['error'] = 'Please enter a valid number.';
            $this->view('Deposit/add',$data);
            return false;
        }
        if(empty($data['amount'])){
            $data['error'] = 'Please enter a valid number.';
            $this->view('Deposit/add',$data);
            return false;
        }
        return true;
    }


    private function extract_username_from_email($email)
    {
        $parts = explode('@', $email);
        return $parts[0];
    }
}