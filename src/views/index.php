<?php
/**
 * @var array $wishs
 */
?>

<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wish List</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<h1>Wish List</h1>
<a href="new-wish.php">Wishを追加する</a>
<!-- 追加したWishを表示する作業中 -->
<?php foreach ($wishs as $wish) { ?>
    <table>
        <tr>
            <td><?php echo $wish['my_wish']; ?></td>
            <td><?php echo $wish['memo']; ?></td>
        </tr>
    </table>
<?php } ?>



</body>
</html>
