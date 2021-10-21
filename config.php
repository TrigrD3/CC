<?php 
// koneksi database
$conn = mysqli_connect('localhost','root1','');

mysqli_select_db($conn,'honbox');

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

   