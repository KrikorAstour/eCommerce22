<?php

class Users extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_user($email)
    {
        $this->query('SELECT * FROM users WHERE username = :email');
        $this->bind('email', $email);
        return $this->getSingle();
    }

    public function create_user($email, $password, $secret_2fa)
    {
        $this->query('INSERT INTO users (username, password, secret_2fa) VALUES (:email, :password, :secret_2fa)');
        $this->bind('email', $email);
        $this->bind('password', $password);
        $this->bind('secret_2fa', $secret_2fa);
        return $this->execute();
    }

    public function get_user_by_id($user_id)
    {
        $this->query('SELECT * FROM users WHERE user_id = :user_id');
        $this->bind('user_id', $user_id);
        return $this->getSingle();
    }

    public function add_balance($user_id,$deposit){
        $this->query('UPDATE users SET cash_balance = cash_balance + :deposit WHERE user_id = :user_id');
        $this->bind(':user_id',$user_id);
        $this->bind(':deposit',$deposit);
        return $this->execute();
    }
}
