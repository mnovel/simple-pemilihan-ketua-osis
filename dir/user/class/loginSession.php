<?php
include_once "../connection.php";
session_start();
$ch = curl_init();
$url = api . "/action/server.php";
$apikey = api_key;
$userAgent = 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:17.0) Gecko/20100101 Firefox/17.0';
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_URL, $url . "?type=get&api_key=$apikey");
curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
$output = curl_exec($ch);
$status = json_decode($output);
curl_close($ch);


if (isset($_SESSION['username']) && $_SESSION['role'] == 'user' && $status->data == 1) {
    $unem = $_SESSION['username'];
    $cek = mysqli_query($connection, "SELECT login,absent,status_vote FROM user WHERE username='$unem'");
    $cek = mysqli_fetch_row($cek);
    if ($cek[0] != 1) {
        setcookie('alert', "toastr.error('You haven't logged in, please login first!')", time() + 5, '/');
        header('location:logout');
    }
    if ($cek[1] != 1) {
        setcookie('alert', "toastr.error('Your account is not active, please absent first!')", time() + 5, '/');
        header('location:logout');
    }
    if ($cek[2] != 0) {
        setcookie('alert', "toastr.error('You have collected answers!, if an error occurs please contact the committee')", time() + 5, '/');
        header('location:logout');
    }
} else if ($status->data == 0) {
    setcookie('alert', "toastr.error('The server is not active, please wait a few minutes')", time() + 5, '/');
    header('location:logout');
} else {
    header('location:login');
}
