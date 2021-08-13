<?php
session_start();
include_once "../classHeader.php";
include_once "../config.php";
include_once "../csrf.php";

if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'admin')
        header('Location:index');
}

if (!empty($_POST['username'])) {
    if (hash_equals($csrf, $_POST['csrf'])) {
        $ch = curl_init();
        $url = api . "/auth/loginAdmin.php";
        $apikey = api_key;
        $user = $_POST['username'];
        $password = $_POST['password'];
        $userAgent = 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:17.0) Gecko/20100101 Firefox/17.0';
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_URL, $url . "?user=$user&pass=$password&api_key=$apikey");
        curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
        $output = curl_exec($ch);
        $json = json_decode($output);
        curl_close($ch);
        if ($json->status == 'success') {
            $_SESSION['username'] = $json->data->username;
            $_SESSION['name'] = $json->data->name;
            $_SESSION['ip'] = $json->data->ip;
            $_SESSION['location'] = $json->data->location;
            $_SESSION['role'] = 'admin';
            header('location:index');
        } else {
            setcookie('alert', "toastr.error('{$json->message}')", time() + 5, '/');
            header('Refresh:0');
        }
    } else {
        echo "CSRF Token Failed!";
        die;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= header::getData('title') ?></title>
    <!-- Primary Meta Tags -->
    <meta name="title" content="<?= header::getData('title') ?>">
    <meta name="description" content="<?= header::getData('title') ?>">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= constant("url") ?>">
    <meta property="og:title" content="<?= header::getData('title') ?>">
    <meta property="og:description" content="<?= header::getData('description') ?>">
    <meta property="og:image" content="<?= constant("url") . "/assets/img/" . header::getData('icon') ?>">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?= constant("url") ?>">
    <meta property="twitter:title" content="<?= header::getData('title') ?>">
    <meta property="twitter:description" content="<?= header::getData('description') ?>">
    <meta property="twitter:image" content="<?= constant("url") . "/assets/img/" . header::getData('icon') ?>">
    <link rel="shortcut icon" href="<?= constant("url") . "/assets/img/" . header::getData('icon') ?>" type="image/x-icon">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?= constant("url") ?>/templates/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= constant("url") ?>/templates/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="<?= constant("url") ?>/templates/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="<?= constant("url") ?>/templates/plugins/toastr/toastr.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>Admin</b>Pilketos</a>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <input type="hidden" name="csrf" id="csrf" value="<?= $csrf ?>">
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="<?= constant("url") ?>/templates/plugins/jquery/jquery.min.js"></script>
    <script src="<?= constant("url") ?>/templates/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= constant("url") ?>/templates/dist/js/adminlte.min.js"></script>
    <script src="<?= constant("url") ?>/templates/plugins/toastr/toastr.min.js"></script>
    <script>
        <?= isset($_COOKIE['alert']) ? $_COOKIE['alert'] : '' ?>
    </script>
</body>

</html>