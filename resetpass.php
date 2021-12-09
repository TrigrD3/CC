<?php 

require 'config.php';

if (isset($_POST ["submit"])){
  
  $email = $_POST["email"];
  $password= $_POST["password"];
  $passwordconf= $_POST["passwordconf"];
  if($password == $passwordconf) {

    $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
    //cek username 
    if (mysqli_num_rows($result) === 1){
      $password = password_hash($password, PASSWORD_DEFAULT);
      $q="UPDATE users SET 'password' ='$password' WHERE email=$email";
      $query = mysqli_query($conn, $q);
      echo "<script>
        alert('Your password has been changed!');
      </script>";
      header("Location: index.php");
      exit;
      
    }
    else{
      echo "<script>
        alert('Wrong email!');
      </script>";
    }
  }
  else{
    echo "<script>
        alert('Confirmation Password is wrong!');
    </script>";
  }
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Forgot Password</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="assets/styleforgot.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
</head>
<body>
    <div class="form cont">
      <form action="" method="post">
     
      <h2>Reset Password</h2>
      <label>
        <span>Email Address</span>
        <input type="email" name="email" required>
      </label>
      <label>
          <span>New Password</span>
          <input type="password" name="password" required>
        </label>
        <label>
          <span>Confirm Password</span>
          <input type="password" name="passwordconf" required>
        </label>
      <button class="submit" name="submit" type="btn btn-primary">Submit</button>
    </form>
    </div>
</body>
</html>