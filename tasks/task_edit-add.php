<?php
    if (! empty($_POST)) {
        if ($_POST['task_id'] == '') {
            $error['task_id'] = 'blank';
        }
        if ($_POST['progress'] == '') {
            $error['progress'] = 'blank';
        }
        if ($_POST['userid'] == '') {
            $error['userid'] = 'blank';
        }
        if ($_POST['radio_bt'] == '') {
            $error['radio_bt'] = 'blank';
        }
    }
    require_once('../common/database.php');
    require_once('../functions/task_flag.php');
    try {
        $sql = <<<SQL
        INSERT INTO task_histories (h_task_id,progress,h_user_id) VALUES (?,?,?)
        SQL;

        $dbh = getDb();

        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(1, $_POST['task_id'], PDO::PARAM_INT);
        $stmt->bindValue(2, $_POST['progress'], PDO::PARAM_STR);
        $stmt->bindValue(3, $_POST['userid'], PDO::PARAM_INT);
        $stmt->execute();

        if ($_POST['radio_bt'] == 1){
            $flag = task_f($dbh,$_POST['task_id']);
        }

    } catch (Exception $e) {
        echo$e->getMessage();
    } finally {
        $dbh = null;
    }
    header('Location: ./task_list.php');
