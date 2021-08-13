<?php
require_once "../config.php";

if (!empty($_POST['idCalon'])) {
    $idcalon =  $_POST['idCalon'];
    $idUser =  $_POST['idUser'];
    $check = mysqli_fetch_row(mysqli_query($koneksi, "SELECT user_activation FROM user WHERE id ='$idUser'"));
    if ($check[0] == 3) {
        $sql = mysqli_query($koneksi, "INSERT INTO coblos (id_calon) values ('$idcalon')");
        $sql .= mysqli_query($koneksi, "UPDATE user SET user_activation = 0 WHERE id = '$idUser'");
        if ($sql) {
            echo 'Sukses';
        } else {
            echo 'Gagal terhubung dengan database';
        }
    } else {
        echo   'Gagal, sebelumnya anda telah memilih';
    }
}
