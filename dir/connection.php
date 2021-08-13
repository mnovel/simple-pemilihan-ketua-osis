<?php

include_once "config.php";

$connection = mysqli_connect(constant("db_host"), constant("db_user"), constant("db_pass"), constant("db_name"));

if (!$connection) {
    echo mysqli_connect_error($connection);
}
