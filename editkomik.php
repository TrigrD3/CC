<?php 
include "config.php";
include "head.php";

$id = $_GET['id']; //Sesuaikan dengan id manga
$query = mysqli_query($conn, "SELECT * FROM komik WHERE id = $id");
$data = mysqli_fetch_array($query);
if (!empty($_POST)){
    $judul= $_POST['judul'];
    if(!empty($_FILES['image']['tmp_name'])){
        $cover = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        $q="UPDATE komik SET cover ='$cover' WHERE id=$id";
        $query = mysqli_query($conn, $q);
    }
    $rating= $_POST['rating'];
    $author= $_POST['author'];
    $genre= $_POST['genre'];
    $release_date= $_POST['release'];
    $publisher= $_POST['epublisher'];
    $synopsis = mysqli_real_escape_string($conn, $_POST['summary']);
    $q="UPDATE komik
        SET judul ='$judul',
            rating ='$rating',
            author ='$author',
            genre ='$genre',
            release_date ='$release_date',
            publisher ='$publisher',
            synopsis ='$synopsis' 
        WHERE id=$id";
    $query = mysqli_query($conn, $q);
    $query = mysqli_query($conn, "SELECT * FROM komik WHERE id = $id");
    $data = mysqli_fetch_array($query);
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
    <title>Edit Komik</title>
  </head>
  <body>
    <section>
    <form action="" method="post" enctype="multipart/form-data">
      <div class="container">
        <table>
          <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $data['cover'] ).'" width= "250px" height="370px"/>';?>
          <tr>
            <td>Title</td>
            <td><input type="text" name="judul" value="<?php echo $data['judul']; ?>"></td>
          </tr>
          <tr>
            <td>Image</td>
            <td><input type="file" name="image"></td>
          </tr>
            <tr>
            <td>Rating</td>
            <td><input type="text" name="rating" value="<?php echo $data['rating']; ?>"></td>
          </tr>
          <tr>
            <td>Author</td>
            <td><input type="text" name="author" value="<?php echo $data['author']; ?>"></td>
          </tr>
          <tr>
            <td>Genre</td>
            <td><input type="text" name="genre" value="<?php echo $data['genre']; ?>"></td>
          </tr>
          <tr>
            <td>Release</td>
            <td><input type="date" name="release" value="<?php echo $data['release_date']; ?>"></td>
          </tr>
          <tr>
            <td>English Publisher</td>
            <td><input type="text" name="epublisher" value="<?php echo $data['publisher']; ?>"></td>
          </tr>
          <tr>
            <td>Summary</td>
            <td><textarea name="summary" id="sumry" cols="50" rows="5"><?php echo $data['synopsis'];?></textarea></td>
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
