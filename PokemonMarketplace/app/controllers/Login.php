<?php

require_once __DIR__ . '/../../vendor/sonata-project/google-authenticator/src/FixedBitNotation.php';
require_once __DIR__ . '/../../vendor/sonata-project/google-authenticator/src/GoogleAuthenticatorInterface.php';
require_once __DIR__ . '/../../vendor/sonata-project/google-authenticator/src/GoogleAuthenticator.php';
require_once __DIR__ . '/../../vendor/sonata-project/google-authenticator/src/GoogleQrUrl.php';

class Login extends Controller
{
    public function __construct()
    {
        $this->user_model = $this->model('Users');
        $this->ga = new \Sonata\GoogleAuthenticator\GoogleAuthenticator();
    }

    public function index()
    {
        if (!empty($_SESSION)) {
            header('Location: ' . URLROOT);
        } else if (!isset($_POST['Login'])) {
            $this->view('Login/login');
        } else {
            $result = $this->validate_creds($_POST['email'], $_POST['password'], null, $_POST['two_fa']);

            if (!empty($result['error'])) {
                $this->view('Login/login', ['error' => $result['error']]);
            } else {
                $user = $this->user_model->get_user($result['email']);
                $data = [];

                if (empty($user)) {
                    $data['error'] = ['Email Invalid'];
                } else  if (!password_verify($result['password'], $user->password)) {
                    $data['error'] = ['Password Invalid'];
                } else if (!$this->ga->checkCode($user->secret_2fa, $result['two_fa'])) {
                    $data['error'] = ['2FA Token Invalid'];
                } else {
                    $_SESSION['user_id'] = $user->id;
                    $_SESSION['username'] = $user->username;
                    header('Location: ' . URLROOT);
                    return;
                }

                $this->view('Login/login', $data);
            }
        }
    }

    public function signup()
    {
        if (!empty($_SESSION)) {
            header('Location: ' . URLROOT);
        } else if (!isset($_POST['Signup'])) {
            $this->view('Login/signup');
        } else {
            $result = $this->validate_creds($_POST['email'], $_POST['password'], $_POST['verify_password']);

            if (!empty($result['error'])) {
                $this->view('Login/signup', ['error' => $result['error']]);
            } else {
                $user = $this->user_model->get_user($result['email']);
                if (!empty($user)) {
                    $this->view('Login/signup', ['error' => ['Email Invalid!']]);
                } else {
                    $hashed_pass = password_hash($result['password'], PASSWORD_DEFAULT);
                    $two_fa_secret = $this->ga->generateSecret();
                    $is_succ = $this->user_model->create_user($result['email'], $hashed_pass, $two_fa_secret);

                    if ($is_succ) {
                        $generated_qr = \Sonata\GoogleAuthenticator\GoogleQrUrl::generate($result['email'], $two_fa_secret, 'Pokemon Marketplace');
                        $this->view('Login/qrcode', ['qr_link' => $generated_qr]);
                    } else {
                        $this->view('Login/signup', ['error' => ['Something Broke!']]);
                    }
                }
            }
        }
    }

    public function logout()
    {
        session_destroy();
        header('Location: ' . URLROOT . '/login');
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
            return strlen($password) >= 8 ? $password : false;
        }

        return false;
    }

    private function validate_verify_password($password, $verify_password)
    {
        return strcmp($password, $verify_password) == 0 ? $verify_password : false;
    }

    private function validate_two_fa($two_fa)
    {
        $num_two_fa = (int) $two_fa;
        return strlen((string) $num_two_fa) == 6 && $num_two_fa > 0 ? (string) $num_two_fa : false;
    }

    private function validate_creds($email, $password, $verify_password = null, $two_fa = null)
    {
        $data = [];
        $data['email'] = $this->validate_email($email);
        $data['password'] = $this->validate_password($password);
        $data['verify_password'] = $verify_password != null ? $this->validate_verify_password($password, $verify_password) : true;
        $data['two_fa'] = $two_fa != null ? $this->validate_two_fa($two_fa) : true;
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
        if (!$data['two_fa']) {
            $data['error'][] = '2FA Token Invalid!';
        }

        return $data;
    }
}
