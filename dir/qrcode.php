<?php
session_start();
$title = "Qr Code";
$selectMenu = "Qr Code";
include_once "connection.php";
include_once "templates/header.php";


$username = $_POST['username'] ?? null;
$password = $_POST['password'] ?? null;
$apiQr = 'https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=';

if ($username != null | $password != null) {
    $query = mysqli_query($connection, "SELECT * FROM user WHERE username='$username' AND password='$password'");
    $num = mysqli_num_rows($query);
    if ($num > 0) {
        $_SESSION['qr'] = $apiQr . urlencode("username=$username&password=$password");
    } else {
        $_SESSION['err'] = 'Username dan Password yang anda masukan tidak ditemukan';
    }
}



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
            <h2 class="text-center display-4">Search</h2>
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <form action="" method="POST">
                        <div class="input-group">
                            <input type="text" class="form-control form-control-lg" placeholder="Username" id="username" name="username">
                            <input type="text" class="form-control form-control-lg" placeholder="Password" id="password" name="password">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-lg btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <?php if (isset($_SESSION['err'])) { ?>
                <h1 class="text-center"><?= $_SESSION['err'] ?></h1>
            <?php } ?>
            <?php if (isset($_SESSION['qr'])) { ?>
                <h1 class="text-center">Ini adalah Qr Code anda</h1>
                <img src="<?= $_SESSION['qr'] ?>" alt="qrcode" class="mb-3 img-fluid rounded mx-auto d-block">
                <div class="text-center text-danger">
                    <p>*Dimohon tidak membagikan qr code ini kepada orang lain.</p>
                    <p>*Screen Shot gambar ini untuk mengikuti Pemilihan Ketua Osis SMA Negeri 1 Pasuruan.</p>
                </div>
            <?php } ?>
        </div>
    </section>
</div>

<?php
include_once "templates/footer.php";
session_destroy();
?>