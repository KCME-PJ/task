<?php
session_start();
if (! empty($_POST)) {
    // validation

    if ($_POST['email'] == '') {
        $error['email'] = 'blank';
    }
    if ($_POST['pass'] == '') {
        $error['pass'] = 'blank';
    }
}
require_once('../common/database.php');

$user_email = $_POST['email'];
$user_pass =  hash('sha256', $_POST['pass']);

try {
    $dbh = getDb();
    $sql = <<<SQL
    SELECT mail, pass
    FROM users
    WHERE mail=? 
    AND pass=? 
    SQL;
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(1, $user_email, PDO::PARAM_INT);
    $stmt->bindValue(2, $user_pass, PDO::PARAM_INT);
    $stmt->execute();

    $rec=$stmt->fetch();

    if ($rec==false) {
        header('Location: ./login-err_msg.html');
    } else {
        $_SESSION['join'] = $user_email;
        header('Location:../index.php');
        exit();
    }
} catch (PDOException $e) {
    print "ERR! : {$e->getMessage()}";
} finally {
    $dbh = null;
}
