<?php
session_start();
$title = "Edit Candidate";
$selectMenu = "Candidate Menu";
$ckEditor = TRUE;
include_once "class/loginSession.php";
include_once "../csrf.php";
include_once "../connection.php";



if (empty($_GET['id'])) {
    setcookie('alert', "toastr.error('Please select the candidate first')", time() + 5, '/');
    header("location:index");
    die;
} else {
    $ch = curl_init();
    $url = api . "/action/getData.php";
    $apikey = api_key;
    $table = urlencode($_GET['table']);
    $id = urlencode($_GET['id']);
    $userAgent = 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:17.0) Gecko/20100101 Firefox/17.0';
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_URL, $url . "?table=$table&id=$id&data=candidate&type=id&api_key=$apikey");
    curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
    $output = curl_exec($ch);
    $json = json_decode($output);
    curl_close($ch);
}

if (!empty($_POST['name'])) {

    $name = $_POST['name'];
    $visi = htmlspecialchars(addslashes($_POST['visi']));
    $misi = addslashes($_POST['misi']);
    $no = $_POST['no'];


    if (!hash_equals($csrf, $_POST['csrf'])) {
        setcookie('alert', "toastr.error('CSRF Token Failed!')", time() + 5, '/');
        header("Refresh:0");
        die;
    }

    if (empty($_FILES['image']['name'])) {
        $cek = mysqli_query($connection, "UPDATE candidate SET no='$no',name='$name',visi='$visi',misi='$misi' WHERE id={$id}");
        if ($cek) {
            setcookie('alert', "toastr.success('Success edit candidate')", time() + 5, '/');
            header("location:index");
        } else {
            $message = "Failed edit candidate, " . mysqli_error($connection);
            setcookie('alert', "toastr.error(`${message}`)", time() + 5, '/');
            header("location:index");
        }
    } else {
        $image = $_FILES['image'];
        $dir = '../../dir/assets/img/';
        $file = $dir . basename($image['name']);
        $fileType = strtolower(pathinfo($file, PATHINFO_EXTENSION));
        $newName = round(microtime(true)) . '.' . $fileType;
        $filesize = 1000000;
        $image_size = getimagesize($image['tmp_name']);
        $width = $image_size[0];
        $height = $image_size[1];

        $array = array();
        $array2 = array();

        if ($width != $height) {
            $array2['status'] = 'error';
            $array2['message'] = 'Sorry, the file must be square ✘';
            $array['filesquare'] = $array2;
        } else {
            $array2['status'] = 'success';
            $array2['message'] = 'Your file is square ✔';
            $array['filesquare'] = $array2;
        }

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

        if ($array['filesize']['status'] == 'success' && $array['filetype']['status'] == 'success' && $array['filesquare']['status'] == 'success') {
            $cek = mysqli_query($connection, "UPDATE candidate SET no='$no',name='$name',visi='$visi',misi='$misi',image='$newName' WHERE id={$id}");
            if ($cek) {
                move_uploaded_file($image['tmp_name'], $dir . $newName);
                setcookie('alert', "toastr.success('Success edit candidate')", time() + 5, '/');
                header("location:index");
            } else {
                $message = "Failed edit candidate, " . mysqli_error($connection);
                setcookie('alert', "toastr.error(`${message}`)", time() + 5, '/');
                header("Refresh:0");
            }
        } else {
            $text = $array['filesize']['message'] . "<br>" . $array['filetype']['message'] . "<br>" . $array['filesquare']['message'];
            setcookie('alert', "toastr.error('${text}')", time() + 5, '/');
            header("Refresh:0");
        }
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
                                    <label for="name">No</label>
                                    <input type="text" name="no" id="no" class="form-control" value="<?= $json->data[0][5] ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control" value="<?= $json->data[0][1] ?>" placeholder="Name" required>
                                </div>
                                <div class="form-group">
                                    <label>Visi</label>
                                    <textarea name="visi" id="visi" class="form-control" rows="4" required><?= $json->data[0][2] ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Misi</label>
                                    <textarea name="misi" id="misi" class="form-control" rows="4" required><?= $json->data[0][3] ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Image</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="image" id="image">
                                        <label class="custom-file-label" for="image">Choose file</label>
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