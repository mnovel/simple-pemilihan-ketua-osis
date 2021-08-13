<?php
session_start();
$title = "Edit Moderator";
$selectMenu = "Moderator Menu";
include_once "class/loginSession.php";
include_once "../csrf.php";
include_once "../connection.php";



if (empty($_GET['id'])) {
    setcookie('alert', "toastr.error('Please select the moderator first')", time() + 5, '/');
    header("location:moderator");
    die;
} else {
    $ch = curl_init();
    $url = api . "/action/getData.php";
    $apikey = api_key;
    $table = urlencode($_GET['table']);
    $id = urlencode($_GET['id']);
    $userAgent = 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:17.0) Gecko/20100101 Firefox/17.0';
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_URL, $url . "?table=$table&id=$id&data=moderator&type=id&api_key=$apikey");
    curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
    $output = curl_exec($ch);
    $json = json_decode($output);
    curl_close($ch);
}

if (!empty($_POST['name'])) {

    if (!hash_equals($csrf, $_POST['csrf'])) {
        setcookie('alert', "toastr.error('CSRF Token Failed!')", time() + 5, '/');
        header("Refresh:0");
        die;
    }

    $name = htmlspecialchars(addslashes($_POST['name']));
    $username = htmlspecialchars(addslashes($_POST['username']));
    $password = htmlspecialchars(addslashes($_POST['password']));
    $login = $_POST['login'];

    $cek = mysqli_query($connection, "UPDATE moderator SET name='$name', username='$username', password='$password', login='$login' WHERE id='$id'");

    if ($cek) {
        setcookie('alert', "toastr.success('Success update moderator')", time() + 5, '/');
        header('location:moderator');
    } else {
        setcookie('alert', "toastr.error('Failed update moderator. ')" . mysqli_error($connection), time() + 5, '/');
        header('location:moderator');
    }
}
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
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control" value="<?= $json->data[0][1] ?>" placeholder="Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="name">Username</label>
                                    <input type="text" name="username" id="username" class="form-control" value="<?= $json->data[0][2] ?>" placeholder="Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="name">Password</label>
                                    <input type="text" name="password" id="password" class="form-control" value="<?= $json->data[0][3] ?>" placeholder="Name" required>
                                </div>
                                <div class="form-group">
                                    <label>Login</label>
                                    <select name="login" id="login" class="form-control" required>
                                        <option value="0" <?= $json->data[0][4] == 0 ? 'selected' : '' ?>>Logout</option>
                                        <option value="1" <?= $json->data[0][4] == 1 ? 'selected' : '' ?>>Login</option>
                                    </select>
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