<?//php require '../View/loginview.php'; ?>
<!DOCTYPE html>  
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
Don't have a account?
<a href="../View/regi_view.php">Resister now!</a>
</form>
</div>
</body>
</html>