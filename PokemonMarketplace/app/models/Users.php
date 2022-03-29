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

    public function show_users()
    {
        $this->query('SELECT * FROM users');
        return $this->getResultSet();
    }
}
