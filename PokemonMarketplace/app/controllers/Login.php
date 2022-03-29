<?php

class Login extends Controller
{
    public function __construct()
    {
        $this->user_model = $this->model('Users');
    }

    public function index()
    {
        if (!empty($_SESSION)) {
            echo '<meta http-equiv="refresh" content="0;url=' . URLROOT . '" />';
        } else if (!isset($_POST['Login'])) {
            $this->view('Login/login');
        } else {
            $result = $this->validate_creds($_POST['email'], $_POST['password']);

            if (!empty($result['error'])) {
                $this->view('Login/login', ['error' => $result['error']]);
            } else {
                $this->debug_print($this->user_model->show_users());
                $user = $this->user_model->get_user($result['email']);
                if (empty($user)) {
                    $this->view('Login/login', ['error' => ['Email Invalid!']]);
                } else {
                    if (password_verify($result['password'], $user->password)) {
                        $_SESSION['user_id'] = $user->id;
                        $_SESSION['username'] = $user->username;
                        echo '<meta http-equiv="refresh" content="0;url=' . URLROOT . '" />';
                    } else {
                        $this->view('Login/login', ['error' => ['Password Invalid!']]);
                    }
                }
            }
        }
    }

    public function logout()
    {
        session_destroy();
        echo '<meta http-equiv="refresh" content="0;url=' . URLROOT . '/login" />';
    }

    private function validate_email($email)
    {
        if (isset($email)) {
            $email = trim($email);
            $sanitized_email = filter_var($email, FILTER_SANITIZE_EMAIL);
            $validated_email = filter_var($sanitized_email, FILTER_VALIDATE_EMAIL);

            return $validated_email;
        }

        return false;
    }

    private function validate_password($password)
    {
        if (isset($password)) {
            return $password >= 8 ? $password : false;
        }

        return false;
    }

    private function validate_verify_password($password, $verify_password)
    {
        return strcmp($password, $verify_password) == 0 ? $verify_password : false;
    }

    private function validate_creds($email, $password, $verify_password = null)
    {
        $data = [];
        $data['email'] = $this->validate_email($email);
        $data['password'] = $this->validate_password($password);
        $data['verify_password'] = $verify_password != null ? $this->validate_verify_password($password, $verify_password) : true;
        $data['error'] = [];

        if (!$data['email']) {
            $data['error'][] = 'Email Invalid!';
        }
        if (!$data['password']) {
            $data['error'][] = 'Password Invalid!';
        }
        if (!$data['verify_password']) {
            $data['error'][] = 'Verify Password Invalid!';
        }

        return $data;
    }
}
