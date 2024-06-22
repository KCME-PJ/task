<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ダッシュボード</title>

    <!-- Bootstrap5_beta3 css -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <!-- Bootstrap icon css-CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <!-- sidebar-nav css -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- Datatables css -->
    <link rel="stylesheet" href="../css/datatables.css">
    <!-- Flatpicker css-CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- PHP PDO SQL-SELECT -->
    <?php
        require_once '../common/database.php';
        session_start();
        if (!isset($_SESSION['join'])) {
            header('Location: ../users/login.html');
            exit();
        }
        require_once '../functions/session_user_select.php';
        $mail = $_SESSION['join'];
        $user_n = user_select($mail);

        $task_id = $_GET['id'];
        if (empty($task_id)) {
            header('Location: ./task_list.php');
        }
        $sql = <<<SQL
        SELECT * FROM tasks
        INNER JOIN priorities ON tasks.t_priority_id = priorities.priority_id
        INNER JOIN impacts ON tasks.t_impact_id = impacts.impact_id
        WHERE task_id = ?
        SQL;
        $dbh = getDb();
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(1, $task_id, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch();
        $task_name = $row['task_name'];
        $startdate = $row['startdate'];
        $deadline = $row['deadline'];
        $priority = $row['priority'];
        $impact = $row['impact'];
        $content = $row['content'];
        $user_id = $row['t_user_id'];
        $dbh = null;

        require_once '../functions/user_id_select.php';
        $user = id_select($user_id);
    ?>
</head>
<body>
    <!-- top navigation bar start -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar"
                aria-controls="offcanvasExample">
                <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
            </button>
            <a class="navbar-brand me-auto ms-lg-0 ms-3 text-uppercase fw-bold" href="../index.php">anzen</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#topNavBar"
                aria-controls="topNavBar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="topNavBar">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle ms-2" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="bi bi-person-fill"></i>　<?php echo $user_n['f_name']." ". $user_n['l_name']; ?>さん
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">Logout</a></li>
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
                        <a href="../index.php" class="nav-link px-3">
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
                        <a href="./task_list.php" class="nav-link px-3 active">
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
                        <a href="#" class="nav-link px-3">
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
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item"><a href="./task_list.php">タスク</a></li>
                    <li class="breadcrumb-item active" aria-current="page">進捗更新</li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-body">
                    <form class="row g-3" action="task_edit-add.php" method="post">
                        <input type="hidden" name="userid" value="<?php echo $user_n['user_id']; ?>">
                        <div class="input-group col-12 mt-3">
                            <span class="input-group-text" id="basic-addon3">タスク名　</span>
                            <input type="text" class="form-control bg-white" value="<?php echo $task_name; ?>" disabled>
                            <span class="input-group-text" id="basic-addon3">タスク登録者</span>
                            <input type="text" class="form-control bg-white" value="<?php echo $user['f_name']." ". $user['l_name']; ?>" disabled>
                        </div>
                        <div class="col-md-4">
                            <label for="flatpicker" class="form-label">日程</label>
                            <div class="input-group date" id="flatpicker" data-target-input="nearest">
                                <span class="input-group-text" id="basic-addon3">開始日</span>
                                <input type="text" data-input class="form-control bg-white" id="startdate" name="startdate"
                                    value="<?php echo $startdate; ?>" disabled>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="flatpicker" class="form-label">　</label>
                            <div class="input-group date" id="flatpicker" data-target-input="nearest">
                                <span class="input-group-text" id="basic-addon3">締切日</span>
                                <input type="text" data-input class="form-control bg-white" id="deadline" name="deadline"
                                    name="deadline" value="<?php echo $deadline; ?>" disabled>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="taskflag" class="form-label">重要度</label>
                            <div class="input-group">
                                <input type="email" class="form-control bg-white" id="mail" name="mail" value="<?php echo $priority; ?>" disabled>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="impact" class="form-label">影響範囲</label>
                            <div class="input-group">
                                <input type="email" class="form-control bg-white" id="mail" name="mail" value="<?php echo $impact; ?>" disabled>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="contents" class="form-label">タスク内容</label>
                            <textarea class="form-control bg-white" id="contents" name="contents" rows="2" disabled><?php echo $content; ?>
                                </textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="progress" class="form-label">進捗</label>
                            <textarea class="form-control bg-white" id="progress" name="progress" rows="5"
                                placeholder="進捗をここに記載してください" required></textarea>
                        </div>
                        <input type="hidden" name="task_id" value="<?php echo $task_id; ?>">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="radio_bt" id="radio1" value="1">
                            <label class="form-check-label" for="radio1">
                                完了
                            </label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="radio_bt" id="radio2" value="0" checked>
                            <label class="form-check-label" for="radio2">
                                未完了
                            </label>
                        </div>
                        <div class="col-12">
                            <button type="button" onclick="history.back()" class="btn btn-outline-warning">キャンセル</button>
                            <button type="submit" name="task" class="btn btn-primary">更新</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <!-- Script -->
    <!-- Jquery Script -->
    <script src="../js/jquery-3.6.0.js"></script>
    <!-- Bootstrap5_beta3 Script -->
    <script src="../js/bootstrap.bundle.js"></script>
    <!-- Datatables Script -->
    <script src="../js/datatables.js"></script>
    <!-- Datatables初期化 Script -->
    <script>
        jQuery(function ($) {
            // デフォルトの設定を変更
            $.extend($.fn.dataTable.defaults, {
                language: {
                    url: "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Japanese.json"
                }
            });
            $("#task-table").DataTable({
                stateSave: true,
                // order: [[3, "asc"]], //4列目を昇順にする（列番号0=1列目）
                scrollx: true
            });
        });
    </script>
    <!-- Flatpicker Script-CDN -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/ja.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            flatpickr.l10ns.ja.firstDayOfWeek = 0;
            flatpickr('#flatpicker', {
                wrap: true,
                dateFormat: 'Y/m/d',
                locale: 'ja',
                clickOpens: false,
                allowInput: true,
                monthSelectorType: 'static'
            });
        });
    </script>
</body>

</html>