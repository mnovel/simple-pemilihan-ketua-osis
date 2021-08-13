<?php
session_start();
include_once "class/loginSession.php";
include_once "../connection.php";
include_once "../csrf.php";


if (isset($_GET['class']) && isset($_GET['csrf'])) {
    if (!hash_equals($csrf, $_GET['csrf'])) {
        setcookie('alert', "toastr.error('CSRF Token Failed!')", time() + 5, '/');
        header("Location:className");
        die;
    }

    $class = $_GET['class'];
    $type = $_GET['type'];

    if ($type == 'mass') {
        $cek = mysqli_query($connection, "UPDATE user SET login='0', ip='0', absent='0', status_vote='0' WHERE class LIKE '$class%'");
        if ($cek) {
            $cek2 = mysqli_query($connection, "DELETE FROM vote WHERE class_name LIKE '$class%'");
            setcookie('alert', "toastr.success('Success reset vote')", time() + 5, '/');
        } else {
            setcookie('alert', "toastr.error('failed reset vote, ')" . mysqli_error($connection), time() + 5, '/');
        }
    } else {
        $cek = mysqli_query($connection, "UPDATE user SET login='0', ip='0', absent='0', status_vote='0' WHERE class = '$class'");
        if ($cek) {
            $cek2 = mysqli_query($connection, "DELETE FROM vote WHERE class_name = '$class'");
            setcookie('alert', "toastr.success('Success reset vote')", time() + 5, '/');
        } else {
            setcookie('alert', "toastr.error('failed reset vote, ')" . mysqli_error($connection), time() + 5, '/');
        }
    }

    header("Location:className");
} else {
    setcookie('alert', "toastr.error('CSRF Token and Data can't be Null!')", time() + 5, '/');
    header("Location:className");
}
