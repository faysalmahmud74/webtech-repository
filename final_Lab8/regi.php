<?php
$name = $email = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];

if(file_exists('data.json'))  
{  
     $current_data = file_get_contents('data.json');  
     $array_data = json_decode($current_data, true);  
     $new_data = array(  
          'name'               =>     $_POST['name'],  
          'email'          =>     $_POST["email"],  
          'password'     =>     $_POST["password"],
 
     );  
     $array_data[] = $new_data;  
     $final_data = json_encode($array_data);  
     if(file_put_contents('data.json', $final_data))  
     {  
          $message = "<label class='text-success'>Registration Success!</p>";
     }  
}  
else  
{  
     $error = 'JSON File not exits';  
} 
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <h2> Registration Form </h2>
<form id="registration-form" method= "post" onsubmit="return validateForm()">
  <label for="name">Name:</label>
  <input type="text" id="name" name="name">
  <br><br>
  <label for="email">Email:</label>
  <input type="email" id="email" name="email">
  <br><br>
  <label for="password">Password:</label>
  <input type="password" id="password" name="password">
  <br><br>
  <input type="submit" value="Register">
</form>
<script src="regi_val.js"></script>

</body>
<a href="login.php">Back</a> <br> <br>
</html>


