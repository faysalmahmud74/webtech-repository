<!DOCTYPE html>
<?php include '../Controller/header.php'; ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body> 
<br><br>
Current Password: <input type="password" name="current_pass">
<br><br>
New Password: <input type="password" name="new_password">
<br><br>
Retype New Password: <input type="password" name="retype_password">
<br><br>
<input type="submit" name="submit" value="Submit">  
</form>
<a href="../Controller/login.php" class="">Back</a><br>
</body>
</html>

<?php include '../Controller/footer.php'; ?>