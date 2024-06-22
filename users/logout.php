<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup</title>

    <!-- Bootstrap5 css -->
    <link rel="stylesheet" href="../css/bootstrap.css" type="text/css">
    <!-- Login css -->
    <link rel="stylesheet" href="../css/login.css">
    <!-- Bootstrap icon css-CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">

</head>
<?php
session_start();
$_SESSION=array();
session_destroy();
?>
<body>
    <div class="login-box">
        <div class="card">
            <div class="card-header">
                <b>ログアウトしました</b>
            </div>
            <div class="card-body">
                <p class="card-text">お疲れさまでした。</p>
            </div>
            <div class="card-footer text-center">
                <a class="btn btn-primary btn-sm" href="login.html" role="button">Log in</a>
            </div>
        </div>
    </div>
    <div class="text-center">
        <p>KCME安全品質部</p>
    </div>
    <!-- Script -->
    <script src="../js/bootstrap.bundle.js" type="text/javascript"></script>
</body>

</html>