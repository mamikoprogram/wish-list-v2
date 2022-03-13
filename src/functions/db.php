<?php
function db() {
// データベース接続
    try {
        $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        // （理解度メモ）エミュレーションの理解がイマイチ。
        $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit;
    }

    return $dbh;
}
