<?php
include_once "../connection.php";
if (isset($_SESSION['username']) && $_SESSION['role'] == 'moderator') {
    $unem = $_SESSION['username'];
    $cek = mysqli_query($connection, "SELECT login FROM moderator WHERE username='$unem'");
    $cek = mysqli_fetch_row($cek);
    if ($cek[0] != 1) {
        header('location:logout');
    }
} else {
    header('location:login');
}
