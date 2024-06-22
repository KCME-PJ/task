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
</head>
<?php
session_start();
if (!isset($_SESSION['join'])) {
    header('Location: ../users/login.html');
    exit();
}
require_once '../common/database.php';
require_once '../functions/session_user_select.php';
$mail = $_SESSION['join'];
$user_n = user_select($mail);
?>
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
                            <i class="bi bi-person-fill"></i>　<?php echo $user_n['f_name']." ".$user_n['l_name']; ?>さん
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="../users/logout.php">Logout</a></li>
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
                    <li class="breadcrumb-item active" aria-current="page">過去ログ</li>
                </ol>
            </nav>
            <?php 
                require_once '../common/database.php';
                date_default_timezone_set('Asia/Tokyo');
                $time_now = date("Y/m/d H:i:s", time());
                $task_id = $_GET['id'];
                if (empty($task_id)) {
                    header('Location: ./task_list.php');
                }
                require_once '../functions/user_id_select.php';
                $sql = <<<SQL
                SELECT * FROM tasks
                INNER JOIN priorities ON tasks.t_priority_id = priorities.priority_id
                INNER JOIN impacts ON tasks.t_impact_id = impacts.impact_id
                WHERE task_id = ?
                SQL;
                
                try {
                    $dbh = getDb();
                    $stmt = $dbh->prepare($sql);
                    $stmt->bindValue(1, $task_id, PDO::PARAM_INT);
                    $stmt->execute();
                    foreach ($stmt as $row) {
                        $task_id = $row['task_id'];
                        $task_name = $row['task_name'];
                        $content = $row['content'];
                        $deadline = $row['deadline'];
                        $impact = $row['impact'];
                        $t_user = id_select($row['t_user_id']);
                        
                        $priority = $row['priority'];
                        if ($priority == "高") {
                            $bt = "btn-danger";
                        }
                        if ($priority == "中") {
                            $bt = "btn-warning";
                        }
                        if ($priority == "低") {
                            $bt = "btn-primary";
                        }
                    }
                } catch (PDOException $e) {
                    exit('ERR! : ' . $e->getMessage());
                } finally {
                    $dbh = null;
                }
            ?>
            <div>
                <button type="submit" name="task" class="btn <?php echo $bt; ?> btn-sm"><?php echo $priority; ?></button>
                <button type="submit" name="task" class="btn btn-outline-dark btn-sm"><?php echo $impact; ?></button>
                <a class="btn btn-outline-success btn-sm" href="data_log_list.php">
                    <span class="me-1"><i class="bi bi-arrow-return-left"></i></span>
                    <span>戻る</span>
                </a>

                <div class="input-group col-md mt-1">
                    <span class="input-group-text" id="basic-addon3">タスク名　</span>
                    <input type="text" class="form-control bg-white" value="<?php echo $task_name; ?>" readonly>
                    <span class="input-group-text" id="basic-addon3">タスク登録者</span>
                    <input type="text" class="form-control bg-white" value="<?php echo $t_user['f_name']." ". $t_user['l_name']; ?>" readonly>
                </div>
                <div class="input-group mt-1">
                    <span class="input-group-text">タスク内容</span>
                    <textarea class="form-control bg-white" readonly><?php echo $content; ?></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="card mt-3">
                        <div class="card-body">
                            <?php
                                require_once '../common/database.php';
                                require_once '../functions/time_history.php';
                                $sql = <<<SQL
                                SELECT * FROM tasks
                                INNER JOIN task_histories ON tasks.task_id = task_histories.h_task_id
                                INNER JOIN priorities ON tasks.t_priority_id = priorities.priority_id
                                INNER JOIN impacts ON tasks.t_impact_id = impacts.impact_id
                                INNER JOIN users ON task_histories.h_user_id = users.user_id
                                WHERE task_id = ?
                                ORDER BY history_id desc
                                SQL;
                                
                                try {
                                    $dbh = getDb();
                                    $stmt = $dbh->prepare($sql);
                                    $stmt->bindValue(1, $task_id, PDO::PARAM_INT);
                                    $stmt->execute();
                                    foreach ($stmt as $row) {
                                        $task_id = $row['task_id'];
                                        $task_name = $row['task_name'];
                                        $content = $row['content'];
                                        $progress = nl2br($row['progress']);//「nl2br」で改行を有効化
                                        $deadline = $row['deadline'];
                                        $impact = $row['impact'];
                                        $priority = $row['priority'];
                                        $hisrory_id = $row['history_id'];
                                        $history = $row['h_created_at'];
                                        $f_name = $row['f_name'];
                                        $l_name = $row['l_name'];

                                        $time_at = time_to_history($history);
                                        print <<<EOD

                                            <div class="d-flex align-items-start">
                                                <div class="flex-grow-1">
                                                    <small class="float-end">$time_at</small>
                                                    <p class="mb-2"><strong>$f_name $l_name</strong></p>
                                                    <p>$progress</p>
                                                    <small class="text-muted">$history</small><br />
                                                </div>
                                            </div>
                                            <hr />
                                        EOD;
                                    }
                                } catch (PDOException $e) {
                                    exit('ERR! : ' . $e->getMessage());
                                } finally {
                                    $dbh = null;
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- main contents end -->


    <!-- Script -->
    <!-- Jquery Script -->
    <script src="../js/jquery-3.6.0.js"></script>
    <!-- Bootstrap5_beta3 Script -->
    <script src="../js/bootstrap.bundle.js"></script>
</body>

</html>