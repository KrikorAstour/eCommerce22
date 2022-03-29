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

    public function create_user($email, $password)
    {
        $this->query('INSERT INTO users (username, password) VALUES (:email, :password)');
        $this->bind('email', $email);
        $this->bind('password', $password);
        return $this->execute();
    }
}
