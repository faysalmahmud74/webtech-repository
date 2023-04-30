<?php
require '../model/db.php';

include 'header.php';
$nameErr = $phoneErr = $emailErr = $degreeErr = $genderErr = $userErr = $passErr = $confrmPassErr = $dobErr = "";
$name = $phone = $email = $gender = $username = $password = $cnfrmPass = $dob = "";
$errCnt = 0;  
 $message = '';  
 $error = '';  
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
//name
    if (empty($_POST["name"])) {
    $nameErr = "Name is required";
    $errCnt = $errCnt + 1;     
     } else {
         $name = test_input($_POST["name"]);
         $wcount = str_word_count($name);
         if ($wcount < 2 ) {
          $nameErr = "Minimum 2 words required";
          $errCnt = $errCnt + 1; 
          }

         if (!preg_match("/^[a-zA-Z]/", $name)) {
          $nameErr = "Name must start with a letter!";
          $errCnt = $errCnt + 1;    
         }

         if (!preg_match("/^[a-zA-Z_\-. ]*$/",$name)) {
           $nameErr = "Only letters, period and white space allowed";
           $errCnt = $errCnt + 1;   
         }   
    }
//phone number
         if (empty($_POST["phone"])) {
         $phoneErr = "Phone number is required";
         $errCnt = $errCnt + 1;     
       } else {
         $phone = $_POST["phone"];

         if (strlen($phone) <> 11) {
          $phoneErr = "Must be eleven digit";
          $errCnt = $errCnt + 1;    
         }

         if (!preg_match('/^[0-9]{10,14}$/', $phone)) {
          $phoneErr = "Must be valid phone number";
          $errCnt = $errCnt + 1;    
         }

       }
//email 
    if (empty($_POST["email"])) {
    $emailErr = "Email is required";
    $errCnt = $errCnt + 1;     
     } else {
         $email = test_input($_POST["email"]);
         if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
           $emailErr = "Invalid email format";
           $errCnt = $errCnt + 1;   
         }
     }

//username
     if (empty($_POST["username"])) {
         $userErr = "Username is required";
         $errCnt = $errCnt + 1;     
       } else {
         $username = $_POST["username"];

         if (strlen($username) <2 ) {
          $userErr = "Minimum 2 characters required";
          $errCnt = $errCnt + 1;    
         }

         if (!preg_match("/^[a-zA-Z_\-.]*$/", $username)) {
          $userErr = "Username can contain alpha numeric characters, period, dash or underscore only!";
          $errCnt = $errCnt + 1;    
         }

       }

//pass
     if (empty($_POST["password"])) {
         $passErr = "Password is required";
         $errCnt = $errCnt + 1;     
       } else {

          $password = test_input($_POST["password"]);
          $cnfrmPass = test_input($_POST["cnfrmPass"]);

          if (empty($cnfrmPass)) {
             
               $confrmPassErr = "Confirm password is required";
              $errCnt = $errCnt + 1;  
          } else {
               if ($password != $cnfrmPass) {
                    
                    $confrmPassErr = "Confirm password is didn't match with password!";
                    $errCnt = $errCnt + 1;
               }
          }

     
          if (strlen($password) < 8 ) {
               $passErr = "Minimum 8 characters required";
              $errCnt = $errCnt + 1;    
              }

         if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?!.* )(?=.*[%$#@]).+$/", $password)) {
               $passErr .= " Password must contain atleast a digit, a lower case and an upper case letter, atleast one of the [%$#@] and no space.";
              $errCnt = $errCnt + 1;    
              }

          }
//gender
     if (empty($_POST["gender"])) {
         $genderErr = "Gender is required";
     $errCnt = $errCnt + 1;
     } else {
         $gender = test_input($_POST["gender"]);
     }

     if (empty($_POST["dob"])) {
         $dobErr = "Date of Birth is required";
         $errCnt = $errCnt + 1;
     } else {
         $dob = $_POST["dob"];
     }

//json databsae
     /* if($errCnt > 0) {
      echo "<span class='error'>Please enter valid Input...!</span>";
      } else {
           if(file_exists('../data/data.json'))  
           {  
                $current_data = file_get_contents('../data/data.json');  
                $array_data = json_decode($current_data, true);  
                $new_data = array(  
                     'name'               =>     $_POST['name'],
                     'phone'               =>     $_POST['phone'],  
                     'e-mail'          =>     $_POST["email"],  
                     'username'     =>     $_POST["username"],
                     'password'     =>     $_POST["password"],
                     'gender'     =>     $_POST["gender"],
                     'dob'     =>     $_POST["dob"]  
                );  
                $array_data[] = $new_data;  
                $final_data = json_encode($array_data);  
                if(file_put_contents('../data/data.json', $final_data))  
                {  
                     $message = "<label class='text-success'>Registration Success!</p>";
                }  
           }  
           else  
           {  
                $error = 'JSON File not exits';  
           }  
      }  */

//mysql database
    // If there are no errors, insert data into the database
    if (empty($nameErr) && empty($phoneErr) && empty($emailErr) && empty($userErr) && empty($passErr) && empty($genderErr)){
     $sql = "INSERT INTO users (name, phone, email, username, password, gender, dob) VALUES ('$name', '$phone','$email', '$username', '$password', '$gender', '$dob')";
     if (mysqli_query($conn, $sql)) {
         echo "Registration successful!";
     }
     else {
         echo "Error: " . $sql . "<br>" . mysqli_error($conn);
     }
 }
}

// Function to sanitize input data
function test_input($data) {
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
 }
?>