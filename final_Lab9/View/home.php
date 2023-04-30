<?php 
require_once '../Model/db.php';
include '../Controller/header.php';
session_start();

if(isset($_SESSION['username']) && isset($_SESSION['password'])){
  echo "Welcome ".$_SESSION['username']."!";
  include'../Controller/sidebar.php';
} else {
  echo "Please LogIn first!!!";
  header("Location:../Controller/login.php");
  //echo "Please LogIn first!!!";
}
?>
<a style = "text-align: left; margin-left:10px" href="../Controller/logout.php">Log out</a>

<?php include '../Controller/footer.php'; ?>