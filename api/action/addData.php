<?php
include_once "../connection.php";

function registereddAPi()
{
    return ["auth_fdsgkmsjf983rj32rjndsk", "auth_kjtormg98j3jfdkf293", "auth_asmd89njda012ns000"];
}

function cek($input)
{
    if (isset($input['api_key'])) {
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

function upload($data)
{
    global $connection;

    $type = $data['type'];
    $name = strtolower($data['name']);
    $username = strtolower($data['username']);
    $password = $data['password'];

    $db = [
        "admin",
        "moderator",
        "user"
    ];

    $selectDb = $db[$type];

    if (isset($data['class'])) {
        $data = mysqli_query($connection, "INSERT INTO $selectDb (name,username,password,class) VALUES ('$name','$username','$password','{$data['class']}')");
    } else {
        $data = mysqli_query($connection, "INSERT INTO $selectDb (name,username,password) VALUES ('$name','$username','$password')");
    }

    if ($data) {
        jsonOutput("success", "Success add $selectDb", null);
    } else {
        jsonOutput("fail", "Failed add $selectDb", null);
    }
}

if (cek($_GET)) {
    upload($_GET);
} else {
    jsonOutput("fail", "Invalid Api key!", null);
}
