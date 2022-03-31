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
}
