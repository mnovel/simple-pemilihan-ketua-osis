<?php
include_once "../connection.php";

function registereddAPi()
{
    return ["auth_fdsgkmsjf983rj32rjndsk", "auth_kjtormg98j3jfdkf293", "auth_asmd89njda012ns000"];
}

function cek($input)
{
    if (isset($input['api_key']) && isset($input['user']) && isset($input['table'])) {
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

function logout($data)
{
    global $connection;
    $cek = mysqli_query($connection, "UPDATE {$data['table']} SET login='0', ip='0', location='null' WHERE username='{$data['user']}'");
    if ($cek) {
        return jsonOutput("success", "Success logout from your account", null);
    } else {
        return jsonOutput("failed", "Failed logout from your account", null);
    }
}

if (cek($_GET)) {
    logout($_GET);
} else {
    jsonOutput("fail", "Invalid Api key!", null);
}
