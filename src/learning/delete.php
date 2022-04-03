<?php

require_once "../include/const.php";

//データベース接続
try {
    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'データベースに接続できません。' . $e->getMessage();
    exit;
}

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    echo "アクセスが正しくありません。";
} else {
    //  POSTのidを取得
    $id = $_POST['id'];

    $sql = 'DELETE FROM wishes WHERE id = :id';
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam('id', $id);
    $stmt->execute();
    header("Location: index.php");
}
