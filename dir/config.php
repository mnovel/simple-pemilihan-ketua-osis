<?php

function getIPAddress()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

function https()
{
    $https = $_SERVER['HTTPS'] ?? 'off';
    if ($https == 'on') {
        return 'https://';
    } else {
        return 'http://';
    }
}

define('url',  https() . $_SERVER['SERVER_NAME'] . "/pilketos/v2/dir");
define('api',  https() . $_SERVER['SERVER_NAME'] . "/pilketos/v2/api");
define("ip", getIPAddress());
define('api_key', 'auth_fdsgkmsjf983rj32rjndsk');

define('DIR', __DIR__);
define('FILE', __FILE__);
define('LOGFILE', __DIR__);

define('db_user', 'magerin_pilketos');
define('db_pass', 'Fm_;z@,Ep9e8');
define('db_host', 'localhost');
define('db_name', 'magerin_pilketos');

// define('db_user', 'root');
// define('db_pass', 'B4ngs4d0');
// define('db_host', 'localhost');
// define('db_name', 'pilketos2');

// Weasty - Web Application Security
// Basic PHP Web Application Security
// Anti Malicious Code
// Copyright (c)2019 - Afrizal F.A - ICWR-TECH

//--------------- Config ---------------------//
error_reporting(0);
@clearstatcache();
@ini_set('error_log', 'NULL');
@ini_set('log_errors', 0);
@ini_set('max_execution_time', 0);
@ini_set('output_buffering', 0);
@ini_set('display_errors', 0);
date_default_timezone_set('Asia/Jakarta');

$weasty_secret_file = LOGFILE . "/heker.txt";
$alert = "<!-- DOCTYPE html -->
<!-- Security By ICWR-TECH -->
<html>
<head>
<title>Threat Detected</title>
<link rel='icon' href='https://upload.wikimedia.org/wikipedia/commons/7/70/Forbidden_sign.png'>
<style>html { background: black; color: white; } a { text-decoration: lined; color: white; }</style>
</head>
<body>
    <table height='100%' width='100%'>
        <td align='center'>
            <b><i>
            <font size='20'>Threat Detected</font>
            <br><br>
            <img height='250' src='https://upload.wikimedia.org/wikipedia/commons/7/70/Forbidden_sign.png'/>
            <br><br>
            <font size='5'>Your Ip Blocked In 30 Second</font>
            <br><br>
            Your Request Is Blocked Server Detect The Malicious Code, Threat Blocker Is Actived
            <br><br>
            Powered By <a href='https://github.com/ICWR-TECH'>ICWR-TECH</a>
            </i><b>
        </td>
    </table>
</body>
</html>
";
//--------------------------------------------//

function weasty_logger($ip)
{
    $x = fopen(LOGFILE . "/threat_log", "a");
    fwrite($x, $ip . " ( " . $_SERVER['HTTP_USER_AGENT'] . " " . date("r") . " ) " . " => " . $_SERVER['REQUEST_URI'] . "\n");
    fclose($x);
}
function weasty_add_ip($ip, $time)
{
    global $weasty_secret_file;
    $f = fopen($weasty_secret_file, "a");
    fwrite($f, $ip . "^^^" . $time . "\n");
    fclose($f);
    weasty_logger($ip);
}

function weasty_del_ip($ip, $time)
{
    global $weasty_secret_file;
    $file = file_get_contents($weasty_secret_file);
    $f = fopen($weasty_secret_file, "w");
    fwrite($f, str_replace($ip . "^^^" . $time . "\n", "", $file));
    fclose($f);
}

$malicious = "/alert\(|alert \(|<|>|\"|\||\'|information_schema|\/var|\/etc|\/home|file_get_contents|shell_exec|table_schema|user\(\)|user \(\)/";
$weasty_user_agent = "/Mozilla|Chrome|Google|WhatsApp|Telegram/";

if (!empty($_GET)) {
    foreach ($_GET as $weasty_get_request) {
        if (preg_match("$malicious", $weasty_get_request)) {
            header('HTTP/1.1 404 Not Found');
            include_once url . '/error.php';
            if (!preg_match($_SERVER['REMOTE_ADDR'], file_get_contents($weasty_secret_file))) {
                weasty_add_ip($_SERVER['REMOTE_ADDR'], time());
            }
            exit;
        }
    }
}

if (!empty($_POST)) {
    foreach ($_POST as $weasty_post_request) {
        if (preg_match("$malicious", $weasty_post_request)) {
            header('HTTP/1.1 404 Not Found');
            include_once url . '/error.php';
            if (!preg_match($_SERVER['REMOTE_ADDR'], file_get_contents($weasty_secret_file))) {
                weasty_add_ip($_SERVER['REMOTE_ADDR'], time());
            }
            exit;
        }
    }
}

if (!empty($_FILES)) {
    foreach ($_FILES as $weasty_files_request) {
        if (preg_match("$malicious", $weasty_files_request)) {
            header('HTTP/1.1 404 Not Found');
            include_once url . '/error.php';
            if (!preg_match($_SERVER['REMOTE_ADDR'], file_get_contents($weasty_secret_file))) {
                weasty_add_ip($_SERVER['REMOTE_ADDR'], time());
            }
            exit;
        }
    }
}

if (preg_match("/" . $_SERVER['REMOTE_ADDR'] . "/", file_get_contents($weasty_secret_file))) {
    $weasty_file = explode("\n", file_get_contents($weasty_secret_file));
    foreach ($weasty_file as $weasty_ip_line) {

        if (empty($weasty_ip_line)) {
            continue;
        }

        $weasty_ip_scan = explode('^^^', $weasty_ip_line);
        if (time() > $weasty_ip_scan[1] + 20) {
            if ($weasty_ip_scan[0] == $_SERVER['REMOTE_ADDR']) {
                weasty_del_ip($weasty_ip_scan[0], $weasty_ip_scan[1]);
            } else {
                continue;
            }
        } else {
            header('HTTP/1.1 404 Not Found');
            include_once url . '/error.php';
            exit;
        }
    }
}

if (!preg_match($weasty_user_agent, $_SERVER['HTTP_USER_AGENT'])) {
    weasty_add_ip($_SERVER['REMOTE_ADDR'], time());
    header('HTTP/1.1 404 Not Found');
    include_once url . '/error.php';
    exit;
}
