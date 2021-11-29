<?php 
session_start();
include "head.php";
require "config.php";

$id = $_GET['id']; //Sesuaikan dengan id manga
$query = mysqli_query($conn, "SELECT * FROM komik WHERE id = $id");
$data = mysqli_fetch_array($query);

// $qjudul = mysqli_query($conn, "SELECT judul FROM komik WHERE id = $id");
// $judul = mysqli_fetch_row($qjudul);
// var_dump($judul);
$chapter = mysqli_query($conn, "SELECT chapter FROM isi_komik GROUP BY chapter ");
$i = 0;
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
    <link rel="stylesheet" href="assets/Style.css" />

     <!-- CSS info -->
     <link rel="stylesheet" href="assets/styleinfo.css" />

    <!-- google font -->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />

    <!-- font awesome -->
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css" />

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />

    <!-- Font khand -->
    <link href='https://fonts.googleapis.com/css?family=Khand' rel='stylesheet'>
    <title>Info Komik</title>
  </head>
  <body>
    <section>
      <p class="judul">
        <?php echo $data['judul']; ?><!-- Judul -->
      </p><hr>
      <div class="container">
        <table>
          <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $data['cover'] ).'" width= "250px" height="370px"/>';?>
            <td>Rating</td>
            <td>: <?php echo $data['rating']; ?></td>
          </tr>
          <tr>
            <td>Author</td>
            <td>: <?php echo $data['author']; ?></td>
          </tr>
          <tr>
            <td>Genre</td>
            <td>: <?php echo $data['genre']; ?></td>
          </tr>
          <tr>
            <td>Release</td>
            <td>: <?php echo date("d-m-Y", strtotime($data['release_date'])); ?></td>
          </tr>
          <tr>
            <td>Publisher</td>
            <td>: <?php echo $data['publisher']; ?></td>
          </tr>
        </table>
        <a href="halamanbaca.php?id=<?= $data['id']; ?>"><button>Read First</button></a>
        <a href="index.php"><button>Read Last</button></a>

        <a href="editkomik.php?id=<?= $data['id'];?>"><button>Edit</button></a>
        <a href="insertchapter.php?id=<?= $data['id'];?>"><button>Tambah Chapter</button></a>

      </div>
    </section>
    <section id="sec2">
      <div>
      <h1>SUMMARY</h1>
      <p><?php echo $data['synopsis']?> <!-- Synopsis manga --></p>
      </div>
<div >
    <h1>Chapters</h1>
    <hr>
    <div class="row">
    <?php foreach ($chapter as $row) : {
      
      $i++;
      }
      ?>
      
      <a href="halamanbaca.php?id=<?php echo $id?>&chapter=<?= $row['chapter']; ?>"><button>Chapter <?php echo $i ?></button></a>
        <?php endforeach; ?>
      </div>

    </section>
  </body>
</html>
