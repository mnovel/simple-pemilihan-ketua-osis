<?php
include_once "connection.php";
class header
{
    public static function getData($name)
    {
        global $connection;
        $meta = mysqli_query($connection, "SELECT * FROM settings WHERE name='$name'");
        $meta = mysqli_fetch_row($meta);
        return $meta[2];
    }
}
