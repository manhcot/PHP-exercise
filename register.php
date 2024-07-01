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
$retype_password = "";
$error = "";
if($_SERVER["REQUEST_METHOD"] == "POST")
{
$username = $_POST["username"];
$password = $_POST["password"];
$retype_password = $_POST["retype_password"];
if (empty($username) || empty($password))
{
 $error = "<p>username/password must not be empty !</p>";
}
if ($password !== $retype_password)
{
 $error = "<p>password and retype password are not matching !</p>";
}


}
function sanitizing($input)  //sanitizing input
{
  $input =  preg_replace('/\s+/', '', $input);
  $input = trim($input);
  $input = stripslashes($input);
  $input = htmlspecialchars($input);
  return $input;
}
function specialChars($str) {
    return preg_match('/[^a-zA-Z0-9]/', $str) > 0;
}

$username = sanitizing($username);
$password = sanitizing($password);
$retype_password = sanitizing($retype_password);



if (!specialChars($username) && $_SERVER["REQUEST_METHOD"] == 'POST' && isset($_POST["submit"]) && !empty($username) && !empty($password) && !empty($retype_password))
{
   $connect =  mysqli_connect("localhost","root","","manhcot.com") or die("Connection failed: " . mysqli_connect_error());
   if (isset($_POST["username"]) && isset($_POST["password"]) && $password == $retype_password)
   {
    $sql = "INSERT INTO `users` (`username`, `password`) VALUES ('$username', '$password')";
    $query = mysqli_query($connect,$sql);
    if($query)
    {
        $_SESSION["user"] = $username;
      header("Location:index.php"); 
      
    }
   }

   mysqli_close($connect);
}
?>

<div  class="register_form">
<h1 style="text-align:center"> REGISTER PORTAL </h1>
   <form action="register.php" method="POST">   <!-- alternative : htmlspecialchars( $_SERVER["PHP_SELF"] )   -->
   <label for="username">Username:</label>
  <input type="text" id="username" name="username"> 
  <?php if (specialChars($username))  {echo "username contain special character !";}?><br><br>  
  <label for="password">Password:</label>
  <input type="text" id="password" name="password"><br><br>
  <label for="retype_password">Retype Password:</label>
  <input type="text" id="retype_password" name="retype_password"><br><br>
  <input type="submit" name="submit" value="Submit">
  <span style="colour:red"><?php echo $error?></span>
</form>
<div>




</body>
</html>