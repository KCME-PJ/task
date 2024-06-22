<?php
function duplicate_d($staff, $dbh)
{
    try {
        $sql = <<<SQL
        SELECT count(*) AS cnt FROM drivers WHERE staff_id = ?;
        SQL;

        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(1, $staff, PDO::PARAM_INT);
        $stmt->execute();

        $row = $stmt->fetch();
        $cnt = $row['cnt'];
        if ($cnt > 0){
            $error = 1;
        } else {
            $error = 0;
        }
        return $error;
    } catch (Exception $e) {
        echo$e->getMessage();
    } finally {
        $dbh = null;
    }

}
