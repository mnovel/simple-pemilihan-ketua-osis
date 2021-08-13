<?php
session_start();
$title = "Scanner";
$selectMenu = "Scanner";
$scanner = true;
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
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Absent Scanner</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <canvas class="img-fluid rounded mx-auto d-block mb-3"></canvas>
                    <div class="form-group">
                        <label>Camera</label>
                        <select id="camera-select" class="form-control custom-select">
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Result</label>
                        <textarea id="result" class="form-control" rows="4" readonly></textarea>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php
include_once "../templates/footer.php";
?>