<!DOCTYPE html>
<html lang="en">
<?php
?>

<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Portal</title> 
</style>
<div class="nav_bar">
<a href="./index.php">Forum</a> 
   <a href="./login.php">Login</a>
   <a href="./register.php">Register</a>
   
</head>

    </style>
<header> 
 
        
     </div>
</header>
<body>
<?php
session_start();
$username = "";
$password = "";
$error = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
$username = $_POST["username"];
$password = $_POST["password"];
if (empty($username) || empty($password))
{
 $error = "<p>username/password must not be empty !</p>";
}
}
   $connect =  mysqli_connect("localhost","root","","manhcot.com") or die("Connection failed: " . mysqli_connect_error());
   if (isset($_POST["username"]) && isset($_POST["password"]) && !empty($username) && !empty($password))
   {
    $sql = "SELECT username, password FROM users";
    $query = mysqli_query($connect,$sql);
    if($query)
    {
        if (mysqli_num_rows($query) > 0)
        {
            while($row = mysqli_fetch_assoc($query))
            {
                if ($row["username"] == $username && $row["password"] == $password)
                {
                    $_SESSION["user"] = $username;
                    header("Location:index.php"); 
                   break;
                }
            }
       
        }
      
    }
   
        $error = "<p>wrong username / password</p>";
   
   }
   

   mysqli_close($connect);

?>

<div  class="register_form">
<h1 style="text-align:center"> LOGIN PORTAL </h1>
   <form action="login.php" method="POST">   <!-- alternative : htmlspecialchars( $_SERVER["PHP_SELF"] )   -->
   <label for="username">Username:</label>
  <input type="text" id="username" name="username"> <br><br>  
  <label for="password">Password:</label>
  <input type="text" id="password" name="password"><br><br>
  <input type="submit" name="submit" value="Submit">
  <span style="colour:red"><?php echo $error?></span>

</form>
<div>




</body>
</html>