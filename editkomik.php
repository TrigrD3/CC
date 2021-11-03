<?php 
include "head.php";
$db = new mysqli("localhost","root", "", "cc"); 
if ($db->connect_error) {  
  die("Connection failed: " . $db->connect_error);  
}
$id = 1; //Sesuaikan dengan id manga
$query = mysqli_query($db, "SELECT * FROM infokomik WHERE id = $id");
$data = mysqli_fetch_array($query);

if (isset($_POST ['save'])){
    global $db;
    $judul= $_POST['judul'];
    $img= $_POST['image'];
    $rating= $_POST['rating'];
    $author= $_POST['author'];
    $genre= $_POST['genre'];
    $release= $_POST['release'];
    $epublisher= $_POST['epublisher'];
    $sumry= $_POST['summary'];

    $q="UPDATE infokomik
        SET title ='$judul',
            displayimg ='$img',
            rating ='$rating',
            author ='$author',
            genre ='$genre',
            release ='$release',
            epublisher ='$epublisher',
            summary ='$sumry' 
        WHERE id=$id";
    mysqli_query($db, $q);
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
    <form method="post">
      <div class="container">
        <table>
          <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $data['displayimg'] ).'" width= "250px" height="370px"/>';?>
          <tr>
            <td>Title</td>
            <td><input type="text" name="judul" value="<?php echo $data['title']; ?>"></td>
          </tr>
          <tr>
            <td>Image</td>
            <td><input type="file" name="image"></td>
          </tr>
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
            <td><input type="date" name="release" value="<?php echo $data['release']; ?>"></td>
          </tr>
          <tr>
            <td>English Publisher</td>
            <td><input type="text" name="epublisher" value="<?php echo $data['epublisher']; ?>"></td>
          </tr>
          <tr>
            <td>Summary</td>
            <td><textarea name="summary" id="sumry" cols="50" rows="5"><?php echo $data['summary'];?></textarea></td>
          </tr>
          <tr>
            <td></td>
            <td><button id="save" name="save">Save</button></td>
          </tr>
        </table>
      </div>
    </form>
    </section>
  </body>
</html>
