<?php

require_once "../include/const.php";

//データベース接続
try {
    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //idを取得
    $id = $_GET['id'];

    //    GETされた値を取り出す処理(idを取り出す)
    $sql = "SELECT * FROM learning_php.wishes WHERE id = :id";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
} catch (PDOException $e) {
    echo 'データベースに接続できません。' . $e->getMessage();
    exit;
}
?>

<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles.css">
    <title>Detail Wish</title>
</head>
<body>
<h1>Wish List</h1>
<h2>My Wish</h2>
<!--詳細画面表示-->
<?php
if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
    <p class="detail"><?php
        echo $row['my_wish']; ?></p><br>
    <h2>Memo</h2>
    <p class="detail"><?php
        echo $row['memo']; ?></p><br>
<?php
} ?>
<a href="index.php" class="btn-style">もどる</a>
</body>
</html>
