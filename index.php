
<!DOCTYPE html>
<html lang="en">
<head>
      <link rel="stylesheet" href="./style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    
   
<div class="nav_bar">
   <a href="./index.php">Forum</a> 
   <a href="./login.php">Login</a>
   <a href="./register.php">Register</a>
   

</div>
</head>
<header class="center"><h1>Welcome to my forum</h1></header>
<body>
<?php 
include("session.php");
?>
<div>
    <?php if (isset($_SESSION["user"]))
    {?>
      <p> Welcome <?php echo $login_session ?></p>
    <?php
     } 
   ?>
    
   
</div>
<div>
<?php if (isset($_SESSION["user"]))
    {?>
       <button><a href="./logout.php">Logout</a></button>
    <?php
     } 
   ?>
</div> 

</body>
</html>