<?php 
// koneksi database azure
$port = $_SERVER['WEBSITE_MYSQL_PORT'];
$server = "localhost:$port";
$user = "azure";
$password = "6#vWHD_$";
$db = "localdb";


$conn = mysqli_connect($server, $user, $password, $db);

// koneksi database lokal
// $conn = mysqli_connect('localhost','root','');

// mysqli_select_db($conn,'honbox');

// var
$komik = mysqli_query($conn, "SELECT * FROM komik"); 
$komik2 = mysqli_query($conn, "SELECT * FROM komik ORDER BY id DESC"); 
$pages = mysqli_query($conn, "SELECT pages FROM isi_komik");


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
    mysqli_query($conn, "INSERT INTO users VALUES(NULL,'$username','$email','$password','')");
    return mysqli_affected_rows($conn);


}

function cek_admin($username){
    global $conn;
    $stat = mysqli_query($conn,"SELECT * FROM users WHERE username = $username");
    $status = mysqli_fetch_array($stat);
    if($status['status'] == 1){
        $_SESSION["admin"] = true;
    }
    else{
        $_SESSION["admin"] = false;
    }
}

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;

    }
    return $rows;
}

?>   

   