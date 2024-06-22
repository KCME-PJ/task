<?php
function getDb()
{
    $dsn = 'mysql:dbname=tasking; host=localhost; charset=utf8';
    $user = 'root';
    $password = '';
    $option = array(
        PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC, //デフォルトのフェッチモードを変更　レスポンスは常に連想配列形式で取得するようになる
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //エラー発生時は例外をスローする
        PDO::ATTR_CASE => PDO::CASE_NATURAL, //データベースドライバによって返されるカラム名をそのままにする
        PDO::ATTR_PERSISTENT => true, //スクリプトが終了してもデータベースへの接続を維持し次回に再利用する
        PDO::MYSQL_ATTR_MULTI_STATEMENTS => false, //MySQLのSQLの複文を禁止する
        PDO::ATTR_EMULATE_PREPARES => false //静的プレースホルダを使用する
    );
    $dbh = new PDO($dsn, $user, $password, $option);
    return $dbh;
}
