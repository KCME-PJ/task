<?php
function duplicate($email, $dbh)
{
    try {
        $sql = sprintf("SELECT COUNT(*) AS cnt FROM users WHERE mail='%s' ", $email);
        $stmt = $dbh->query($sql);
        while ($row = $stmt->fetch()) {
            $cnt = $row['cnt'];
            if ($cnt > 0) {
                $error = 1;
            } else {
                $error = 0;
            }
        }
        return $error;
    } catch (Exception $e) {
        echo$e->getMessage();
    } finally {
        $dbh = null;
    }
}
