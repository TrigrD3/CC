<?php
include "config.php";
include "head.php";


if(!empty($_POST)){
    $judul= $_POST['judul'];
    $jdl=mysqli_query($conn, "SELECT * FROM komik WHERE judul='$judul'");
    if (mysqli_num_rows($jdl) === 1){
      echo "<script> alert('Manga sudah terdaftar!'); </script>";
    }
    else {
      $rating= $_POST['rating'];
      $author= $_POST['author'];
      $genre= $_POST['genre'];
      $release_date= $_POST['release'];
      $publisher= $_POST['epublisher'];
      $synopsis = mysqli_real_escape_string($conn, $_POST['summary']);
        if(!empty($_FILES['image']['tmp_name'])){
          $cover = addslashes(file_get_contents($_FILES['image']['tmp_name']));
          $q="INSERT INTO komik (judul,cover,rating,author,genre,release_date,publisher,synopsis) VALUES ('$judul','$cover','$rating','$author','$genre','$release_date','$publisher','$synopsis')";
          $query = mysqli_query($conn, $q);
        }
    }
}
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
    <link rel="stylesheet" href="assets/styleinfo.css" />

    <!-- google font -->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />

    <!-- font awesome -->
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css" />

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />

    <!-- Font khand -->
    <link href='https://fonts.googleapis.com/css?family=Khand' rel='stylesheet'>
    <title>Tambah Komik</title>
  </head>
  <body>
    <section>
    <form action="" method="post" enctype="multipart/form-data">
      <div class="container">
        <table>
          <tr>
            <td>Title</td>
            <td><input type="text" name="judul" required></td>
          </tr>
          <tr>
            <td>Image</td>
            <td><input type="file" name="image" required></td>
          </tr>
            <tr>
            <td>Rating</td>
            <td><input type="text" name="rating" required></td>
          </tr>
          <tr>
            <td>Author</td>
            <td><input type="text" name="author" required></td>
          </tr>
          <tr>
            <td>Genre</td>
            <td><input type="text" name="genre" required></td>
          </tr>
          <tr>
            <td>Release</td>
            <td><input type="date" name="release" required></td>
          </tr>
          <tr>
            <td>Publisher</td>
            <td><input type="text" name="epublisher" required></td>
          </tr>
          <tr>
            <td>Summary</td>
            <td><textarea name="summary" id="sumry" cols="50" rows="5" required></textarea></td>
          </tr>
          <tr>
            <td></td>
            <td><button type="submit">Save</button></td>
          </tr>
        </table>
      </div>
    </form>
    </section>
  </body>
</html>