<?php 
// koneksi database
$port = $_SERVER['WEBSITE_MYSQL_PORT'];
$server = "localhost:$port";
$user = "azure";
$password = "6#vWHD_$";
$db = "localdb";


$conn = mysqli_connect($server, $user, $password, $db);

mysqli_select_db($conn,'honbox');

// $conn = new mysqli($_SERVER['honbox.c9p2nzfuehbl.ap-southeast-1.rds.amazonaws.com'], $_SERVER['trigrd'], $_SERVER['byzantine123'], $_SERVER['honbox'], $_SERVER['3306']);

function registrasi ($data) {
    global $conn;
    $username = strtolower(stripslashes($data["username"]));
    $email = $data ["email"];
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $passwordconf = mysqli_real_escape_string($conn, $data["passwordconf"]);

    // cek username sudah ada atau belum 
    $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");
    if(mysqli_fetch_assoc($result)){
        echo "<script>
                alert('username  sudah terdaftar!')
            </script>";
            return false;
    }
    
    // cek konfirmasi password
    if($password !== $passwordconf) {
        echo "<script>
            alert('konfirmasi password tidak sesuai!');
        </script>";
        return false;
    }
    
    //enkripsi password 
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan userbaru ke database 
    mysqli_query($conn, "INSERT INTO users VALUES('','$username','$email','$password')");
    return mysqli_affected_rows($conn);


}
?>   

   