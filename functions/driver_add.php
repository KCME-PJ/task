<?php
function driver_add($d, $dbh, $add_user)
{
    $affiliation_c = mb_convert_kana($_POST['affiliation_code'], "a");//全角英数を半角英数へ
    $affiliation = strtoupper($affiliation_c);//小文字を大文字へ
    $staff_id = mb_convert_kana($_POST['staff_id'], "a");//全角英数を半角英数へ
    $mail_mb = mb_convert_kana($_POST['mail'], "a");//全角英数を半角英数へ
    $mail = strtolower($mail_mb);//大文字を小文字へ

    try {
        $sql = <<<SQL
        INSERT INTO drivers (
            d_fname,
            d_lname,
            birthday,
            mail,
            staff_id,
            affiliation_code,
            division_id,
            department,
            section,
            unit,
            employeetype,
            company,
            office_id,
            license_at,
            license_color_id,
            expire,
            pledge_type,
            pledge_at,
            reason,
            boss_name,
            boss_comment,
            add_user
        )
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)
        SQL;

        $dbh = getDb1();

        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(1, $_POST['fname'], PDO::PARAM_STR);
        $stmt->bindValue(2, $_POST['lname'], PDO::PARAM_STR);
        $stmt->bindValue(3, $_POST['birthday'], PDO::PARAM_STR);
        $stmt->bindValue(4, $mail, PDO::PARAM_STR);
        $stmt->bindValue(5, $staff_id, PDO::PARAM_INT);
        $stmt->bindValue(6, $affiliation, PDO::PARAM_STR);
        $stmt->bindValue(7, $_POST['division'], PDO::PARAM_INT);
        $stmt->bindValue(8, $_POST['department'], PDO::PARAM_STR);
        $stmt->bindValue(9, $_POST['section'], PDO::PARAM_STR);
        $stmt->bindValue(10, $_POST['unit'], PDO::PARAM_STR);
        $stmt->bindValue(11, $_POST['employeetype'], PDO::PARAM_INT);
        $stmt->bindValue(12, $_POST['company'], PDO::PARAM_STR);
        $stmt->bindValue(13, $_POST['office'], PDO::PARAM_INT);
        $stmt->bindValue(14, $_POST['license'], PDO::PARAM_STR);
        $stmt->bindValue(15, $_POST['license_color'], PDO::PARAM_INT);
        $stmt->bindValue(16, $_POST['expire'], PDO::PARAM_STR);
        $stmt->bindValue(17, $_POST['pledge_type'], PDO::PARAM_INT);
        $stmt->bindValue(18, $_POST['pledge_at'], PDO::PARAM_STR);
        $stmt->bindValue(19, $_POST['reason'], PDO::PARAM_STR);
        $stmt->bindValue(20, $_POST['boss_name'], PDO::PARAM_STR);
        $stmt->bindValue(21, $_POST['boss_comment'], PDO::PARAM_STR);
        $stmt->bindValue(22, $add_user, PDO::PARAM_STR);
        $stmt->execute();

        $done = './driver_list.php';
        return $done;
    } catch (Exception $e) {
        echo$e->getMessage();
    } finally {
        $dbh = null;
    }
    exit();
}
