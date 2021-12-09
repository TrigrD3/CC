<?php 
require "config.php";
include "head.php";

if(!isset($_SESSION["status"])){
  $_SESSION["status"] = 0;
}

$i = 0;
$o = 0;

$trending=mysqli_query($conn,"SELECT * FROM komik ORDER BY rating DESC");
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

    <!-- google font -->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />

    <!-- font awesome -->
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css" />

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    <title>Home</title>
  </head>
  <body>
    <!-- most viewed -->
    <section>
<div class="most-viewed">
  <div class="container">
    <h1>Highest Rated</h1>
    <hr>
    <!-- perulangan untuk menampilkan data dari database -->
    
    <div class="row">
    <?php foreach ($trending as $row) :{
      $i++;
      if($i >4){
        break;
      }
    } ?>
      <div class="col" style="height: 600px">
      <div class="card" style="width: 18rem;">
      <a href="infokomik.php?id=<?= $row['id']; ?>"><?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['cover'] ).'" width= "250px" height="370px" class="card-img-top"/>';?></a>
  <div class="card-body">
    <h5 class="card-title"><?= $row['judul']; ?> </h5>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">
      <?= "Author : ".$row['author']; ?></li>
      <li class="list-group-item">
      <?= "Publisher : ".$row['publisher']; ?></li>
  </ul>
</div>
    </div>
    <?php endforeach; ?>
  </div>
</div>
    </section>
    <!-- akhir most viewed -->
<br>
    <!-- new released -->
    <section>
<div class="new-released">
  <div class="container">
    <h1>New Released</h1>
    <hr>
    <div class="row">
    <?php foreach ($komik2 as $row) :{
      $o++;
      if($o >4){
        break;
      }
    } ?>
      <div class="col">
      <div class="card" style="width: 18rem;">
      <a href="infokomik.php?id=<?= $row['id']; ?>"><?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['cover'] ).'" width= "250px" height="370px" class="card-img-top"/>';?></a>
  <div class="card-body">
    <h5 class="card-title"><?= $row['judul']; ?> </h5>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">
      <?= "Author : ".$row['author']; ?></li>
      <li class="list-group-item">
      <?= "Publisher : ".$row['publisher']; ?></li>
      </ul>
    </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
    </section>
  <!-- akhir new released -->
<section>

<a href="aboutus.php"><button type="button" class="btn text-center" style="color: aliceblue; ">About Us</button></a>

</section>
  </body>
</html>
