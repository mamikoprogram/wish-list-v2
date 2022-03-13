<?php

function wish_list($dbh) {
    //  POSTされた値を取り出す処理(作業中)
    $sql = 'select * from wishs';
    $stmt = $dbh->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
