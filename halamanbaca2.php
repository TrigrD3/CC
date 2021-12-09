<?php 
require "config.php";
include "head.php";


$id = $_GET['id']; //Sesuaikan dengan id manga
$chapter = $_GET['chapter'];

if(!isset($_GET['hal'])){
  $hal = 1;
}
else{
  $hal = $_GET['hal'];
}

// $mode = $_GET['mode'];

$query = mysqli_query($conn, "SELECT * FROM komik WHERE id = $id");
$data = mysqli_fetch_array($query);
$qchapter = mysqli_query($conn, "SELECT chapter FROM isi_komik WHERE id = '$id'");
$qdata = mysqli_fetch_array($qchapter);

$dropdownch= mysqli_query($conn, "SELECT chapter FROM isi_komik WHERE id = '$id' GROUP BY chapter");
$last=mysqli_query($conn,"SELECT chapter FROM isi_komik WHERE id=$id ORDER BY chapter DESC LIMIT 1");
$lastdata=mysqli_fetch_array($last);

$qjudul = mysqli_query($conn, "SELECT judul FROM komik WHERE id = $id");
$judul = mysqli_fetch_row($qjudul)[0];
$i=0;
$j=0;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

    <!-- My CSS -->
    <link rel="stylesheet" href="assets/stylebaca.css" />

    <!-- google font -->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />

    <!-- font awesome -->
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css" />

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />

    <!-- Font khand -->
    <link href='https://fonts.googleapis.com/css?family=Khand' rel='stylesheet'>
    <title>Halaman Baca</title>
  </head>
  <body>
    <section class="taskbar">

        <div class="umum judul">
            <p>
                <b><?php echo $data['judul']; ?> - Chapter <?php echo $chapter ?></b>
            </p>
        </div>
        <div class="umum editch">
          <!-- Dropdown Chapter -->
            <p>
                <b><a href="index.php">Home </a> / <a href="infokomik.php?id=<?= $id ?>"><?php echo $data['judul']; ?></a> / Chapter <?php echo $chapter ?></b>
            </p>
            <div class="dropdownchp">
              <button class="btn btn-secondary dropdown-toggle dropchp" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Chapter
              </button>
              <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton1">
                <?php
                foreach($dropdownch as $ch):{
                  $i++;
                }
                ?>
                <li><a class="dropdown-item" href="halamanbaca.php?id=<?php echo $id?>&chapter=<?= $ch['chapter'];?>"><?= $ch['chapter']?></a></li>
                <?php endforeach;?>
              </ul>
            
              <!-- Next Chapter -->
              <div class="btn-group next">
              <?php if($chapter != $lastdata['chapter']):?>
              <a href="halamanbaca2.php?id=<?php echo $id?>&chapter=<?= $chapter+1?>"><button type="button" class="btn btn-danger">Next Chapter <i class="bi bi-arrow-right"></i></button></a>
              </div>
              <?php endif;?>
              <!-- Akhir Next Chapter -->

              <!-- Previous Chapter -->
              <div class="btn-group me-2 prev">
              <?php if($chapter!=1):?>
              <a href="halamanbaca2.php?id=<?php echo $id?>&chapter=<?= $chapter-1?>"><button type="button" class="btn btn-danger"><i class="bi bi-arrow-left"></i>
              Prev Chapter</button></a>
              <?php endif;?>
              </div>
              <!-- Akhir Prev Chapter -->
            </div>
        </div>
        
    </section>
    <section id="tampilan">
          <?php
              $read = mysqli_query($conn, "SELECT pages FROM isi_komik WHERE chapter = '$chapter' AND id = $id AND hal=$hal");
              $readdata = mysqli_fetch_array($read);
              $lasthal = mysqli_query($conn, "SELECT hal FROM isi_komik WHERE chapter = '$chapter' AND id = $id ORDER BY hal DESC LIMIT 1");
              $lasthaldata = mysqli_fetch_array($lasthal);
          ?>
          <img src="<?php echo"komik/$judul/$chapter/".$readdata['pages']?>"  width= "75%" height="auto"alt="">

          <?php if($hal!=1): ?>
          <button class="btn">Prev Page</button>
          <?php endif; ?>
          
          <p><?= $hal ?> of <?= $lasthaldata['hal'] ?></p>

          <?php if($hal!=$lasthaldata['hal']): ?>
          <a href="halamanbaca2.php/id=<?= $id ?>&chapter=<?= $chapter ?>&hal=<?= $hal+1?>"><button class="btn">Next Page</button></a>
          <?php endif; ?>
          
    </section>

    <button onclick="topFunction()" id="myBtn" title="Go to top"><img src="img/ArrowUp.png" class="arrow"></button>

    <script>
    //Get the button
    var mybutton = document.getElementById("myBtn");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = "block";
      } else {
        mybutton.style.display = "none";
      }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    }
    </script>
  </body>
</html>
