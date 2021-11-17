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
    <!-- history Setting CSS -->
    <link rel="stylesheet" href="assets/stylesettinghistory.css" />
    <title>Setting HonBox</title>


  </head>
  <body> 
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

    <div class='umum'>
        <table border="0 px">
            <tr>
            <td>Manga Name</td>
            <td>Manga Name</td>
            </tr>
        </table>
    </div>

    <!-- Manga baris 1 -->
    <section class="umum">
        <div id="table1">
            <table id="table1" border="0 px" style="background:transparent;">
            <tr>
                <td rowspan="5" style="width: 240px;"><img class = "image-cropped" src="img/cc.jpg" alt="HonBox" align='left'></img></td>
                <td>Jujutsu Kaisen</td>
                <td rowspan="5" style="width: 240px;"><img class = "image-cropped" src="img/cc.jpg" alt="HonBox" align='left'></img></td>
                <td>Jujutsu Kaisen</td>
            </tr>
            <tr>
                <td><a id="chapter">Chapter 161</a></td>
                <td><a id="chapter">Chapter 162</a></td>
            </tr>
            <tr>
                <td><a id="blank">.</a></td>
                <td><a id="blank">.</a></td>
            </tr>
            <tr>
                <td><a id="blank">.</a></td>
                <td><a id="blank">.</a></td>
            </tr>
            <tr>
                <td><a id="blank">.</a></td>
                <td><a id="blank">.</a></td>
            </tr>
            </table>
            <hr></hr>
        </div>
    </section>

    <!-- Manga baris 2 -->
    <section class="umum">
        <div id="table1">
            <table id="table1" border="0 px" style="background:transparent;">
            <tr>
                <td rowspan="5" style="width: 240px;"><img class = "image-cropped" src="img/cc.jpg" alt="HonBox" align='left'></img></td>
                <td>Jujutsu Kaisen</td>
                <td rowspan="5" style="width: 240px;"><img class = "image-cropped" src="img/cc.jpg" alt="HonBox" align='left'></img></td>
                <td>Jujutsu Kaisen</td>
            </tr>
            <tr>
                <td><a id="chapter">Chapter 161</a></td>
                <td><a id="chapter">Chapter 162</a></td>
            </tr>
            <tr>
                <td><a id="blank">.</a></td>
                <td><a id="blank">.</a></td>
            </tr>
            <tr>
                <td><a id="blank">.</a></td>
                <td><a id="blank">.</a></td>
            </tr>
            <tr>
                <td><a id="blank">.</a></td>
                <td><a id="blank">.</a></td>
            </tr>
            </table>
            <hr></hr>
        </div>
    </section>

    <!-- Manga baris 3 -->
    <section class="umum">
        <div id="table1">
            <table id="table1" border="0 px" style="background:transparent;">
            <tr>
                <td rowspan="5" style="width: 240px;"><img class = "image-cropped" src="img/cc.jpg" alt="HonBox" align='left'></img></td>
                <td>Jujutsu Kaisen</td>
                <td rowspan="5" style="width: 240px;"><img class = "image-cropped" src="img/cc.jpg" alt="HonBox" align='left'></img></td>
                <td>Jujutsu Kaisen</td>
            </tr>
            <tr>
                <td><a id="chapter">Chapter 161</a></td>
                <td><a id="chapter">Chapter 162</a></td>
            </tr>
            <tr>
                <td><a id="blank">.</a></td>
                <td><a id="blank">.</a></td>
            </tr>
            <tr>
                <td><a id="blank">.</a></td>
                <td><a id="blank">.</a></td>
            </tr>
            <tr>
                <td><a id="blank">.</a></td>
                <td><a id="blank">.</a></td>
            </tr>
            </table>
            <hr></hr>
        </div>
    </section>
    
    
  </body>
</html>