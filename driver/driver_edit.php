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
                        <a href="./task_list.php" class="nav-link px-3">
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
                        <a href="#" class="nav-link px-3 active">
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
                    <li class="breadcrumb-item" aria-current="page">Dashboard</li>
                    <li class="breadcrumb-item" aria-current="page">安全運転管理</li>
                    <li class="breadcrumb-item active" aria-current="page">ドライバー詳細</li>
                </ol>
            </nav>
            <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#driver_add">
                <span class="me-1"><i class="bi bi-pencil-fill"></i></span>
                <span>ステータス変更</span>
            </button>
            <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#driver_add">
                <span class="me-1"><i class="bi bi-pencil-fill"></i></span>
                <span>交通安全講習</span>
            </button>
            <a class="btn btn-outline-success btn-sm" href="#" role="button">
                <i class="bi bi-clock-history"></i> ドライバー過去ログ
            </a>
            <div class="card mt-2">
                <div class="card-body">
                    <form action="driver_post.php" method="post">
                        <div class="container-fluid">
                            <div>
                                <h5><b>運転資格者ID：012</b><button type="button" class="btn btn-outline-primary btn-sm ms-3">有効</button></h5>
                            </div>
                            <div class="row mt-2">
                                <div class="form-group col-sm-6 mt-1">
                                    <div class="input-group">
                                        <span class="input-group-text">姓</span>
                                        <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
                                        <span class="input-group-text">名</span>
                                        <input type="text" name="fname" class="form-control" placeholder="First Name" required>
                                    </div>
                                </div>
                                <div class="form-group col-sm-3 mt-1">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                        <input type="mail" name="mail" class="form-control" placeholder="***@example.com" required>
                                    </div>
                                </div>
                                <div class="form-group col-sm-3 mt-1">
                                    <div class="input-group date" id="flatpicker" data-target-input="nearest">
                                        <span class="input-group-text">誕生日</span>
                                        <input type="date" data-input class="form-control" data-target="#flatpicker" id="birthday"
                                            name="birthday" placeholder="生年月日" required>
                                        <span class="input-group-text" data-toggle><i class="bi bi-calendar3"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3">
                                <hr class="dropdown-divider bg-dark" />
                            </div>
                            <div class="row mt-3">
                                <div class="form-group col-sm-3">
                                    <label>社員番号</label>
                                    <input type="text" name="staff_id" maxlength="9" class="form-control" placeholder="9桁" required>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>契約形態</label>
                                    <select id="employeetype" class="form-select" name="employeetype" required>
                                        <option value="" disabled selected style="display: none;">選択してしてください</option>
                                        <option value="1">正社員</option>
                                        <option value="2">契約社員</option>
                                        <option value="3">派遣社員</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>所属コード</label>
                                    <input type="text" name="affiliation_code" maxlength="8" class="form-control" placeholder="8桁" required>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>申請時の営業所</label>
                                    <select id="office" class="form-select" name="office" required>
                                        <option value="" disabled selected style="display: none;">選択してしてください</option>
                                        <option value="1">札幌営業所</option>
                                        <option value="2">仙台営業所</option>
                                        <option value="3">本社</option>
                                        <option value="4">大阪営業所</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="form-group col-sm-3">
                                    <label>事業部名</label>
                                    <select id="division" class="form-select" name="division" required>
                                        <option value="" disabled selected style="display: none;">選択してしてください</option>
                                        <option value="1">通信建設事業部</option>
                                        <option value="2">ネットワークソリューション事業部</option>
                                        <option value="3">ビジネスプラットフォーム事業部</option>
                                        <option value="4">経営企画室</option>
                                        <option value="5">NW事業本部</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>部</label>
                                    <input type="text" name="department" class="form-control" placeholder="**部" required>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>課</label>
                                    <input type="text" name="section" class="form-control" placeholder="**課" required>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>係</label>
                                    <input type="text" name="unit" class="form-control" placeholder="**係　無ければ「-」" required>
                                </div>
                            </div>
                            <div class="mt-3">
                                <hr class="dropdown-divider bg-dark" />
                            </div>
                            <div class="row mt-3">
                                <div class="form-group col-sm-3">
                                    <label>運転免許証の有効期限</label>
                                    <div class="input-group date" id="flatpicker" data-target-input="nearest">
                                        <input type="date" data-input class="form-control" data-target="#flatpicker" id="expire"
                                            name="expire" placeholder="有効期限" required>
                                        <span class="input-group-text" data-toggle><i class="bi bi-calendar3"></i></span>
                                    </div>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>運転免許証の色</label>
                                    <select id="license_color" class="form-select" name="license_color" required>
                                        <option value="" disabled selected style="display: none;">選択してしてください</option>
                                        <option value="1">グリーン（新規運転者）</option>
                                        <option value="2">ブルー（一般運転者）</option>
                                        <option value="3">ゴールド（優良運転者）</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>運転記録証明書発行日</label>
                                    <div class="input-group date" id="flatpicker" data-target-input="nearest">
                                        <input type="date" data-input class="form-control" data-target="#flatpicker" id="license"
                                            name="license" placeholder="証明書発行日" required>
                                        <span class="input-group-text" data-toggle><i class="bi bi-calendar3"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3">
                                <hr class="dropdown-divider bg-dark" />
                            </div>
                            <div class="form-group col-sm-3 mt-3">
                                <label>誓約の有無</label>
                                <div class="radio-inline">
                                    <input type="radio" value="1" name="pledge_type" id="yes">
                                    <label for="1">有</label>
                                    <input type="radio" class="ms-3" value="2" name="pledge_type" id="no" checked>
                                    <label for="2">無</label>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="form-group col-sm-3">
                                    <label>誓約日</label>
                                    <div class="input-group date" id="flatpicker" data-target-input="nearest">
                                        <input type="date" data-input class="form-control" data-target="#flatpicker" id="expire"
                                            name="pledge_at" placeholder="誓約日">
                                        <span class="input-group-text" data-toggle><i class="bi bi-calendar3"></i></span>
                                    </div>
                                </div>
                                <div class="form-group col-sm-9">
                                    <label>申請理由</label>
                                    <input type="text" name="reason" class="form-control" placeholder="申請理由を書きましょう" required>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="form-group col-sm-3">
                                    <label>上長の氏名</label>
                                    <input type="text" name="boss_name" class="form-control" placeholder="京セラ　太郎" required>
                                </div>
                                <div class="form-group col-sm-9">
                                    <label>上長のコメント</label>
                                    <input type="text" name="boss_comment" class="form-control" placeholder="コメント" required>
                                </div>
                            </div>
                            <div class="mt-3">
                                <hr class="dropdown-divider bg-dark" />
                            </div>
                            <div class="mt-3">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">キャンセル</button>
                                <button type="submit" name="task" class="btn btn-primary">修正</button>
                            </div>
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