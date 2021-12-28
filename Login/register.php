<!DOCTYPE html>
<html>
<head>
    <title>Register Form</title>
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

      $register_email = $_POST["register_email"];
      $register_pass = $_POST["register_password"];
      $register_name = $_POST["register_name"];

      $ssn = $_POST["ssn"];
      $phone = $_POST["phone"];
      $address = $_POST["address"];
      $profile_image = $_POST["profile_image"];

      $query = "select * from customer WHERE email='$register_email'";
      $result =$conn->query($query);

       if($result->num_rows > 0){
           $error = "Email Already Exists";
         //  echo "1";
    }
       else
       {
        $query = "INSERT INTO customer (name, email, password,phone,address,ssn,profile_image)
         values('$register_name','$register_email',MD5('$register_pass') ,'$phone','$address','$ssn','$profile_image')";
        $result =$conn->query($query);
        //echo "r= ".$result;
        if($result){
        $_SESSION['name']=$register_name;
        header('location:welcome.php');
        }
        else
        $error = "An Error has occured";
       }

}

?>

    <div >
        <form id="register_form" class="form_register" method="POST" action="#" onsubmit="return validateRegister()" >
            <h2>REGISTER</h2>
            <div class="error" id="error"><?php echo $error?></div>
            <div>
            <label for="name">Name</label>
            <input type="name" id="register_name" name="register_name" placeholder="Name">
        </div>
            
            <div>
            <label for="emai">Email</label>
            <input type="email" id="register_email" name="register_email" placeholder="Email">
        </div>
           

            <div>
            <label for="password">Password</label>
            <input type="password" id="register_password" name="register_password" placeholder="Password">
            
        </div>
        <div>
            <label for="confirm_password">Confirm Password</label>
            <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password">
            
        </div>
        

        <div>
            <label for="ssn">SSN</label>
            <input type="text" id="ssn" name="ssn" placeholder="SSN">
        </div>

        <div>
        <label for="address">Address</label>
            <input type="text" id="address" name="address" placeholder="address">
        </div>
        <div>
        <label for="phone">Phone</label>
            <input type="phone" id="phone" name="phone" placeholder="phone">
        </div>
        
        <div>
        <label for="profile_image">Profile Image Link</label>
            <input type="text" id="profile_image" name="profile_image" placeholder="profile image link">
        </div>
            
        
        <div>
        <button type="submit">Register</button>
        </div>
           
        <br/>
            <div>
            <p>Already have an account ? <a href="index.php">LOGIN</a></p>
            </div>
        </form>

    </div>

  


</body>

</html>