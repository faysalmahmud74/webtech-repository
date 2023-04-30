<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<style>
        .error{
        	color: red;
        }
      
    </style>
</head>
<body>

<?php
$userErr = $passErr = $userErr2 ="";
$username = $password = ""; 
$errCount = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	if (empty($_POST["username"])) {
	    $userErr = "Username is required";
	    $errCount = $errCount + 1;	
	  } else {
	    $username = check_input($_POST["username"]);

	  }

  if (empty($_POST["password"])) {
    $passErr = "Password is required";
    $errCount = $errCount + 1;	
  } else {
    $password = check_input($_POST["password"]);
  }

    if ($errCount < 1){

        $strJsonFileContents = file_get_contents("data.json");

        $arra = json_decode($strJsonFileContents);
        foreach($arra as $item) { 

            if ($username == $item->username){
                if ($password == $item->password){
                    echo "Login success!";
					 exit;
                }else{
                    $passErr = "Wrong password!";
                }
            }
        }

    }

}

  function check_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<div class="donor-info make-it-center">
<h2>Login</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Username: <input type="text" name="username" value="<?php echo $username;?>">
  <span class="error">* <?php echo $userErr;?></span>
  <br><br>
  Password: <input type="password" name="password" value="<?php echo $password;?>">
  <span class="error">* <?php echo $passErr;?></span>
  <br><br>
  <input type="checkbox" id="rmbm" name="rmbm" value="True">
  <label for="rmbm"> Remember Me</label><br><br>
<input type="submit" name="submit" value="Submit"> 

<a href="password.php">Forgot Password?</a> <br> <br>
<!--<a href="register.php">Don't have a account? Resister now!</a>-->
</form>
</div>
</body>
</html>