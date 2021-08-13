<?php
session_start();
$title = "Vote";
$selectMenu = "Moderator Menu";
include_once "class/loginSession.php";
include_once "../csrf.php";
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
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-bullhorn"></i> Announcement</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <ol>
                        <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin dignissim.</li>
                        <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin dignissim.</li>
                        <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin dignissim.</li>
                    </ol>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php
                $ch = curl_init();
                $url = api . "/action/getData.php";
                $apikey = api_key;
                $userAgent = 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:17.0) Gecko/20100101 Firefox/17.0';
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                curl_setopt($ch, CURLOPT_URL, $url . "?data=candidate&order=no&type=all&api_key=$apikey");
                curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
                $output = curl_exec($ch);
                $json = json_decode($output);
                curl_close($ch);
                foreach ($json->data as $result) :
                ?>
                    <div class="col mx-auto">
                        <div class="card card-widget widget-user">
                            <div class="widget-user-header bg-info">
                                <h3 class="widget-user-username text-capitalize"><?= $result[1] ?></h3>
                                <h5 class="widget-user-desc">Candidate <?= $result[5] ?></h5>
                            </div>
                            <div class="widget-user-image">
                                <img class="img-circle elevation-2" src="<?= constant('url') . '/assets/img/' . $result[4] ?>" alt="User Avatar">
                            </div>
                            <div class="card-body mt-5">
                                <h4 class="text-center text-info">
                                    <i class="fas fa-eye"></i><br>
                                    - VISI -
                                </h4>
                                <?= $result[2] ?>
                                <hr width="50%">
                                <h4 class="text-center text-info">
                                    <i class="fas fa-rocket"></i><br>
                                    - MISI -
                                </h4>
                                <?= $result[3] ?>
                            </div>
                            <div class="card-footer">
                                <a href="submitForm.php?candidate=<?= $result[5] ?>&csrf=<?= $csrf ?>" class="btn btn-secondary btn-block">Pilih</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </section>
</div>

<?php
include_once "../templates/footer.php";
?>