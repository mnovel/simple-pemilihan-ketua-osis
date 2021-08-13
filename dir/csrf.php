<?php

class csrf
{
    public static function token()
    {
        if (empty($_SESSION['key']))
            $_SESSION['key'] = bin2hex(random_bytes(32));
        return hash_hmac('sha256', 'this is some string: index.php', $_SESSION['key']);
    }
}

$csrf = csrf::token();
