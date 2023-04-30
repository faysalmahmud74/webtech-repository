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

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <label for="username">Username:</label>
  <input type="text" name="username" required><br><br>
  <label for="current_password">Current password:</label>
  <input type="password" name="current_password" required><br><br>
  <label for="new_password">New password:</label>
  <input type="password" name="new_password" required><br><br>
  <input type="submit" value="Change password">
</form>
<br><a href="../View/home.php">Back</a>

<?php include '../Controller/footer.php'; ?>
