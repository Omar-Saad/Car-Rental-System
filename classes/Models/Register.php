<?php

class Register extends Dbh
{
    protected function availableUsername($username)
    {
        $query = "SELECT *" . " FROM user WHERE username = ?;";
        $stmt = $this->connect()->prepare($query);

        if (!$stmt->execute($username)) {
            $stmt = NULL;
            header("Location: ../../index.php?error=stmtFailed");
            exit();
        }
        if ($stmt->rowCount() > 0) {
            $stmt = NULL;
            return False;
        } else {
            $stmt = NULL;
            return True;
        }
    }

    protected function availableEmail($email)
    {
        $query = "SELECT *" . " FROM user WHERE email = ?;";
        $stmt = $this->connect()->prepare($query);

        if (!$stmt->execute($email)) {
            $stmt = NULL;
            // TODO :: headerLocation
            header("Location: ");
            exit();
        }
        if ($stmt->rowCount() > 0) {
            $stmt = NULL;
            return False;
        } else {
            $stmt = NULL;
            return True;
        }
    }

    protected function createUser($email, $username, $password)
    {
        $query = "INSERT INTO" . " user (email, username, password)
                    VALUES (?, ?, ?);";
        $stmt = $this->connect()->prepare($query);
        $hashedPass = password_hash($password, PASSWORD_DEFAULT);

        if (!$stmt->execute(array($email, $username, $hashedPass))) {
            $stmt = NULL;
            header("Location: ../../index.php?error=stmtFailed");
            exit();
        }
        $stmt = NULL;
    }
}