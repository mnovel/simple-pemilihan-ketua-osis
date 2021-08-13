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
    mysqli_query($connection, "UPDATE user SET absent='1' WHERE class ='$data'");
    setcookie('alert', "toastr.success('Success absent user')", time() + 5, '/');
    header("Location:className");
}
