<?php
session_start();
include_once "class/loginSession.php";
include_once "../connection.php";
include_once "../csrf.php";

if (isset($_GET['data']) && isset($_GET['csrf'])) {

    if (!hash_equals($csrf, $_GET['csrf'])) {
        setcookie('alert', "toastr.error('CSRF Token Failed!')", time() + 5, '/');
        header("Location:user");
        die;
    }

    $data = $_GET['data'];

    $query = mysqli_query($connection, "UPDATE user SET absent='0', status_vote='0' WHERE username='$data'");
    if ($query) {
        $query2 = mysqli_query($connection, "DELETE FROM vote WHERE username='$data'");
        if ($query) {
            setcookie('alert', "toastr.success('Success reset user')", time() + 5, '/');
            header("Location:user");
        } else {
            setcookie('alert', "toastr.error('Failed reset user!')", time() + 5, '/');
            header("Location:user");
        }
    } else {
        setcookie('alert', "toastr.error('Failed reset user!')", time() + 5, '/');
        header("Location:user");
    }
} else {
    setcookie('alert', "toastr.error('CSRF Tokens and Data cannot be null!')", time() + 5, '/');
    header("Location:user");
}
