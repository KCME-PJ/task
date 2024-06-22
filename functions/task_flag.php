<?php
function task_f($dbh,$task_id)
{
    try {
        $sql = <<<SQL
        UPDATE tasks SET task_flag = 1 WHERE task_id = ?
        SQL;
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(1, $task_id, PDO::PARAM_INT);
        $stmt->execute();

        $done = 'アップデート完了';
        return $done;
    } catch (Exception $e) {
        echo$e->getMessage();
    } finally {
        $dbh = null;
    }
    exit();
}
