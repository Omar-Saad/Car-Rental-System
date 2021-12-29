<?php


class LoginController extends Login
{
    private $email;
    private $password;

    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    public function login()
    {
        $this->getUser($this->email, $this->password);
    }
}