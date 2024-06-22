<?php
session_start();
if (!isset($_SESSION['join'])) {
header('Location: ../users/login.html');
exit();
}
require_once '../common/database.php';
require_once('../functions/session_user_select.php');

$mail = $_SESSION['join'];
$user_n = user_select($mail);
$fname =$user_n['f_name'];
$lname =$user_n['l_name'];
$add_user = $lname ." ". $fname;

if (! empty($_POST)) {
    // validation

    if ($_POST['company'] == '') {
        $error['company'] = 'blank';
    }
    if ($_POST['lname'] == '') {
        $error['lname'] = 'blank';
    }
    if ($_POST['fname'] == '') {
        $error['fname'] = 'blank';
    }
    if ($_POST['division'] == '') {
        $error['division'] = 'blank';
    }
    if ($_POST['department'] == '') {
        $error['department'] = 'blank';
    }
    if ($_POST['section'] == '') {
        $error['section'] = 'blank';
    }
    if ($_POST['unit'] == '') {
        $error['unit'] = 'blank';
    }
    if ($_POST['affiliation_code'] == '') {
        $error['affiliation_code'] = 'blank';
    }
    if ($_POST['employeetype'] == '') {
        $error['employeetype'] = 'blank';
    }
    if ($_POST['staff_id'] == '') {
        $error['staff_id'] = 'blank';
    }
    if ($_POST['office'] == '') {
        $error['office'] = 'blank';
    }
    if ($_POST['license'] == '') {
        $error['license'] = 'blank';
    }
    if ($_POST['mail'] == '') {
        $error['mail'] = 'blank';
    }
    if ($_POST['birthday'] == '') {
        $error['birthday'] = 'blank';
    }
    if ($_POST['license_color'] == '') {
        $error['license_color'] = 'blank';
    }
    if ($_POST['expire'] == '') {
        $error['expire'] = 'blank';
    }
    if ($_POST['pledge_type'] == '') {
        $error['pledge_type'] = 'blank';
    }
    if ($_POST['pledge_at'] == '') {
        $error['pledge_at'] = 'blank';
    }
    if ($_POST['reason'] == '') {
        $error['reason'] = 'blank';
    }
    if ($_POST['boss_name'] == '') {
        $error['boss_name'] = 'blank';
    }
    if ($_POST['boss_comment'] == '') {
        $error['boss_comment'] = 'blank';
    }
}

$d = array($_POST);

require_once('../common/database_driver.php');
require_once('../functions/driver_check.php');
require_once('../functions/driver_add.php');

$staff_id = mb_convert_kana($_POST['staff_id'], "a");//全角英数を半角英数へ

$dbh = getDb1();
$error = duplicate_d($staff_id, $dbh);

if (!preg_match('/^([0-9]{9})$/', $staff_id)){
    header('Location: ./duplicate_err_msg01.html');
    exit();
}

if ($error === 1) {
    header('Location: ./duplicate_err_msg02.html');
    exit();
} else {
    $result = driver_add($d, $dbh, $add_user);
    header("Location:" . $result);
    exit();
}
