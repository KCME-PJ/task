<?php
function user_add($p, $dbh)
{
    $h_pass =  hash('sha256', $_POST['pass']); //パスワードhashをかける
    try {
        $sql = <<<SQL
        INSERT INTO users (l_name,f_name,mail,pass) VALUES (?,?,?,?)
        SQL;
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(1, $_POST['lastname'], PDO::PARAM_STR);
        $stmt->bindValue(2, $_POST['firstname'], PDO::PARAM_STR);
        $stmt->bindValue(3, $_POST['email'], PDO::PARAM_STR);
        $stmt->bindValue(4, $h_pass, PDO::PARAM_STR);
        $stmt->execute();

        $done = './signup_ok-msg.html';
        return $done;
    } catch (Exception $e) {
        echo$e->getMessage();
    } finally {
        $dbh = null;
    }
    exit();
}
