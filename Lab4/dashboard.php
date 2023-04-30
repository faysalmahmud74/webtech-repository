<?php 
include 'header.php';
session_start();

if(isset($_SESSION['username']) && isset($_SESSION['password'])){
  echo "Welcome ".$_SESSION['username']."!";
  include'side.php';
} else {
  header("login.php");
  echo "Please LogIn first!!!";
}
include 'footer.php';
?>