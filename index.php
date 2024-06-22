<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ダッシュボード</title>

    <!-- Bootstrap5_beta3 css -->
    <link rel="stylesheet" href="./css/bootstrap.css">
    <!-- Bootstrap icon css-CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <!-- sidebar-nav css -->
    <link rel="stylesheet" href="./css/style.css">

</head>
<?php
require_once './common/database.php';
session_start();
if (!isset($_SESSION['join'])) {
    header('Location: ./users/login.html');
    exit();
}
require_once './functions/session_user_select.php';
$mail = $_SESSION['join'];
$user_n = user_select($mail);
?>

<body>
    <!-- top navigation bar start -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="offcanvasExample">
                <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
            </button>
            <a class="navbar-brand me-auto ms-lg-0 ms-3 text-uppercase fw-bold" href="#">anzen</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#topNavBar" aria-controls="topNavBar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="topNavBar">

                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle ms-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-fill"></i>　<?php echo $user_n['f_name'] . " " . $user_n['l_name']; ?>さん
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="./users/logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- top navigation bar end -->
    <!-- offcanvas side_menu start -->
    <div class="offcanvas offcanvas-start sidebar-nav bg-dark" tabindex="-1" id="sidebar">
        <div class="offcanvas-body p-0">
            <nav class="navbar-dark">
                <ul class="navbar-nav">
                    <li>
                        <a href="#" class="nav-link px-3 active">
                            <span class="me-2"><i class="fs-4 bi-house"></i></span>
                            <span>Home</span>
                        </a>
                    </li>
                    <li class="my-2">
                        <hr class="dropdown-divider bg-light" />
                    </li>
                    <li>
                        <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
                            Dashboard
                        </div>
                    </li>
                    <li>
                        <a href="./tasks/task_list.php" class="nav-link px-3">
                            <span class="me-2">
                                <i class="fs-4 bi-file-earmark-text"></i>
                            </span>
                            <span>タスク</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-3">
                            <span class="me-2">
                                <i class="fs-4 bi-calculator"></i>
                            </span>
                            <span>採算</span>
                        </a>
                    </li>
                    <li>
                        <a href="./driver/driver_list.php" class="nav-link px-3">
                            <span class="me-2">
                                <i class="fs-4 bi-speedometer2"></i>
                            </span>
                            <span>安全運転管理</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-3">
                            <span class="me-2">
                                <i class="fs-4 bi-exclamation-triangle"></i>
                            </span>
                            <span>重点安全活動</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-3">
                            <span class="me-2">
                                <i class="fs-4 bi-calendar3"></i>
                            </span>
                            <span>スケジュール管理</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-3">
                            <span class="me-2">
                                <i class="fs-4 bi-flag"></i>
                            </span>
                            <span>戦略マップ</span>
                        </a>
                    </li>
                    <li class="my-2">
                        <hr class="dropdown-divider bg-light" />
                    </li>
                    <li>
                        <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
                            links
                        </div>
                    </li>
                    <li>
                        <a href="https://www.cellvy-kcme.com/" class="nav-link px-3" target="_blank">
                            <span class="me-2">
                                <i class="fs-4 bi-headset"></i>
                            </span>
                            <span>KCCS-G_CELLVY</span>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.vehicle-assist.jp/dyna/user/login?company=1893110221" class="nav-link px-3" target="_blank">
                            <span class="me-2">
                                <i class="fs-4 bi bi-exclamation-triangle"></i>
                            </span>
                            <span>Vehicle Assist</span>
                        </a>
                    </li>
                    <li>
                        <a href="https://saas.assetment.net/AS4356-PA0200446/" class="nav-link px-3" target="_blank">
                            <span class="me-2">
                                <i class="fs-4 bi bi-shield-lock"></i>
                            </span>
                            <span>Assetment</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-3">
                            <span class="me-2">
                                <i class="fs-4 bi bi-camera-video"></i>
                            </span>
                            <span>Raz.Vision</span>
                        </a>
                    </li>
                    <li>
                        <a href="http://pc6140/view_360/test_360.php" class="nav-link px-3" target="_blank">
                            <span class="me-2">
                                <i class="fs-4 bi bi-badge-vr"></i>
                            </span>
                            <span>360度-view</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- offcanvas side_menu end -->
    <!-- main contents start -->
    <main class="mt-4 pt-3">
        <div class="container-fluid">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Overview</li>
                </ol>
            </nav>
            <div class="row">
                <?php
                require_once './common/database.php';
                $dbh = getDb();
                $sql = <<<SQL
                SELECT t_priority_id, COUNT(t_priority_id) AS count_p FROM tasks WHERE task_flag = 0 GROUP BY t_priority_id
                SQL;
                $stmt = $dbh->query($sql);
                foreach ($stmt as $row) {
                    $res = $row['count_p'];
                    $rid = $row['t_priority_id'];
                    if ($rid == "1") {
                        $card = "border-danger";
                        $title = "text-danger";
                        $pri = "優先度:高";
                        $bt = "btn-outline-danger";
                        $footer = "bg-danger text-white";
                    }
                    if ($rid == "2") {
                        $card = "border-warning text-dark";
                        $title = "";
                        $pri = "優先度:中";
                        $bt = "btn-outline-warning";
                        $footer = "bg-warning";
                    }
                    if ($rid == "3") {
                        $card = "border-primary";
                        $title = "text-primary";
                        $pri = "優先度:低";
                        $bt = "btn-outline-primary";
                        $footer = "bg-primary text-white";
                    }
                    print <<<EOD
                <div class="col-md-4 mb-3">
                    <div class="card $card h-100">
                        <div class="card-body">
                            <h5 class="card-title $title"><b>$pri</b></h5>
                            <p class="card-text">進捗状況を確認してください。</p>
                            <a href="./tasks/task_list.php" class="btn $bt btn-sm">タスクリスト</a>
                        </div>
                        <div class="card-footer $footer d-flex">
                            <span>
                                <i class="bi bi-chevron-right"></i>
                            </span>
                            $res 件
                        </div>
                    </div>
                </div>
                EOD;
                }
                $dbh = null;
                ?>
            </div>
        </div>
    </main>
    <!-- main contents end -->

    <!-- Script -->
    <!-- Jquery Script -->
    <script src="./js/jquery-3.6.0.js"></script>
    <!-- Bootstrap5_beta3 Script -->
    <script src="./js/bootstrap.bundle.js"></script>
</body>

</html>