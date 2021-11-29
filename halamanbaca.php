<?php 
include "head.php";
require "config.php";

$id = $_GET['id']; //Sesuaikan dengan id manga
$chapter = $_GET['chapter'];
$query = mysqli_query($conn, "SELECT * FROM komik WHERE id = $id");
$data = mysqli_fetch_array($query);
$qchapter = mysqli_query($conn, "SELECT chapter FROM isi_komik WHERE id = '$id'");
$qdata = mysqli_fetch_array($qchapter);
$pages = mysqli_query($conn, "SELECT pages FROM isi_komik WHERE chapter = '$chapter'");

$qjudul = mysqli_query($conn, "SELECT judul FROM komik WHERE id = $id");
$judul = mysqli_fetch_row($qjudul)[0];
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
    <section>

        <div class="umum judul">
            <p>
                <b><?php echo $data['judul']; ?> - Chapter <?php echo $chapter ?></b>
            </p>
        </div>
        <div class="umum editch">
          <!-- Dropdown Chapter -->
            <p>
                <b><a href="index.php">Home </a> / <a href="infokomik.php?id=<?= $row['id']; ?>""><?php echo $data['judul']; ?></a> / Chapter <?php echo $chapter ?></b>
            </p>
            <div class="dropdownchp">
              <button class="btn btn-secondary dropdown-toggle dropchp" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Chapter
              </button>
              <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="#">Isi</a></li>
                <li><a class="dropdown-item" href="#">Isi</a></li>
                <li><a class="dropdown-item" href="#">Isi</a></li>
              </ul>
             
              <!-- Next Chapter -->
              <div class="btn-group next">
              <button type="button" class="btn btn-danger">Next Chapter <i class="bi bi-arrow-right"></i></button>
              </div>
              <!-- Akhir Next Chapter -->

              <!-- Previous Chapter -->
              <div class="btn-group me-2 prev">
              <button type="button" class="btn btn-danger"><i class="bi bi-arrow-left"></i>
              Prev Chapter</button>
              </div>
              <!-- Akhir Prev Chapter -->
            </div>
          <!-- Akhir Dropdown Chapter & Style-->

            <!-- <select name="chpter"> 
                <option value="" disabled selected hidden>Chapter<?php ?></option>
                    <?php

                    ?>
            </select> -->
            <?php 

            ?>
        </div>
        
    </section>
    <section >

          <?php 
          foreach ($pages as $halaman): 
          ?>
          <img src="<?php echo"komik/$judul/$chapter/".$halaman['pages']?>"  width= "100%" height="auto"alt=""  >
          <?php endforeach; ?>

    </section>
  </body>
</html>
