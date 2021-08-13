<?php

include_once "connection.php";

function creatJson($data)
{
    header('Content-Type: application/json');
    echo json_encode($data);
}

function getVote()
{
    global $connection;
    $cek = mysqli_query($connection, "SELECT no AS candidate, COUNT(vote.candidate) as total
    FROM candidate
    LEFT JOIN vote
    ON vote.candidate = no
    GROUP BY no");
    if (mysqli_num_rows($cek) > 0) {
        $data = mysqli_fetch_all($cek);
        foreach ($data as $value) {
            $candidate[] =  "Candidate " . $value[0];
            $total[] = $value[1];
            $json['candidate'] = $candidate;
            $json['total'] = $total;
        }
        return $json;
    }
}

if (empty($_GET))
    die;
if ($_GET['data'] == 'all')
    creatJson(getVote());
if ($_GET['data'] == 'class')
    creatJson(getVote());
