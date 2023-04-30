<?php
require_once '../Model/db.php';

$nameErr = $phoneErr = $emailErr = $dbErr = "";
$name = $phone = $email = $message = $message = "";

session_start();
$username = $_SESSION["username"];
$sql = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["new_name"])) {
    $nameErr = "Name is required";   
} else {
    $new_name = test_input($_POST["new_name"]);
    $wcount = str_word_count($new_name);
    if ($wcount < 2 ) {
     $nameErr = "Minimum 2 words required";
     }

    if (!preg_match("/^[a-zA-Z]/", $new_name)) {
     $nameErr = "Name must start with a letter!";
     $errCnt = $errCnt + 1;    
    }

    if (!preg_match("/^[a-zA-Z_\-. ]*$/",$new_name)) {
      $nameErr = "Only letters, period and white space allowed";
      $errCnt = $errCnt + 1;   
    }   
}

//phone number
if (empty($_POST["new_phone"])) {
    $phoneErr = "Phone number is required";
  } else {
    $new_phone = $_POST["new_phone"];

    if (strlen($new_phone) <> 11) {
     $phoneErr = "Must be eleven digit";
    }

    if (!preg_match('/^[0-9]{10,14}$/', $new_phone)) {
     $phoneErr = "Must be valid phone number";
    }

  }
//email 
if (empty($_POST["new_email"])) {
$emailErr = "Email is required";
} else {
    $new_email = test_input($_POST["new_email"]);
    if (!filter_var($new_email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
}
  //$new_name = $_POST["new_name"];
  //$new_phone = $_POST["new_phone"];
  //$new_email = $_POST["new_email"];

  if (empty($nameErr) && empty($phoneErr) && empty($emailErr)){
  $sql = "UPDATE users SET name='$new_name', phone='$new_phone', email='$new_email' WHERE username='$username'";
  if ($conn->query($sql) === TRUE) {
    $message = "<label class='text-success'>Profile Updated!</p>";;
    $_SESSION["new_name"] = $new_name;
    $_SESSION["new_phone"] = $new_phone;
    $_SESSION["new_email"] = $new_email;
    $message = "<label class='text-success'>Profile Updated!</p>";
  } else {
    echo "Error updating profile: " . $conn->error;
  }
}
else {
    $dbErr = "Fields can not be empty!";
}
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<?php include '../View/edit_profile_view.php';
?>

