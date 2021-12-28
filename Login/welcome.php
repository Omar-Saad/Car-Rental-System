


<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
   <link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>

<?php
    session_start();

      $name=$_SESSION['name'];  
      if($name == "")
      header("location:index.php");

      if(isset($_GET["signout"])){
      session_destroy();
      header("location:index.php");
      }

      
?>

    <div class="out_div">
       <h2>Welcome <?php echo $name;?></h2>
       <br/>
       <a href="?signout=true">Signout</a>

    </div>

  


</body>

</html>