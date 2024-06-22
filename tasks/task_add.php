<?php
    if (! empty($_POST)) {
        // validation

        if ($_POST['userid'] == '') {
            $error['userid'] = 'blank';
        }
        if ($_POST['task_name'] == '') {
            $error['task_name'] = 'blank';
        }
        if ($_POST['contents'] == '') {
            $error['contents'] = 'blank';
        }
        if ($_POST['startdate'] == '') {
            $error['startdate'] = 'blank';
        }
        if ($_POST['deadline'] == '') {
            $error['deadline'] = 'blank';
        }
        if ($_POST['priority'] == '') {
            $error['priority'] = 'blank';
        }
        if ($_POST['impact'] == '') {
            $error['impact'] = 'blank';
        }
    }
    require_once('../common/database.php');
    try {
        $sql = <<<SQL
        INSERT INTO tasks (task_name,content,startdate,deadline,t_priority_id,t_impact_id,t_user_id) VALUES (?,?,?,?,?,?,?)
        SQL;

        $dbh = getDb();

        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(1, $_POST['task_name'], PDO::PARAM_STR);
        $stmt->bindValue(2, $_POST['contents'], PDO::PARAM_STR);
        $stmt->bindValue(3, $_POST['startdate'], PDO::PARAM_STR);
        $stmt->bindValue(4, $_POST['deadline'], PDO::PARAM_STR);
        $stmt->bindValue(5, $_POST['priority'], PDO::PARAM_INT);
        $stmt->bindValue(6, $_POST['impact'], PDO::PARAM_INT);
        $stmt->bindValue(7, $_POST['userid'], PDO::PARAM_INT);
        $stmt->execute();
    } catch (Exception $e) {
        echo$e->getMessage();
    } finally {
        $dbh = null;
    }
    header('Location: ./task_list.php');
