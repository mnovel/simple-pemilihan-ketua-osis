<?php
session_start();
include_once "../connection.php";

$ip = constant("ip");

function registereddAPi()
{
    return ["auth_fdsgkmsjf983rj32rjndsk", "auth_kjtormg98j3jfdkf293", "auth_asmd89njda012ns000"];
}

function cek($input)
{
    if (isset($input['api_key']) && isset($input['user']) && isset($input['pass'])) {
        $apiKey = $input['api_key'];
        if (in_array($apiKey, registereddAPi())) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function jsonOutput($status, $message, $data)
{
    $data = [
        "status" => $status,
        "message" => $message,
        "data" => $data
    ];
    header('Content-type: application/json');
    echo json_encode($data);
}

function loginNumCek($login)
{
    if (mysqli_num_rows($login) > 0) {
        return true;
    } else {
        return false;
    }
}

function cekBfSession()
{
    if (isset($_SESSION['invalidLogin'])) {
        if ($_SESSION['invalidLogin'] > 6) {
            if ($_SESSION['time'] <= time()) {
                session_destroy();
                return false;
            } else {
                return true;
            }
        } else {
            $_SESSION['invalidLogin'] =  $_SESSION['invalidLogin'] + 1;
            $_SESSION['time'] = time() + 60;
            return false;
        }
    } else {
        $_SESSION['invalidLogin'] = 1;
        return false;
    }
}

function cekLogin($data, $username)
{
    global $connection, $ip;
    $fetch = mysqli_fetch_row($data);
    $result = [
        "name" => $fetch[1],
        "username" => $fetch[2],
        "login" => $fetch[4],
        "ip" => $fetch[5],
        "location" => $fetch[6]
    ];

    if ($fetch[4] == 0 | $ip == $fetch[5]) {
        $date = time();
        mysqli_query($connection, "UPDATE admin SET ip='${ip}',login='1' WHERE username='$username'");
        mysqli_query($connection, "INSERT INTO log (username,type,ip,location,time) VALUES ('$username','admin','$ip','null','$date')");
        return jsonOutput("success", "Login user success", $result);
    } else if ($fetch[4] != 0) {
        return jsonOutput("fail", "Your account is still logged in, please logout!", $result);
    }
}

function loginVerify($username, $password)
{
    global $connection;
    $login = mysqli_query($connection, "SELECT * FROM admin WHERE username='$username' AND password='$password'");
    if (loginNumCek($login)) {
        cekLogin($login, $username);
    } else {
        if (cekBfSession()) {
            return jsonOutput("fail", "Wait for 1 minute for the next process", null);
        } else {
            return jsonOutput("fail", "User not found", null);
        }
    }
}


if (cek($_GET)) {
    loginVerify($_GET['user'], $_GET['pass']);
} else {
    jsonOutput("fail", "Invalid Api key!", null);
}
