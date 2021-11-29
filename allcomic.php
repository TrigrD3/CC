<?php 

session_start();


include "head.php";
require "config.php";

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

  <!-- all comic -->
  <section>
<div class="new-released">
  <div class="container">
    <h1>All Comic</h1>
    <hr>
    <div class="row">
    <?php foreach ($komik as $row) : ?>
      <div class="col">
      <div class="card" style="width: 300px">
      <a href="infokomik.php?id=<?= $row['id']; ?>"><?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['cover'] ).'" width= "auto" height="370px" class="card-img-top"/>';?></a>
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
  <!-- akhir all comic -->
  </body>
</html>
