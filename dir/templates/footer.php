<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Made with <i class="fas fa-heart" style="color:#ff5252"></i>. </b>Script By Muhammad Novel.
    </div>
    <strong>Copyright &copy; 2020-<?= date('Y') ?> <a href="#">SEWAGATI SMASA</a>.</strong> All rights reserved.
</footer>
<aside class="control-sidebar control-sidebar-dark">
</aside>
</div>
<script src="<?= constant("url") ?>/templates/plugins/jquery/jquery.min.js"></script>
<script src="<?= constant("url") ?>/templates/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= constant("url") ?>/templates/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="<?= constant("url") ?>/templates/dist/js/adminlte.min.js"></script>
<script src="<?= constant("url") ?>/templates/dist/js/demo.js"></script>
<script src="<?= constant("url") ?>/templates/plugins/toastr/toastr.min.js"></script>
<script>
    <?= isset($_COOKIE['alert']) ? $_COOKIE['alert'] : '' ?>
</script>
<?php
if (isset($dataTable)) {
?>
    <script src="<?= constant("url") ?>/templates/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= constant("url") ?>/templates/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= constant("url") ?>/templates/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= constant("url") ?>/templates/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?= constant("url") ?>/templates/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= constant("url") ?>/templates/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= constant("url") ?>/templates/plugins/jszip/jszip.min.js"></script>
    <script src="<?= constant("url") ?>/templates/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?= constant("url") ?>/templates/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="<?= constant("url") ?>/templates/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= constant("url") ?>/templates/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?= constant("url") ?>/templates/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <?php if ($dataTable == true) { ?>
        <script>
            $(function() {
                $("#example1").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                });
            });
        </script>
    <?php } else { ?>
        <script>
            $(function() {
                $("#example1").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                });
            });
        </script>
    <?php } ?>
<?php
} else if (isset($user)) {
?>
    <script src="<?= constant("url") ?>/templates/plugins/moment/moment.min.js"></script>
    <script src="<?= constant("url") ?>/templates/plugins/inputmask/jquery.inputmask.min.js"></script>
    <script src="<?= constant("url") ?>/templates/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <script>
        $('#reservationdate').datetimepicker({
            format: 'DD-MM-YYYY'
        });
    </script>
<?php
} else if (isset($ckEditor)) {
?>
    <script src="<?= constant("url") ?>/templates/plugins/ckeditor/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.getElementById('loli'))
            .catch(error => {
                console.error(error);
            });
    </script>
<?php
} else if (isset($settings)) {
?>
    <script>
        $('#name').change(function() {
            if ($(this).val() == 'icon') {
                $('#inputValue').html(` <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="value" id="value">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>`)
            } else {
                $('#inputValue').html(`<label for="name">Value</label>
                                    <input type="text" name="value" id="value" class="form-control" placeholder="Value" minlength="10" required>`)
            }
        })
    </script>
<?php
} else if (isset($chart)) {
?>
    <script src="<?= constant('url') ?>/templates/plugins/chart.js/Chart.min.js"></script>
    <script>
        var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
        var donutData = {
            labels: ['data 1', 'data 2', 'data 3'],
            datasets: [{
                data: [0, 0, 0],
                backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
            }]
        }
        var pieData = donutData;
        var pieOptions = {
            maintainAspectRatio: false,
            responsive: true,
        }
        var chart = new Chart(pieChartCanvas, {
            type: 'pie',
            data: pieData,
            options: pieOptions
        })

        function areEqual(arr1, arr2) {
            let n = arr1.length;
            let m = arr2.length;
            if (n != m)
                return false;
            for (let i = 0; i < n; i++)
                if (arr1[i] != arr2[i])
                    return false;
            return true;
        }

        setInterval(function() {
            $.getJSON('classVote.php?data=all', function(data) {
                if (!areEqual(chart.data.datasets[0].data, data.total)) {
                    console.log(data, 'data2')
                    chart.data.datasets[0].data = data.total
                    chart.data.labels = data.candidate
                    chart.update()
                }
            })
        }, 1000)
    </script>
<?php
} else if (isset($scanner)) {
?>
    <script type="text/javascript" src="<?= url ?>/templates/plugins/qrreader/js/jquery.js"></script>
    <script type="text/javascript" src="<?= url ?>/templates/plugins/qrreader/js/qrcodelib.js"></script>
    <script type="text/javascript" src="<?= url ?>/templates/plugins/qrreader/js/webcodecamjquery.js"></script>
    <script type="text/javascript">
        var arg = {
            resultFunction: function(result) {
                $.ajax({
                    url: 'absentUser',
                    method: 'POST',
                    data: result.code + '&csrf=<?= $csrf ?>',
                    success: function(data) {
                        $('#result').html(data);

                    }
                })
            }
        };

        var decoder = $("canvas").WebCodeCamJQuery(arg).data().plugin_WebCodeCamJQuery
        decoder.options.successTimeout = 5000
        decoder.buildSelectMenu('#camera-select').init(arg).play();
        /*  Without visible select menu
            var decoder = new WebCodeCamJS("canvas").buildSelectMenu(document.createElement('select'), 'environment|back').init(arg).play();
        */
        document.querySelector('select').addEventListener('change', function() {
            decoder.stop().play();
        });
    </script>
<?php
}
?>
</body>

</html>