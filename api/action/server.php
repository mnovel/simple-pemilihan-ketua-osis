<?php
include_once "../connection.php";

function registereddAPi()
{
    return ["auth_fdsgkmsjf983rj32rjndsk", "auth_kjtormg98j3jfdkf293", "auth_asmd89njda012ns000"];
}

function cek($input)
{

    $apiKey = $input['api_key'] ?? null;
    if (in_array($apiKey, registereddAPi())) {
        return true;
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

function serverStatus($data)
{

    $type = $data['type'];
    $value = $data['value'] ?? null;


    function insert($value)
    {
        global $connection;

        $status = [
            'non activation',
            'activation'
        ];

        $query = mysqli_query($connection, "UPDATE server SET status='$value' WHERE id='1'");
        if ($query) {
            jsonOutput("success", "Success $status[$value] server", null);
        } else {
            jsonOutput("failed", "Failed $status[$value] server", null);
        }
    }

    function get()
    {
        global $connection;
        $query = mysqli_query($connection, "SELECT * FROM server");
        $fetch = mysqli_fetch_row($query);
        jsonOutput("success", "Success get status server", $fetch[1]);
    }

    if ($type == 'get') {
        get();
    }

    if ($type == 'update') {
        insert($value);
    }
}

if (cek($_GET)) {
    serverStatus($_GET);
} else {
    jsonOutput("fail", "Invalid Api key!", null);
}
