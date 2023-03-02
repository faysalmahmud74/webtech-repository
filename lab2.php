
<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$nameErr = $emailErr = $dateErr = $genderErr = $websiteErr = $bgErr= $degreeErr = "";
$name = $email = $date = $gender = $comment = $website = $bg = $degree = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }


  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
//Date error function
  if (empty($_POST["date"])) {
    $dateErr = "Date is required";
  } else {
    $date = test_input($_POST["date"]);
  }

//Gender Error function
  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }


  if (empty($_POST["degree"])) {
    $degreeErr = "At least two of them
    must be selected";
  } else {
    $degree = test_input($_POST["degree"]);
  }


  if (empty($_POST["bg"])) {
    $bgErr = "Blood group is required";
  } else {
    $bg = test_input($_POST["bg"]);
  }
  
}
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>
//form validation
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>

  E-mail: <input type="text" name="email">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>

  Date:
  <form method="post" action="process.php">
  <label for="date">Select a date:</label>
  <input type="date" id="date" name="date">
  <span class="error">* <?php echo $dateErr;?></span>
  <br><br>


  Gender:
  <input type="radio" name="gender" value="female">Female
  <input type="radio" name="gender" value="male">Male
  <input type="radio" name="gender" value="other">Other
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>

  Degree:
  <input type="checkbox" name="degree" value="ssc">
  <label for="opt1">SSC</label>
  <input type="checkbox" name="degree" value="hsc">
  <label for="opt2">HSC</label>
  <input type="checkbox" name="degree" value="bsc">
  <label for="opt3">BSc</label>
  <input type="checkbox" name="degree" value="msc">
  <label for="opt4">Msc</label>
  <span class="error">* <?php echo $degreeErr;?></span>
  <br><br>

  Blood group:
  <label for="bg">Select blood group:</label>
  <select name="bg" id="bg">
    <option value="A+">A+</option>
    <option value="A-">A-</option>
    <option value="B+">B+</option>
    <option value="B-">B-</option>
    <option value="O+">O+</option>
    <option value="O-">O-</option>
    <option value="AB+">AB+</option>
    <option value="AB-">AB-</option>
  </select>
  <span class="error">* <?php echo $bgErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $date;
echo "<br>";
echo $gender;
echo "<br>";
echo $degree;
echo "<br>";
echo $bg;
echo "<br>";
?>
</body>
</html>