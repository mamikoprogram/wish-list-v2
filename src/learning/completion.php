<?php

require_once "../include/const.php";

//データベース接続
try {
    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//    完了ボタンを押したらcompleteカラムを１に変更する処理

    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        echo "アクセスが正しくありません。";

        if ($_GET['id']) {
            //  GETのidを取得
            $id = $_GET['id'];

            $sql = 'UPDATE wishes SET completion = 1 WHERE id = :id';
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam('id', $id);
            $stmt->execute();
            header("Location: index.php");
        }
    }
} catch (PDOException $e) {
    echo 'データベースに接続できません。';
    exit;
}

//
//メモ
//completeカラムを作ってデフォルトで０
//完了ボタンを押したらcompleteカラムが１に更新
//カラムが０の時だけ　index.phpの$Wishを表示
