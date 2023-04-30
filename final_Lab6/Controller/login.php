
<?php
require_once '../model/db.php';
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
$userErr = $passErr ="";
$username = $password = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	if (empty($_POST["username"])) {
	    $userErr = "Username is required";
	  } else {
	    $username = trim($_POST["username"]);
	  }

  if (empty($_POST["password"])) {
    $passErr = "Password is required";	
  } else {
    $password = trim($_POST["password"]);
  }

  if(empty($userErr) && empty($passErr)){
    // Prepare a select statement
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

// Check if user exists
if ($result->num_rows == 1) {
    // User exists, set session variables and redirect to dashboard
    //session_start();
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;

    // Redirect to home page
     header("location: ../View/home.php");
     exit;
} else {
    // User does not exist, display error message
    $passErr = "Invalid username or password";
}

}
else { 
  echo "Error!";
}

// Close connection
$conn->close();
}
?>

<?php include '../View/loginview.php';
include 'footer.php'; ?>