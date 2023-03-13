<!DOCTYPE html>
<html>
<head>
<?php
include 'header.php'; ?>
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
session_start();
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
                  $_SESSION['username'] = $username;
                  $_SESSION['password'] = $password;
              
                  // Redirect to home page
                  header("Location: dashboard.php");
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
<html>
<body>
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

<a href="resetpass.php">Forgot Password?</a> <br> <br>
</form>
</div>
</body>
</html>

<?php include 'footer.php'; ?>