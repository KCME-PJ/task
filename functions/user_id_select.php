<?php
function id_select($user_id){
    $sql = <<<SQL
    SELECT * FROM users WHERE user_id = ?;
    SQL;

    $dbh = getDb();
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(1, $user_id, PDO::PARAM_INT);
    $stmt->execute();
    foreach ($stmt as $row) {
        $l_name = $row['l_name'];
        $f_name = $row['f_name'];
        $mail = $row['mail'];
    }
    $dbh = null;

    return array('l_name'=>$l_name, 'f_name'=>$f_name, 'mail'=>$mail);
}
