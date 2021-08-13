<?php
include_once "../connection.php";

function registereddAPi()
{
    return ["auth_fdsgkmsjf983rj32rjndsk", "auth_kjtormg98j3jfdkf293", "auth_asmd89njda012ns000"];
}

function cek($input)
{
    if (isset($input['api_key']) && isset($input['type'])) {
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

function getData($get)
{
    global $connection;
    $type = $get['type'];
    if ($type == 'all') {
        $data = htmlspecialchars(addslashes($get['data']));
        $order = htmlspecialchars(addslashes($get['order']));
        $res = mysqli_query($connection, "SELECT * FROM $data ORDER BY $order");
        $res2 = mysqli_fetch_all($res);
        return jsonOutput("success", "Success get data", $res2);
    } else if ($type == 'id') {
        $data = htmlspecialchars(addslashes($get['data']));
        $table = htmlspecialchars(addslashes($get['table']));
        $id = htmlspecialchars(addslashes($get['id']));
        $data = mysqli_query($connection, "SELECT * FROM $data WHERE $table ='$id'");
        $data = mysqli_fetch_all($data);
        return jsonOutput("success", "Success get data", $data);
    } else if ($type == 'class') {
        $res = mysqli_query($connection, "SELECT class FROM class GROUP BY class");
        $res2 = mysqli_fetch_all($res);
        return jsonOutput("success", "Success get data", $res2);
    }
}

if (cek($_GET)) {
    getData($_GET);
} else {
    jsonOutput("fail", "Invalid Api key!", null);
}
