<?php
session_start();
include_once "class/loginSession.php";
include_once "../connection.php";
include_once "../csrf.php";

if (empty($_GET['candidate']) && empty($_GET['csrf']))
    die;

if (!hash_equals($csrf, $_GET['csrf'])) {
    setcookie('alert', "toastr.error('CSRF Token Failed!')", time() + 5, '/');
    header('index.php');
    die;
}

$ch = curl_init();
$url = api . "/action/submitForm.php";
$apikey = api_key;
$candidate = $_GET['candidate'];
$username = $_SESSION['username'];
$class = substr($_SESSION['class'], 0, 2);
$className = urlencode($_SESSION['class']);
$time = time();
$userAgent = 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:17.0) Gecko/20100101 Firefox/17.0';
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_URL, $url . "?username=$username&class=$class&class_name=$className&time=$time&candidate=$candidate&api_key=$apikey");
curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
$output = curl_exec($ch);
$json = json_decode($output);
curl_close($ch);

if ($json->status == 'fail') {
    setcookie('alert', "toastr.error('$json->message')", time() + 5, '/');
    header('location:logout');
} else {
    setcookie('alert', "toastr.success('$json->message')", time() + 5, '/');
    header('location:logout');
}
