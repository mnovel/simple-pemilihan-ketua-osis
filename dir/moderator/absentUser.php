<?php
session_start();
include_once "class/loginSession.php";
include_once "../connection.php";
include_once "../csrf.php";


$username = $_POST['username'] ?? null;
$csrf_ = $_POST['csrf'] ?? null;

if ($username == null | $csrf_ == null) {
    echo "Error";
    die;
}

if (!hash_equals($csrf, $csrf_)) {
    echo "Error, CSRF Token Failed!";
    die;
}

function cekAbsen($username)
{
    global $connection;
    $query = mysqli_query($connection, "SELECT absent FROM user WHERE username='$username'");
    $cek = mysqli_num_rows($query);
    if ($cek > 0) {
        $fetch = mysqli_fetch_row($query);
        if ($fetch[0] == 1) {
            echo "Username dengan NISN $username telah absen";
            die;
        }
    }
}

cekAbsen($username);

$query = mysqli_query($connection, "UPDATE user SET absent='1' WHERE username ='$username'");
$cek = mysqli_num_rows($query);
if ($cek > 0) {
    echo "- Absen berhasil dengan NISN: $username";
} else {
    echo "Gagal absen dengan NISN: $username, data tidak ditemukan";
}
