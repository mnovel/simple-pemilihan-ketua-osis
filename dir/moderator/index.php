<?php
session_start();
$title = "Absent";
$selectMenu = "Absent Menu";
$dataTable = TRUE;
include_once "class/loginSession.php";
include_once "../csrf.php";
?>
<?php include_once "../templates/header.php" ?>
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
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tables <?= $title ?></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Class</th>
                                <th>Absent</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $ch = curl_init();
                            $url = api . "/action/getData.php";
                            $apikey = api_key;
                            $userAgent = 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:17.0) Gecko/20100101 Firefox/17.0';
                            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                            curl_setopt($ch, CURLOPT_URL, $url . "?data=user&order=name&type=all&api_key=$apikey");
                            curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                            curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
                            $output = curl_exec($ch);
                            $json = json_decode($output);
                            curl_close($ch);
                            foreach ($json->data as $result) :
                                $abs = [
                                    "Tidak Hadir",
                                    "Hadir"
                                ];
                                $color = [
                                    "danger",
                                    "success"
                                ];
                                $data = [
                                    1,
                                    0
                                ];
                            ?>
                                <tr>
                                    <td><?= $result[1] ?></td>
                                    <td><?= $result[2] ?></td>
                                    <td class="text-capitalize"><?= $result[4] ?></td>
                                    <td>
                                        <button class="btn btn-<?= $color[$result[8]] ?> btn-sm"><?= $abs[$result[8]] ?></button>
                                    </td>
                                </tr>
                            <?php
                            endforeach
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Class</th>
                                <th>Absent</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </section>
</div>

<?php
include_once "../templates/footer.php";
?>