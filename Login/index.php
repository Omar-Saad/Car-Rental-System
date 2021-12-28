<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
   <link rel="stylesheet" type="text/css" href="login_style.css">
   <script type="text/javascript" src="login.js"></script>
    
</head>

<body>


<?php


session_start();
$error = "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "car_rental_system";

    $conn = new mysqli($servername,$username,$password,$dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
       
      }
     // echo "Connected successfully ";

      $login_email = $_POST["login_email"];
      $login_pass = $_POST["login_password"];
      $user = "customer";
      if(isset($_POST["is_admin"])){
        $is_admin = $_POST["is_admin"];
        if ($is_admin == 1)
        $user = "admin";
      }
        

     

      $query = "select * from $user where email='".$login_email."' and password=MD5('".$login_pass."')";
      $result =$conn->query($query);

       if($result->num_rows > 0){
       $row = $result->fetch_assoc();
       
        $_SESSION['name']=$row["name"];
        header('location:welcome.php');
       
    }
       else
       {
        $error = 'You entered wrong username or password';
       }

}

?>
    <div> 
        <form id="login_form" class="form_login" method="POST" action="#" onsubmit="return validateLogin()" >
            <h2>LOGIN</h2>
            <div class="error" id="error"><?php echo $error?></div>
            <div>
            <label for="emai">Email</label>
            <input type="email" id="login_email" name="login_email" placeholder="Email">
            </div>
            <br/>
            <div>
            <label for="password">Password</label>
            <input type="password" id="login_password" name="login_password" placeholder="Password">
            <br/>
        </div>

        <div>
        <button type="submit">Login</button>
        </div>
            <br/>
            <div>
            <p>Dont't have an account ? <a href="register.php">REGISTER</a></p>
            </div>

            <div >
            <input type="checkbox" id="is_admin" name="is_admin" value=1>
            <label for="is_admin" > I am an Admin</label>

            </div>

            
           
        </form>

      
     
    </div>

  


</body>

</html>