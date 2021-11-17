<?php 

include "config.php";
include "head.php";

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <!-- My CSS -->
    <link rel="stylesheet" href="assets/Style.css" />
    <!-- account Setting CSS -->
    <link rel="stylesheet" href="assets/stylesettingaccount.css" />
    <title>Setting HonBox</title>


  </head>
  <body> 

</nav>
    <section class='umum'>
        <div class='umum'>
            <ul id="menu">
                <li>User Setting</li>
            </ul>  
        </div>
        <div>
            <ul id="menu">
                <li><a href="halamansettingaccountsetting.php">Account</a></li>
                <li><a href="bookmarksetting.php">Bookmark</a></li>
                <li><a href="historysetting.php">History</a></li>
                <li><a href="readersetting.php">Reader</a></li>
            </ul>  
            <hr id=i></hr>
        </div>
    </section>

    <!-- Change Profile Pic -->
    <section class="umum">
        <div>
            <table border="0 px">
            <tr>
                <td rowspan="3" style="width: 270px;"><img class = "center-cropped" src="img/cc.jpg" alt="Profile Picture" align='left'></img></td>
                <td>Change Profil Picture</td>
            </tr>
            <tr>
                <td><button class="button1">Choose File</button></td>
            </tr>
            <tr>
                <td><button class="button" type="submit">Upload</button></td>
            </tr>
            </table>
        </div>
        <hr></hr>
        <div id="detail1">Change Display Name</div>
    </section>
    <!-- End Chsnge Profile Pic-->

    <!-- Change Display Name -->
    <section class="umum">
        <div id="detail">
            <table border="0 px">
            <tr>
                <td style="width: 270px;">Current Display Name</td>
                <td>//////</td>
            </tr>
            <tr>
                <td style="width: 270px;">New Display Name</td>
                <td><input type="text" class="input"></input></td>
            </tr>
            <tr>
                <td style="width: 270px;">Submit</td>
                <td><button class="button" type="submit">Submit</button></td>
            </tr>
            </table>
        </div>
        <hr></hr>
        <div id="detail1">Change Email Address</div>
    </section>
    <!-- End -->

    <!-- Change Email Address -->
    <section class="umum">
        <div id="detail">
            <table border="0 px">
            <tr>
                <td style="width: 270px;">Current Email</td>
                <td>//////</td>
            </tr>
            <tr>
                <td style="width: 270px;">New Email</td>
                <td><input type="text" class="input"></input></td>
            </tr>
            <tr>
                <td style="width: 270px;">Submit</td>
                <td><button class="button" type="submit">Submit</button></td>
            </tr>
            </table>
        </div>
        <hr></hr>
        <div id="detail1">Change Password</div>
    </section>
    <!-- End -->

    <!-- Change Password -->
    <section class="umum">
        <div id="detail">
            <table border="0 px">
            <tr>
                <td style="width: 270px;">Current Password</td>
                <td><input type="password" class="input"></input></td>
            </tr>
            <tr>
                <td style="width: 270px;">New Password</td>
                <td><input type="password" class="input"></input></td>
            </tr>
            <tr>
                <td style="width: 270px;">COnfirm Password</td>
                <td><input type="password" class="input"></input></td>
            </tr>
            <tr>
                <td style="width: 270px;">Submit</td>
                <td><button class="button" type="submit">Submit</button></td>
            </tr>
            </table>
        </div>
    </section>
    <!-- End -->

  </body>
</html>