<?php


class Login extends Dbh
{
    private function userExist($email,$isAdmin)
    {
        $user = "customer";
        if($isAdmin == true)
            $user = "admin";
        

        $query = "SELECT *" . " FROM $user WHERE email = ?;";
        
        $stmt = $this->connect()->prepare($query);
        

        // Query Failed
        if (!$stmt->execute([$email])) {
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

    protected function getUser($email, $password,$isAdmin)
    {
        $userExist = $this->userExist($email,$isAdmin);
        if ($userExist === False){
           header("Location: ../resources/Login/index.php?error=wrongUsernameOrPassword");
            exit();
        }

        
        
        $checkPass = password_verify($password, $userExist[0]["password"]);
        
        if ($checkPass === False) {
           header("Location: ../resources/Login/index.php?error=wrongUsernameOrPassword");
        } else {
          
            // Starting Session
           // $_SESSION["id"] = $userExist[0]["cust_id"];
            $_SESSION["email"] = $userExist[0]["email"];
            // TODO :: Location Header
            header("Location: ");
        }
        exit();
    }
}