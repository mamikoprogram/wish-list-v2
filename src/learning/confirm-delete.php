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
//idを取得
$id = $_POST['id'];

?>

<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Wish　削除確認画面</title>
</head>
<body>
<form action="delete.php" method="POST">
    <p>削除してよろしいですか？</p><br>
    <input type="submit" value="はい">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
</form>

<a href="index.php">Wish　Listに戻る</a>

</body>
</html>
