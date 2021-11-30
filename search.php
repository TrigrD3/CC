<?php 

session_start();
include "head.php";
require "config.php";
$i = 0;
$value=$_GET['search'];
$search = mysqli_query($conn,"SELECT * FROM komik WHERE judul LIKE '%" . $value . "%' ");
$searchdata = mysqli_fetch_array($search);

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
  <div class="container">
    <hr>
    <!-- perulangan untuk menampilkan data dari database -->
    <?php if ($searchdata == 0) {
        echo "<h1> Search not found </h1>";
    }
    else {?>
    <div class="row">
    <?php foreach ($search as $row) :
    ?>
      <div class="col" style="height: 600px">
      <div class="card" style="width: 18rem;">
      <a href="infokomik.php?id=<?= $row['id']; ?>"><?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['cover'] ).'" width= "250px" height="370px" class="card-img-top"/>';?></a>
  <div class="card-body">
    <h5 class="card-title"><?= $row['judul']; ?> </h5>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">
      <a href="#" class="card-link text-decoration-none"><?= $row['author']; ?></a> </li>
      <li class="list-group-item">
      <a href="#" class="card-link text-decoration-none"><?= $row['publisher']; ?></a> </li>
  </ul>
</div>
    </div>
    <?php endforeach; ?>
  </div>
</div>
<?php }?>
    </section>
    <!-- akhir most viewed -->
  </body>
</html>
