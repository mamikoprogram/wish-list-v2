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

//  POSTされた値を取り出す処理
$sql = 'select * from wishes';
$stmt = $dbh->query($sql);
$wishes = $stmt->fetchAll(PDO::FETCH_ASSOC);

//completeカラムが0（未完了）のレコードだけを取す処理
$sql = 'select * from wishes WHERE completion = 0';
$stmt = $dbh->query($sql);
$wishes = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wish List</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<h1>Wish List</h1>
<a href="new-wish.php" class="btn-style">Wishを追加する</a>
<table>
    <thead>
    <tr>
        <th>My Wish</th>
        <th>Memo</th>
        <th></th>
        <th></th>
    </tr>
    </thead>
    <!--         追加したWishを表示する処理 -->
    <tbody>
    <?php
    foreach ($wishes as $wish) { ?>
        <tr>
            <td><a href="detail.php?id=<?php
                echo $wish['id']; ?>"><?php
                    echo mb_substr($wish['my_wish'], 0, 10); ?></a></td>
            <td><?php
                echo mb_substr($wish['memo'], 0, 10); ?></td>
            <td><a href="edit.php?id=<?php
                echo $wish['id']; ?>">編集</a></td>
            <td>
                <a href="completion.php?id=<?php
                echo $wish['id']; ?>" type="submit">完了</a>
            </td>
        </tr>
        <?php
    } ?>
    </tbody>
</table>


</body>
</html>
