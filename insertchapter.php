<?php
include "head.php";
include "config.php";

$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM komik WHERE id = $id");
$data = mysqli_fetch_array($query);

if(!empty($_POST)){
    $judul= $_POST['judul'];
    $chapter= $_POST['chapter'];
    $direct = "komik/$judul/$chapter/";

    if (!is_dir($direct)){
      mkdir($direct,0777,true);
    }
    
    $extension=array('jpeg','jpg','png','gif');
    
    foreach ($_FILES['image']['tmp_name'] as $key => $value) {
      $filename=$_FILES['image']['name'][$key];
      $filename_tmp=$_FILES['image']['tmp_name'][$key];
      echo '<br>';
      $ext=pathinfo($filename,PATHINFO_EXTENSION);
  
      $finalimg='';
      if(in_array($ext,$extension))
      {
        if(!file_exists("$direct".$filename))
        {
          
        move_uploaded_file($filename_tmp, "$direct".$filename);
        $finalimg=$filename;
        }else
        {
           $filename=str_replace('.','-',basename($filename,$ext));
           $newfilename=$filename.time().".".$ext;
           move_uploaded_file($filename_tmp, "$direct".$newfilename);
           $finalimg=$newfilename;
        }



    $q="INSERT INTO isi_komik (judul,pages,chapter)
    VALUES ('$judul','$finalimg','$chapter')";
    $query=mysqli_query($conn, $q);

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
            <td><input type="text" name="judul" value="<?php echo $data['judul']; ?>"></td>
          </tr>
          <tr>
            <td>Image</td>
            <td><input type="file" name="image[]" multiple></td>
          </tr>
            <tr>
            <td>chapter</td>
            <td><input type="text" name="chapter" ></td>
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