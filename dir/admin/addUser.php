<?php
session_start();
$title = "Add User";
$selectMenu = "User Menu";
$user = TRUE;
include_once "class/loginSession.php";
include_once "../connection.php";
include_once "../csrf.php";

if (isset($_POST['name'])) {

    if (!hash_equals($csrf, $_POST['csrf'])) {
        setcookie('alert', "toastr.error('CSRF Token Failed!')", time() + 5, '/');
        header("Refresh:0");
        die;
    }

    $type = 2;
    $name = addslashes($_POST['name']);
    $username = addslashes($_POST['username']);
    $password = addslashes($_POST['password']);
    $class = urlencode($_POST['class']);

    if (strlen($username) != 10) {
        setcookie('alert', "toastr.error('Failed edit user, minimum length of username is 10')", time() + 5, '/');
        header('Refresh:0');
        die;
    }

    $ch = curl_init();
    $url = api . "/action/addData.php";
    $apikey = api_key;
    $userAgent = 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:17.0) Gecko/20100101 Firefox/17.0';
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_URL, $url . "?name=$name&username=$username&password=$password&class=$class&type=$type&api_key=$apikey");
    curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
    $output = curl_exec($ch);
    $json = json_decode($output);
    curl_close($ch);
    if ($json->status == 'success') {
        setcookie('alert', "toastr.success('{$json->message}')", time() + 5, '/');
    } else {
        setcookie('alert', "toastr.error('{$json->message}')", time() + 5, '/');
    }
    header("Refresh:0");
}
?>

<?php
include_once "../templates/header.php";
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $title ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Layout</a></li>
                        <li class="breadcrumb-item active">Fixed Layout</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title"><?= $title ?></h3>
                        </div>
                        <form action="" method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="name">NISN</label>
                                    <input type="number" name="username" id="username" class="form-control" placeholder="NISN" required>
                                </div>
                                <div class="form-group">
                                    <label>Class</label>
                                    <select name="class" id="class" class="form-control" required>
                                        <?php
                                        $ch = curl_init();
                                        $url = api . "/action/getData.php";
                                        $apikey = api_key;
                                        $userAgent = 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:17.0) Gecko/20100101 Firefox/17.0';
                                        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                                        curl_setopt($ch, CURLOPT_URL, $url . "?data=class&order=name&type=all&api_key=$apikey");
                                        curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
                                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                                        curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
                                        $output = curl_exec($ch);
                                        $json = json_decode($output);
                                        curl_close($ch);
                                        foreach ($json->data as $result) :
                                        ?>
                                            <option value="<?= $result[1] ?>" class="text-capitalize"><?= $result[1] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Birthday</label>
                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                        <input type="text" name="password" id="password" class="form-control datetimepicker-input" data-target="#reservationdate" value="<?= date('d/m/Y') ?>" required />
                                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="csrf" id="csrf" value="<?= $csrf ?>">
                            <div class="card-footer">
                                <button type="submit" class="btn btn-secondary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php
include_once "../templates/footer.php";
?>