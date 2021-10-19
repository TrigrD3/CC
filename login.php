<?php 

session_start();

if(isset($_SESSION["login"])){
  header("Location: index.php");
  exit;
}

require 'config.php';

if (isset($_POST["register"])) {
  if ( registrasi($_POST) > 0) {
    echo "<script>
          alert('user baru berhasil ditambahkan!')
        </script>";
  } else {
    echo mysqli_error($conn);
  }
}

if (isset($_POST ["login"])){
  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

  //cek username 
  if (mysqli_num_rows($result) === 1){

    //cek password 
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password,$row["password"])){

      // set session
      $_SESSION["login"] = true;



      header("Location: index.php");
      exit;
    }

  }

  $error = true;


}
?>
<!DOCTYPE html>
<html>
<head>
	<title>REGIS</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="assets/styleregis.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
</head>
<body>
  <?php if(isset($error)) : ?>
  <p>username/password salah</p>
  <?php endif; ?>
  <div class="cont">
    <div class="form sign-in">
      <form action="" method="post">
     
      <h2>Sign In</h2>
      <label>
        <span>Username</span>
        <input type="text" name="username">
      </label>
      <label>
        <span>Password</span>
        <input type="password" name="password">
      </label>
      <button class="submit" name="login" type="btn btn-primary">Sign In</button>
      <p class="forgot-pass">Forgot Password ?</p>
    </form>
    <div class="social-media">
        <ul>
          <!-- <li><img src="images/facebook.png"></li>
          <li><img src="images/twitter.png"></li>
          <li><img src="images/linkedin.png"></li>
          <li><img src="images/instagram.png"></li> -->
        </ul>
      </div>
    </div>

    <div class="sub-cont">
      <div class="img">
        <div class="img-text m-up">
          <h2>New here?</h2>
          <p>Sign up and discover great amount of new opportunities!</p>
        </div>
        <div class="img-text m-in">
          <h2>One of us?</h2>
          <p>If you already has an account, just sign in. We've missed you!</p>
        </div>
        <div class="img-btn">
          <span class="m-up">Sign Up</span>
          <span class="m-in">Sign In</span>
        </div>
      </div>
      <div class="form sign-up">
        <h2>Sign Up</h2>
        <form action="" method="post">
        <label>
          <span>Username</span>
          <input type="text" name="username">
        </label>
        <label>
          <span>Email</span>
          <input type="email" name="email">
        </label>
        <label>
          <span>Password</span>
          <input type="password" name="password">
        </label>
        <label>
          <span>Confirm Password</span>
          <input type="password" name="passwordconf">
        </label>
        <button class="submit" name="register" type="btn-primary">Sign Up Now</button>
      </div>
    </div>
  </div>
<script type="text/javascript" src="assets/script.js"></script>
</body>
</html>