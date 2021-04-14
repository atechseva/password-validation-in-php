<?php
  session_start();
  
  include("db.php");

  if (isset($_POST['submit']))
  {
    
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $hashpassword = password_hash($password, PASSWORD_BCRYPT);

    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
    $chashpassword = password_hash($cpassword, PASSWORD_BCRYPT);

    $email = mysqli_real_escape_string($conn, $_POST['email']);


    if(strlen($password) < 6)
    {
        echo "Password is more than 6 character";
        
    }
    else if($password!=$cpassword){
        echo "Password is not match";
            }
    else{
        $query= "INSERT INTO passhash(`password`,`cpassword`,`email`) VALUES('$hashpassword','$chashpassword','$email')";
          $result = mysqli_query($conn, $query);
          if($result){
            echo "Success";
          }
          else{
              echo  "Something Went Wrong";
          }
    }
    
  }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Hash Functionality</title>
</head>
<body>
    

<fieldset>
    <legend>Sign Up</legend>
    <form action="" method="post" enctype="multipart/form-data">
    <label for="email">Email</label><input type="email" name="email">

    <label for="password">Password</label><input type="password" name="password">
    <label for="cpassword">Confirm Password</label><input type="password" name="cpassword">
    <input type="submit" value="Submit" name="submit">
</fieldset>





</form>
</body>
</html>