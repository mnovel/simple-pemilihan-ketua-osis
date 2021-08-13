<?php
session_start();
include_once "class/loginSession.php";
include_once "../csrf.php";

if (isset($_GET['value']) && isset($_GET['csrf'])) {

    if (!hash_equals($csrf, $_GET['csrf'])) {
        setcookie('alert', "toastr.error('CSRF Token Failed!')", time() + 5, '/');
        header("Location:settings");
        die;
    }

    $ch = curl_init();
    $url = api . "/action/server.php";
    $apikey = api_key;
    $value = $_GET['value'];
    $userAgent = 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:17.0) Gecko/20100101 Firefox/17.0';
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_URL, $url . "?type=update&value=$value&api_key=$apikey");
    curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
    $output = curl_exec($ch);
    $status = json_decode($output);
    curl_close($ch);

    if ($status->status == 'success') {
        setcookie('alert', "toastr.success('$status->message!')", time() + 5, '/');
        header("Location:settings");
        die;
    } else {
        setcookie('alert', "toastr.error('$status->message!')", time() + 5, '/');
        header("Location:settings");
        die;
    }
}
