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
    <!-- Flatpicker Custom css -->
    <style>
        /* 日曜日：赤 */
        .flatpickr-calendar .flatpickr-innerContainer .flatpickr-weekdays .flatpickr-weekday:nth-child(7n + 1),
        .flatpickr-calendar .flatpickr-innerContainer .flatpickr-days .flatpickr-day:not(.flatpickr-disabled):not(.prevMonthDay):not(.nextMonthDay):nth-child(7n + 1) {
            color: red;
        }
        /* 土曜日：青 */
        .flatpickr-calendar .flatpickr-innerContainer .flatpickr-weekdays .flatpickr-weekday:nth-child(7),
        .flatpickr-calendar .flatpickr-innerContainer .flatpickr-days .flatpickr-day:not(.flatpickr-disabled):not(.prevMonthDay):not(.nextMonthDay):nth-child(7n) {
            color: blue;
        }
        .flatpickr-current-month {
            display: flex;
            justify-content: center;
        }
        .cur-year {
            order: 1;
        }
        .cur-month:before {
            content: '年　';
        }
        .cur-month {
            order: 2;
        }
        .flatpickr-current-month span.cur-month {
            font-weight: 300;
            padding-top: 4px;
        }
    </style>

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
                    <li class="breadcrumb-item active" aria-current="page">過去ログリスト</li>
                </ol>
            </nav>
            <span>優先順位：</span>
            <button type="submit" name="task" class="btn btn-danger btn-sm">高</button>
            <button type="submit" name="task" class="btn btn-warning btn-sm">中</button>
            <button type="submit" name="task" class="btn btn-primary btn-sm">低</button>
            <span>　影響範囲：</span>
            <button type="submit" name="task" class="btn btn-outline-dark btn-sm">全社</button>
            <button type="submit" name="task" class="btn btn-outline-dark btn-sm">安推</button>
            <button type="submit" name="task" class="btn btn-outline-dark btn-sm">部内</button>
            <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#task_add">
                <span class="me-1"><i class="bi bi-pencil-fill"></i></span>
                <span>タスク登録</span>
            </button>
            <a class="btn btn-outline-success btn-sm" href="./task_list.php">
                <span class="me-1"><i class="bi bi-arrow-return-left"></i></span>
                <span>戻る</span>
            </a>

            <div class="row mt-2">
                <div class="col-12 col-xl-12 mb-4 mb-lg-0">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="task-table" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>期限</th>
                                            <th class="text-center">重要度</th>
                                            <th class="text-center">影響範囲</th>
                                            <th>タスク名</th>
                                            <th>進捗完了</th>
                                            <th class="text-center">過去ログ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            require_once '../common/database.php';
                                            require_once '../functions/time_history.php';
                                            $sql = <<<SQL
                                            SELECT *,MAX(h_created_at)max_history
                                            FROM tasks
                                            INNER JOIN priorities ON tasks.t_priority_id = priorities.priority_id
                                            INNER JOIN impacts ON tasks.t_impact_id = impacts.impact_id
                                            LEFT OUTER JOIN task_histories ON task_histories.h_task_id = tasks.task_id
                                            WHERE task_flag = 1
                                            GROUP BY task_id

                                            SQL;
                                            
                                            try {
                                                $dbh = getDb();
                                                $stmt = $dbh->query($sql);
                                                foreach ($stmt as $row) {
                                                    $task_id = $row['task_id'];
                                                    $task_name = $row['task_name'];
                                                    $deadline = $row['deadline'];
                                                    $impact = $row['impact'];
                                                    $priority = $row['priority'];
                                                    $hisrory_id = $row['history_id'];
                                                    $history = $row['max_history'];

                                                    if ($priority == "高") {
                                                        $bt = "btn-danger";
                                                    }
                                                    if ($priority == "中") {
                                                        $bt = "btn-warning";
                                                    }
                                                    if ($priority == "低") {
                                                        $bt = "btn-primary";
                                                    }
                                                    if (is_null($history)) {
                                                        $at = "<font color=red>進捗を確認してください</fonf>";
                                                        $get_id = "no_progress_msg.html";
                                                    } else {
                                                        $at = time_to_history($history);
                                                        $get_id = "data_log_histories.php?id=$task_id";
                                                    }
                                            
                                                    print <<<EOD
                                                    <tr>
                                                        <td class="align-middle">$deadline</td>
                                                        <td class="align-middle text-center">
                                                            <button type="button" class="btn $bt btn-sm">$priority</button>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <button type="button"
                                                                class="btn btn-outline-dark btn-sm"><b>$impact</b></button>
                                                        </td>
                                                        <td class="align-middle">$task_name</td>
                                                        <td class="align-middle">$at</td>
                                                        <td class="align-middle text-center">
                                                            <a class="btn btn-outline-success btn-sm" href="$get_id" role="button">
                                                                <i class="bi bi-list-check"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    EOD;
                                                }
                                            } catch (PDOException $e) {
                                                exit('ERR! : ' . $e->getMessage());
                                            } finally {
                                                $dbh = null;
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- main contents end -->
    <!-- Modal_Task-add -->
    <div class="modal fade" id="task_add" tabindex="-1" aria-labelledby="task_add" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">タスクの登録</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="task_add.php" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="userid" value="<?php echo $user_n['user_id']; ?>">
                        <div class="form-group">
                            <label>タスク名</label>
                            <input type="text" name="task_name" class="form-control" required>
                        </div>
                        <div class="form-group mt-3">
                            <label>タスク内容</label>
                            <textarea type="text" name="contents" class="form-control" rows="2" required></textarea>
                        </div>
                        <div class="form-group mt-3">
                            <label for="flatpicker">日程</label>
                            <div class="input-group date" id="flatpicker" data-target-input="nearest">
                                <input type="date" data-input class="form-control" data-target="#flatpicker" id="startdate"
                                    name="startdate" placeholder="開始日" required>
                                <span class="input-group-text" data-toggle><i class="bi bi-calendar3"></i></span>
                            </div>

                            <div class="input-group date mt-2" id="flatpicker" data-target-input="nearest">
                                <input type="date" data-input class="form-control" data-target="#flatpicker" id="deadline"
                                    name="deadline" placeholder="締切日" min="#stratdate" required>
                                <span class="input-group-text" data-toggle><i class="bi bi-calendar3"></i></span>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <label for="taskflag">重要度</label>
                            <select id="taskflag" class="form-select" name="priority" required>
                                <option value="" disabled selected style="display: none;">選択してしてください</option>
                                <option value="1">高</option>
                                <option value="2">中</option>
                                <option value="3">低</option>
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label for="impact">影響範囲</label>
                            <select id="impact" class="form-select" name="impact" required>
                                <option value="" disabled selected style="display: none;">選択してしてください</option>
                                <option value="1">全社</option>
                                <option value="2">安推</option>
                                <option value="3">部内</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">キャンセル</button>
                        <button type="submit" name="task" class="btn btn-primary">登録</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
                scrollx: true,
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