<?php


class RegisterController extends Register
{
    private $email;
    private $username;
    private $password;

    public function __construct($email, $username, $password)
    {
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;

    }

    public function register()
    {
        if ($this->takenEmail($this->email)) {
            header("Location: ../../resources/index.php?error=takenEmail");
        }
        if ($this->takenUsername($this->username)) {
            header("Location: ../../resources/index.php?error=takenUsername");
        }
        $this->createUser($this->email, $this->username, $this->password);
    }

    private function emptyInput()
    {
        if (empty($this->email) || empty($this->username) || empty($this->password)) {
            return false;
        } else {
            return true;
        }
    }

    private function invalidUsername($username)
    {
        if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    private function invalidEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    private function takenUsername($username)
    {
        if (!$this->availableUsername($username)) {
            $result = True;
        } else {
            $result = False;
        }
        return $result;
    }

    private function takenEmail($email)
    {
        if (!$this->availableEmail($email)) {
            $result = True;
        } else {
            $result = False;
        }
        return $result;
    }
}

