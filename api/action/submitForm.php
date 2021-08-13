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

function cekValidVote($username)
{
    global $connection;
    $data = mysqli_query($connection, "SELECT status_vote FROM user WHERE username=$username");
    if (mysqli_num_rows($data) > 0) {
        $status = mysqli_fetch_row($data);
        if ($status[0] == 0) {
            return true;
        } else  if ($status[0] > 0) {
            return false;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function cekAfterVote($username)
{
    global $connection;
    $data = mysqli_query($connection, "SELECT * FROM vote WHERE username=$username");
    if (mysqli_num_rows($data) > 0) {
        return false;
    } else {
        return true;
    }
}

function addData($data)
{
    global $connection;
    if (cekValidVote($data['username']) && cekAfterVote($data['username'])) {
        $class = $data['class'];
        $className = $data['class_name'];
        $username = $data['username'];
        $candidate = $data['candidate'];
        $time = $data['time'];
        $data = mysqli_query($connection, "INSERT INTO vote (username,class,class_name,candidate,time) VALUE ('$username','$class','$className','$candidate','$time')");

        if ($data) {
            mysqli_query($connection, "UPDATE user SET status_vote='1' WHERE username='$username'");
            return jsonOutput('success', 'Thank you for joining the election of the student council chair ^_^.', null);
        } else {
            return jsonOutput("fail", "Error : Gagal menyimpan jawaban!. Terdapat error pada database, silahkan hubungi panitia", null);
        }
    } else {
        return jsonOutput("fail", "You have collected answers!, if an error occurs please contact the committee", null);
    }
}


if (cek($_GET)) {
    addData($_GET);
} else {
    jsonOutput("fail", "Invalid Api key!", null);
}
