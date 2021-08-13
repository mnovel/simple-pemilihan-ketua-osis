<?php
session_start();
include_once "class/loginSession.php";
include_once "../connection.php";
include_once "../csrf.php";


if (isset($_GET['data'])) {
    if (!hash_equals($csrf, $_GET['csrf'])) {
        setcookie('alert', "toastr.error('CSRF Token Failed!')", time() + 5, '/');
        header("Location:className");
        die;
    }

    $data = $_GET['data'];
    mysqli_query($connection, "DELETE FROM class WHERE name ='$data'");
    mysqli_query($connection, "DELETE FROM user WHERE class= '$data'");
    setcookie('alert', "toastr.success('Success delete admin')", time() + 5, '/');
    header("Location:className");
}
