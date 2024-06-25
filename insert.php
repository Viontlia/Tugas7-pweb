<?php
include("dbconnect.php");
session_start();

$jenis = isset($_GET['jenis-data']) ? $_GET['jenis-data'] : null;
$page = isset($_GET['page']) ? $_GET['page'] : null;

$insert = false; 

if ($jenis == 'mahasiswa') {

}  elseif($jenis == 'users')
{
    $user = $_POST['username'];
    $paswd = md5(sha1($_POST['paswd']));
    $email = $_POST['email'];
    $nama = $_POST['nama'];

    $insert = $k->query("INSERT INTO users (username,nama,email,paswd,active) VALUES ('".$user."','".$nama."','".$email."','".$paswd."',1)");
}
if ($insert) {
    header("Location: index.php?page=input-data");
    exit(); 
} else {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        echo "Insert data gagal<br>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input</title>
</head>
<body>
    <form action="insert.php?jenis-data=users&page=1" method="post">
        <input type="text" name="username" required placeholder="Username">
        <input type="text" name="nama" required placeholder="Nama Lengkap">
        <input type="email" name="email" required placeholder="Email">
        <input type="password" name="paswd" required placeholder="Password">
        <input type="submit" value="Simpan">
    </form>
</body>
</html>
