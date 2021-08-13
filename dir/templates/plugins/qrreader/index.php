<?php

if (!empty($_GET['password'])) {
    if ($_GET['password'] != 'Onesmasa') {
        die;
    }
} else {
    die;
}


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Demo</title>
</head>

<body>
    <h3>QR Code Scanner (Khusus Panitia Penjaga Pilketos)</h3>
    <hr>
    <canvas></canvas>
    <hr>
    <select></select>
    <hr>
    <ul></ul>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/qrcodelib.js"></script>
    <script type="text/javascript" src="js/webcodecamjquery.js"></script>
    <script type="text/javascript">
        var arg = {
            resultFunction: function(result) {
                $.ajax({
                    url: 'qrread.php',
                    method: 'POST',
                    data: result.code,
                    success: function(data) {
                        // $('body').append($('<li>' + result.format + ': ' + result.code + 'ngokey</li>'));
                        $('body').append($('<li>' + data + '</li>'));

                    }
                })

            }
        };
        var decoder = $("canvas").WebCodeCamJQuery(arg).data().plugin_WebCodeCamJQuery;
        decoder.buildSelectMenu("select");
        decoder.play();
        /*  Without visible select menu
            decoder.buildSelectMenu(document.createElement('select'), 'environment|back').init(arg).play();
        */
        $('select').on('change', function() {
            decoder.stop().play();
        });
    </script>
</body>

</html>