<?php 

require 'config.php';

if (isset($_POST ["submit"])){
  
  $emailto = $_POST["email"];
  $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$emailto'");
  //cek email
  if (mysqli_num_rows($result) === 1){

    $row = mysqli_fetch_assoc($result);
    $username = $row['username'];
    $subject = "Reset Password";
    $txt = "Dear $username, <br><br> Heres the link to reset your password <a href='https://honbox.azurewebsites.net/resetpass.php'>Reset Password</a>";
    $headers = "From: vincentius.sean@gmail.com" . "\r\n" . "CC: $emailto";

    mail($emailto,$subject,$txt,$headers);
  }

  echo "<script>alert('Theres no email found');</script>";


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
     
      <h2>Forgot Password?</h2>
      <label>
        <span>E-mail Address associated with account</span>
        <input type="email" name="email" required>
      </label>
      <button class="submit" name="submit" type="btn btn-primary">Submit</button>
      <a href="login.php"><button class="submit" name="cancel" type="btn btn-primary">Cancel</button></a>
    </form>
    </div>
</body>
</html>