<?php

session_start();
include_once "../config.php";

if (isset($_SESSION['username'])) {
    $ch = curl_init();
    $url = api . "/auth/logout.php";
    $apikey = api_key;
    $user = $_SESSION['username'];
    $userAgent = 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:17.0) Gecko/20100101 Firefox/17.0';
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_URL, $url . "?user=$user&table=user&api_key=$apikey");
    curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
    $output = curl_exec($ch);
    $json = json_decode($output);
    curl_close($ch);

    if ($json->status == 'success') {
        session_destroy();
        header('Location:login');
    } else {
        echo $json->message;
    }
} else {
    header('Location:login');
}
