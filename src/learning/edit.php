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
    try {
        //GETのidを取得
        $id = $_GET['id'];

//    編集画面に内容を表示する
        $sql = "SELECT * FROM learning_php.wishes WHERE id = :id";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam('id', $id);
        $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] != 'GET') {
    if (!empty($_POST['myWish'])) {
        $id = $_POST['id'];
        $myWish = $_POST['myWish'];
        $memo = $_POST['memo'];

//        編集内容を更新する処理
        $sql = 'UPDATE wishes SET my_wish = :MY_WISH, memo = :MEMO WHERE id = :id';
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam('id', $id);
        $stmt->bindParam('MY_WISH', $myWish);
        $stmt->bindParam('MEMO', $memo);
        $stmt->execute();
        header("Location: index.php");
    } else {
        echo '更新できませんでした。My Wishを入力してください。';
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
    <title>Edit Wish</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<h1>Edit Wish</h1>
<form method="POST" action="edit.php">
    <?php
    if ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
        <span class="item">My Wish:</span><br>
        <label>
            <!--フォームの中に編集前のWishとメモを表示させる-->
            <input type="text" class="txt" name="myWish" value="<?php
            echo $row['my_wish']; ?>">
        </label>
        <span class="item">Memo:</span><br>
        <label><textarea name="memo" cols="20" rows="10"><?php
                echo $row['memo']; ?></textarea></label><br>
        <!--      DB更新する為にidを渡す-->
        <input type="hidden" name="id" value="<?php
        echo $row['id']; ?>">
        <input type="submit" class="btn-style" value="変更">
        <input type="submit" class="btn-style" formaction="confirm-delete.php"
               value="削除">

    <?php
    endif; ?>
</form>

</body>
</html>
