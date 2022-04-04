<?php

require_once "../include/const.php";

// データベース接続
try {
    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // （理解度メモ）エミュレーションの理解がイマイチ。
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}

// 値を受け取りDBに保存する
if (!empty($_POST['myWish'])) {
    try {
        $sql = 'INSERT INTO wishes(my_wish,memo) VALUES(:MY_WISH,:MEMO)';
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':MY_WISH', $_POST['myWish']);
        $stmt->bindParam(':MEMO', $_POST['memo']);
        $stmt->execute();
        header('location: http://localhost:8080');
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit;
    }
}

if (isset($_POST['myWish'])) {
    if (empty ($_POST['myWish']) && empty ($_POST['memo'])) {
        header("Location: index.php");
        exit;
    }
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Wish</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<h1>New Wish</h1>
<form method="POST" action="new-wish.php">
    <span class="item">My Wish:</span><br>
    <label>
        <input type="text" class="txt" name="myWish" placeholder="例）旅行に行く">
    </label>
    <span class="item">Memo:</span><br>
    <label for="memo"></label><textarea name="memo" id="memo" cols="20" rows="10"
                                        placeholder="例）夏までに貯金して沖縄でリゾートホテルに泊まる "></textarea>
    <br>
    <input class="btn-style" type="submit" value="Wishを追加">
</form>
</body>
</html>
