<?php
session_start();
if (!isset($_SESSION["user"]))
{
  
   die();
  
}

$login_session = $_SESSION["user"];

