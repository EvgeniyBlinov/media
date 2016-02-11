<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/main.css?<?= $revision ?>" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <input class="btn btn-volume-down btn-responsive" id="btn-volume-down" type="button" value="Value Down">
            <input class="btn btn-volume-up btn-responsive" id="btn-volume-up" type="button" value="Value Up">
        </div>
        <div class="row">
            <input class="btn btn-primary btn-responsive" id="btn-key-space" type="button" value="Space">
        </div>
        <div class="row">
            <input class="btn btn-key-left btn-responsive" id="btn-key-left" type="button" value="Left">
            <input class="btn btn-key-right btn-responsive" id="btn-key-right" type="button" value="Right">
        </div>
    </div>
    <script src="js/jquery-1.12.0.min.js?<?= $revision ?>"></script>
    <script src="js/bootstrap.min.js?<?= $revision ?>"></script>
    <script src="js/main.js?<?= $revision ?>" type="text/javascript"></script>
</body>
</html>
