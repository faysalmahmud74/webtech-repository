<?php
$email = $password = $passErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["email"];
    $password = $_POST["password"];

    $strJsonFileContents = file_get_contents("data.json");

    $arra = json_decode($strJsonFileContents);
    foreach($arra as $item) { 

        if ($email == $item->email){
            if ($password == $item->password){
                echo "Login success!";
                header ("location: welcome.html");
                 exit;
            }
            else{
                $passErr = "Wrong password!";
            }
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn</title>
</head>
<body>
<h2> Login: </h2> <br>
<form id="loginForm" method= "post" onsubmit="return validateLoginForm()">
  <label for="email">Email:</label>
  <input type="text" id="email" name="email"><br><br>
  <label for="password">Password:</label>
  <input type="password" id="password" name="password"><br><br>
  <input type="submit" value="Login">
</form>
<script src="login_val.js"></script>
</body>
<a href="regi.php">Register Now?</a> <br> <br>
</html>