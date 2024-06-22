<?php
function user_select($mail){
    $sql = <<<SQL
    SELECT * FROM users WHERE mail = ?;
    SQL;

    $dbh = getDb();
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(1, $mail, PDO::PARAM_STR);
    $stmt->execute();
    foreach ($stmt as $row) {
        $l_name = $row['l_name'];
        $f_name = $row['f_name'];
        $user_id = $row['user_id'];
    }
    $dbh = null;

    return array('l_name'=>$l_name, 'f_name'=>$f_name, 'user_id'=>$user_id);
}
