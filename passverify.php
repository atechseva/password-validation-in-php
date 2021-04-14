

<?php
  session_start();
  error_reporting(0);
  include("db.php");
  
  if (isset($_POST['submit'])) {

      $errorMsg = "";

      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $password = mysqli_real_escape_string($conn, $_POST['password']); 
      $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']); 

      
  if (!empty($email) || !empty($password)) {
        $query  = "SELECT * FROM passhash WHERE email = '$email'";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) == 1){
          while ($row = mysqli_fetch_assoc($result)) {
            if (password_verify($password, $row['password']) && password_verify($cpassword, $row['cpassword'])) {
                $_SESSION['password'] = $row['password'];
               
                $_SESSION['email'] = $row['email'];
                header("location:index.php?login successful");
            }else{
                echo "Password not match";
            }    
          }
        }else{
            echo "No user found on this email";
        } 
    }else{
        echo "Email and Password is required";
    }
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passsword Verify</title>
</head>
<body>
<fieldset>
    <legend>Login Up</legend>
    <form action="" method="post" enctype="multipart/form-data">
    <label for="email">Email</label><input type="email" name="email">

    <label for="password">Password</label><input type="password" name="password">
    <label for="cpassword">Confirm Password</label><input type="password" name="cpassword">
    <input type="submit" value="Submit" name="submit">
</fieldset>
</body>
</html>