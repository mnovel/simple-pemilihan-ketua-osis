<?php
session_start();
include_once "../../config.php";
include_once "../../csrf.php";


if (!empty($_POST['username'])) {
    if (hash_equals($csrf, $_POST['csrf'])) {
        $ch = curl_init();
        $url = api . "/auth/loginUser.php";
        $apikey = api_key;
        $user = $_POST['username'];
        $password = $_POST['password'];
        $userAgent = 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:17.0) Gecko/20100101 Firefox/17.0';
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_URL, $url . "?user=$user&pass=$password&api_key=$apikey");
        curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
        $output = curl_exec($ch);
        $json = json_decode($output);
        curl_close($ch);
        if ($json->status == 'success') {
            $_SESSION['username'] = $json->data->username;
            $_SESSION['name'] = $json->data->name;
            $_SESSION['ip'] = $json->data->ip;
            $_SESSION['location'] = $json->data->location;
            $_SESSION['class'] = $json->data->class;
            $_SESSION['role'] = 'user';
            echo 'success';
        } else {
            echo $json->message;
        }
    } else {
        echo "CSRF Token Failed!";
    }
}
