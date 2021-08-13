<?php
session_start();
$title = "Profile";
$selectMenu = "Profile";
$dataTable = TRUE;
include_once "class/loginSession.php";
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
            <div class="row row-cols-1 row-cols-md-2 g-4">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tables Log Login</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>IP</th>
                                        <th>Location</th>
                                        <th>Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $ch = curl_init();
                                    $url = api . "/action/getData.php";
                                    $apikey = api_key;
                                    $username = $_SESSION['username'];
                                    $userAgent = 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:17.0) Gecko/20100101 Firefox/17.0';
                                    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                                    curl_setopt($ch, CURLOPT_URL, $url . "?table=username&id=$username&data=log&type=id&api_key=$apikey");
                                    curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
                                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                                    curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
                                    $output = curl_exec($ch);
                                    $json = json_decode($output);
                                    curl_close($ch);
                                    foreach ($json->data as $result) :
                                    ?>
                                        <tr>
                                            <td><?= $result[1] ?></td>
                                            <td><?= $result[3] ?></td>
                                            <td><?= $result[4] ?></td>
                                            <td><?= date('d/m/y', $result[5]) ?></td>
                                        </tr>
                                    <?php
                                    endforeach
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Username</th>
                                        <th>IP</th>
                                        <th>Location</th>
                                        <th>Time</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="<?= constant("url") ?>/templates/dist/img/user4-128x128.jpg" alt="User profile picture">
                            </div>
                            <h3 class="profile-username text-center text-capitalize"><?= $_SESSION['name'] ?></h3>
                            <p class="text-muted text-center text-capitalize"><?= $_SESSION['username'] ?></p>
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>IP</b> <a class="float-right"><?= $_SESSION['ip'] ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Location</b> <a class="float-right"><?= $_SESSION['location'] ?></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php
include_once "../templates/footer.php";
?>