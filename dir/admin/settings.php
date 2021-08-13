<?php
session_start();
$title = "Settings";
$selectMenu = "Settings";
$settings = TRUE;
include_once "class/loginSession.php";
include_once "../connection.php";
include_once "../csrf.php";

if (isset($_POST['name'])) {
    if (!hash_equals($csrf, $_POST['csrf'])) {
        setcookie('alert', "toastr.error('CSRF Token Failed!')", time() + 5, '/');
        header("Refresh:0");
        die;
    }

    $name = $_POST['name'];

    if ($name == 'icon') {

        $image = $_FILES['value'];
        $dir = '../../dir/assets/img/';
        $file = $dir . basename($image['name']);
        $fileType = strtolower(pathinfo($file, PATHINFO_EXTENSION));
        $newName = round(microtime(true)) . '.' . $fileType;
        $filesize = 1000000;

        $array = array();
        $array2 = array();

        if ($image['size'] > $filesize) {
            $array2['status'] = 'error';
            $array2['message'] = 'Sorry, your file is too large. Max file is 1 MB ✘';
            $array['filesize'] = $array2;
        } else {
            $array2['status'] = 'success';
            $array2['message'] = 'Your file is under 1 MB ✔';
            $array['filesize'] = $array2;
        }

        if ($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg") {
            $array2['status'] = 'error';
            $array2['message'] = 'Sorry, only JPG, JPEG & PNG files are allowed. ✘';
            $array['filetype'] = $array2;
        } else {
            $array2['status'] = 'success';
            $array2['message'] = 'your file is image ✔';
            $array['filetype'] = $array2;
        }

        if ($array['filesize']['status'] == 'success' && $array['filetype']['status'] == 'success') {
            $cek = mysqli_query($connection, "UPDATE settings SET value='$newName' WHERE name='$name'");
            if ($cek) {
                move_uploaded_file($image['tmp_name'], $dir . $newName);
                setcookie('alert', "toastr.success('Success edit $name')", time() + 5, '/');
            } else {
                $message = "Failed edit $name, " . mysqli_error($connection);
                setcookie('alert', "toastr.error(`${message}`)", time() + 5, '/');
            }
        } else {
            $text = $array['filesize']['message'] . "<br>" . $array['filetype']['message'];
            setcookie('alert', "toastr.error('${text}')", time() + 5, '/');
        }
    } else {
        $value = htmlspecialchars(addslashes($_POST['value']));

        $cek = mysqli_query($connection, "UPDATE settings SET value='$value' WHERE name='$name'");
        if ($cek) {
            setcookie('alert', "toastr.success('Success edit $name')", time() + 5, '/');
        } else {
            setcookie('alert', "toastr.error('Failed edit $name')", time() + 5, '/');
        }
    }
    header("Refresh:0");
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
            <?php
            $ch = curl_init();
            $url = api . "/action/server.php";
            $apikey = api_key;
            $userAgent = 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:17.0) Gecko/20100101 Firefox/17.0';
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_URL, $url . "?type=get&api_key=$apikey");
            curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
            $output = curl_exec($ch);
            $status = json_decode($output);
            curl_close($ch);
            $value = $status->data == 1 ? 0 : 1;
            ?>
            <a href="<?= url . "/admin/server.php?value=$value&csrf=$csrf" ?>" class="btn btn-<?= $status->data == 1 ? 'info' : 'danger' ?> btn-block mb-4"><i class="fas fa-power-off"> SERVER ON</i></a>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">List <?= $title ?></h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Name</th>
                                        <th>Value</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $ch = curl_init();
                                    $url = api . "/action/getData.php";
                                    $apikey = api_key;
                                    $userAgent = 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:17.0) Gecko/20100101 Firefox/17.0';
                                    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                                    curl_setopt($ch, CURLOPT_URL, $url . "?data=settings&order=name&type=all&api_key=$apikey");
                                    curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
                                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                                    curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
                                    $output = curl_exec($ch);
                                    $json = json_decode($output);
                                    curl_close($ch);
                                    foreach ($json->data as $no => $result) :
                                    ?>
                                        <tr>
                                            <td><?= $no + 1 ?></td>
                                            <td class="text-capitalize"><?= $result[1] ?></td>
                                            <td><?= $result[2] ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title"><?= $title ?></h3>
                        </div>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Select</label>
                                    <select class="form-control" name="name" id="name">
                                        <option value="title">Title</option>
                                        <option value="description">Description</option>
                                        <option value="icon">Icon</option>
                                    </select>
                                </div>
                                <div class="form-group" id="inputValue">
                                    <label for="name">Value</label>
                                    <input type="text" name="value" id="value" class="form-control" placeholder="Value" required>
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