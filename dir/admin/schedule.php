<?php
session_start();
$title = "Schedule";
$selectMenu = "Schedule";
$dataTable = false;
include_once "class/loginSession.php";
include_once "../connection.php";
include_once "../csrf.php";

if (isset($_POST['btnAdd'])) {
    if (!hash_equals($csrf, $_POST['csrf'])) {
        setcookie('alert', "toastr.error('CSRF Token Failed!')", time() + 5, '/');
        header("Refresh:0");
        die;
    }

    $name = strtolower(addslashes($_POST['class']));
    $class = substr($name, 0, 2);

    if ($name == 'guru')
        $class = 'guru';

    $cek = mysqli_query($connection, "INSERT INTO class (name,class) VALUES ('$name','$class')");
    if ($cek) {
        setcookie('alert', "toastr.success('Success add class')", time() + 5, '/');
    } else {
        setcookie('alert', "toastr.error('Failed add class')", time() + 5, '/');
    }
    header('Refres:0');
}

if (isset($_POST['btnReset'])) {
    if (!hash_equals($csrf, $_POST['csrf'])) {
        setcookie('alert', "toastr.error('CSRF Token Failed!')", time() + 5, '/');
        header("Refresh:0");
        die;
    }

    $class = $_POST['class'];
    header('Location:' . constant("url") . "/admin/resetVote?class=" . $class . "&type=mass&csrf=" . $csrf);
}

function totalSiswa($user)
{
    global $connection;
    $data = mysqli_query($connection, "SELECT COUNT(class) AS total FROM user WHERE class = '$user' ");
    $fetch = mysqli_fetch_row($data);
    return $fetch[0];
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
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">Add <?= $title ?></h3>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group" id="inputValue">
                            <label for="name">Class Name</label>
                            <input type="text" name="class" id="class" class="form-control" placeholder="12 Mipa 2" required>
                        </div>
                    </div>
                    <input type="hidden" name="csrf" id="csrf" value="<?= $csrf ?>">
                    <div class="card-footer">
                        <button type="submit" class="btn btn-secondary" name="btnAdd">Submit</button>
                    </div>
                </form>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tables <?= $title ?></h3>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Class Name</th>
                                <th>Total User</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
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
                                <tr>
                                    <td class="text-capitalize"><?= $result[1] ?></td>
                                    <td class="text-capitalize"><?= totalSiswa($result[1]) ?></td>
                                    <td>
                                        <div class="btn-group d-grid gap-2 col-6 mx-auto">
                                            <a href="<?= constant("url") . "/admin/absentUser?data=" . urlencode($result[1]) . "&csrf=" . $csrf ?>" class="btn btn-success btn-sm" title="Absent"><i class="fas fa-list-ol"></i></a>
                                            <a href="<?= constant("url") . "/admin/removeClass?data=" . urlencode($result[1]) . "&csrf=" . $csrf ?>" class="btn btn-danger btn-sm" title="Delete"><i class="fas fa-trash-alt"></i></a>
                                            <a href="<?= constant("url") . "/admin/resetVote?class=" . urlencode($result[1]) . "&type=class&csrf=" . $csrf ?>" class="btn btn-info btn-sm" title="Reset"><i class="fas fa-redo-alt"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Class Name</th>
                                <th>Total User</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>

<?php
include_once "../templates/footer.php";
?>