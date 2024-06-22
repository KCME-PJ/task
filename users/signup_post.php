<?php
if (! empty($_POST)) {
    // validation

    if ($_POST['lastname'] == '') {
        $error['lastname'] = 'blank';
    }
    if ($_POST['firstname'] == '') {
        $error['firstname'] = 'blank';
    }
    if ($_POST['email'] == '') {
        $error['email'] = 'blank';
    }
    if ($_POST['pass'] == '') {
        $error['pass'] = 'blank';
    }
}

$p = array($_POST);

require_once('../common/database.php');
require_once('../functions/duplicate_check.php');
require_once('../functions/user_add.php');

$dbh = getDb();
$error = duplicate($_POST['email'], $dbh);

if ($error === 1) {
    header('Location: ./duplicate_err_msg.html');
    exit();
} else {
    $result = user_add($p, $dbh);
    header("Location:" . $result);
    exit();
}
