<?php


class Login extends Dbh
{
    private function userExist($email)
    {
        $query = "SELECT *" . " FROM user WHERE email = ?;";
        $stmt = $this->$this->connect()->prepare($query);

        // Query Failed
        if (!$stmt->execute($email)) {
            $stmt = NULL;
            header("Location: ../../index.php?error=stmtFailed");
            exit();
        }
        // Doesn't Exist
        if ($stmt->rowCount() == 0) {
            $stmt = NULL;
            header("Location: ../../index.php?error=wrongUsernameOrPassword");
            return False;
        }
        return $stmt->fetchAll();
    }

    protected function getUser($email, $password)
    {
        $userExist = $this->userExist($email);
        if ($userExist === False){
            header("Location: ../../index.php?error=wrongUsernameOrPassword");
            exit();
        }

        $checkPass = password_verify($password, $userExist(0)["password"]);
        if ($checkPass === False) {
            header("Location: ../../index.php?error=wrongUsernameOrPassword");
        } else {
            // Starting Session
            $_SESSION["id"] = $userExist(0)["id"];
            $_SESSION["email"] = $userExist(0)["email"];
            // TODO :: Location Header
            header("Location: ");
        }
        exit();
    }
}