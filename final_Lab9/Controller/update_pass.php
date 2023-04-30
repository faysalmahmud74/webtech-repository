<?php
require_once '../Model/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $username = $_POST["username"];
  $current_password = $_POST["current_password"];
  $new_password = $_POST["new_password"];

  $sql = "SELECT * FROM users WHERE username='$username' AND password='$current_password'";
  $result = $conn->query($sql);
  if ($result->num_rows == 1) {
    
    $sql = "UPDATE users SET password='$new_password' WHERE username='$username'";
    if ($conn->query($sql) === TRUE) {
      echo "Password updated successfully";
    } else {
      echo "Error updating password: " . $conn->error;
    }
  } else {
    echo "Username or Current password is incorrect";
  }
}
include '../View/update_pass_view.php';
?>

