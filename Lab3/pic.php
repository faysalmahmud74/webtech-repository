<!DOCTYPE html>
<html lang="en">
<head>
    <title>Upload Picture</title>
</head>
<body>
      <?php

       if(isset($_POST['submit'])){

              $fileName = $_FILES['fileName']['name'];
              $tmp_loc = $_FILES['fileName']['tmp_name'];
              $uploadLoc = 'uploads/';

              if(!empty($fileName) ){
                     move_uploaded_file($tmp_loc, $uploadLoc.$fileName);
                     echo "File uploaded successfully";
              }
              else{
                     echo"Select an image";
              }

       }
       ?>
       <h2>Select an Image :</h2>
       <img src="profile-icon-9.png">
       <form method="post" action="" enctype="multipart/form-data">
              <input type="file" name="fileName">  <br><br>
              <input type="submit" name="submit">
       </form>

</body>
</html>